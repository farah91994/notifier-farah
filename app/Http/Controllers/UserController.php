<?php
namespace App\Http\Controllers;

use App\Models\Role;
use App\User;
use View;
use DB;
use Session;
use Illuminate\Http\Request;

use Illuminate\Auth\Passwords\CanResetPassword ;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{	
	public function postSignUp(Request $request)
	{
		$this->validate($request, [
		      'email' => 'required|email|unique:users|min:10|max:100',
			  'first_name' => 'required|min:5|max:10|unique:users',
			  'password' =>  'required|min:6|max:12'
		]);
		
		$email = $request['email'];
		$first_name = $request['first_name'];
		$password = bcrypt($request['password']);
		$idRole = $request['role'];
//		$oRole= DB::table("roles")->where("id","=",$idRole)->get();
//		dd($oRole);
//		dd($idRole);
		$user = new User();
		$user->email = $email;
		$user->first_name = $first_name;
		$user->password = $password;
		$user->save();
		DB::table('user_role')->insert(array("user_id"=>$user->id,"role_id"=>$idRole));
        $request->session()->flash('status', 'Signed up successfully');
		return redirect('signIn')->with('status', 'Signed up successfully');
	}
	
	public function postSignIn(Request $request)
	{

		$this->validate($request, [
		      'email' => 'required',
			  'password' => 'required'
		]);

		if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
			Session::put("is_logged",true);
			$email = $request['email'];
			$oUser = DB::table("users")->where("email","=",$email)->get()[0];
			$oRole= DB::table("user_role")->where("user_id","=",$oUser->id)->get()[0];
			Session::put("id_user",$oUser->id);
			Session::put("id_role",$oRole->role_id);

			return redirect()->route('dashboard');
		}
		return redirect()->back()->withErrors(['error']);
	}
	public function getLogout()
	{
		Auth::logout();
		return redirect()->route('home');
	}
	
   public function getUser(Request $request){
		$formData = $request->input("formData");
		$dIdRole = Session::get("id_role");
	   	if($dIdRole == 1){
			$aDepartments = explode("&",$formData);
			$aIds = array();

			foreach($aDepartments as $department){
				$department = explode("=",$department);
				$aIds[]=$department[1];
			}
			Session::put("departments_ids",$aIds);
			$aResultDepartments = array();
			foreach($aIds as $dId){
				$oDepartment = DB::table("departments")->where("dep_id","=",$dId)->get()[0];
				$aTmp['name']=$oDepartment->dep_name;
				$aTmp['id']=$oDepartment->dep_id;
				$aResultDepartments[]=$aTmp;
			}
			$dIdPost = Session::get('id_post');
			$oPost = DB::table("posts")->where("id","=",$dIdPost)->get();
			$Post=$oPost[0]->body;

		return view::make("sendPost",array("departments"=>$aResultDepartments,"role"=>$dIdRole,"Post"=>$Post));
		}
		elseif($dIdRole == 2) {
			$courses = explode("&", $formData);
			$Ids = array();
			foreach ($courses as $course) {
				$course = explode("=", $course);
				$Ids[] = $course[1];
			}
			$aResult = array();
			foreach ($Ids as $id) {
				$aTmp = array();
				$aStudents = DB::table("students")->where("scourse_id", "=", $id)->get();
				$oCourse = DB::table("courses")->where("id", "=", $id)->get()[0];
				$aTmp['students'] = $aStudents;
				$aTmp['course'] = $oCourse;
				$aResult [] = $aTmp;
			}
			$astInfo = array();
			foreach ($aResult as $oObject) {
				foreach ($oObject['students'] as $student) {
					$aTmpSt = array();
					$aTmpSt['st_names'] = $student->student_name;
					$aTmpSt['st_id'] = $student->student_id;
					$astInfo ["data"][$oObject['course']->course_name][] = $aTmpSt;
				}

			}
			return view::make('studentSelection', $astInfo);
		}
    }
	public function studentsSelection(Request  $request){
		$dIdRole = Session::get("id_role");
		$ast= array();
		$formData = $request->input("formData");
		$aStudents = explode("&",$formData);
		foreach($aStudents as $sStudent){
			$aStudent = explode("=",$sStudent);
			$aId[]=$aStudent[1];
		}
		foreach($aId as $id){
			$ast[]=DB::table("students")->where("student_id","=",$id)->get()[0]->student_name;
		}
		$dIdPost = Session::get('id_post');
		$post = DB::table("posts")->where("id","=",$dIdPost)->get()[0]->body;
		return view::make("sendPost",array("role"=>$dIdRole,'st' => $ast,"Post"=>$post));
	}
    public function sendUser(){
        $ast= array();
        $dIdSt = Session::get('st_id');
        foreach ($dIdSt as $st){
            $ast['st_names']=$st->student_name;
        }
        return view ('sendPost',['st' => $ast]);

}
	public function getAccount(){
		
		return view('account',['user' => Auth::user()]);
		
	}
	public function postSaveAccount(Request $request){
		
		$this->validate($request,[
			'first_name' => 'required|max:120',
			'password' =>'required|min:6|max:12'
		]);
		$user = Auth:: user();
		$user->first_name = $request['first_name'];
		$user->password = $request['password'];

		$user->update();
		return redirect()->route('account');
	}
}
