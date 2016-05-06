<?php
namespace App\Http\Controllers;


use App\Post;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
	public function getDashboard()
	{
		$posts= Post::orderBy('created_at', 'desc')->get();

		$posts = DB::table("posts")->where("user_id","=",Session::get("id_user"))->orderBy('created_at', 'desc')->get(array("user_id","created_at","body","id"));
		$user =  DB::table("users")->where("id","=",Session::get("id_user"))->get()[0];
		$aUser['name'] = $user->first_name;
		$Acourse= Session::get("Acourse");
		return view ('history',["posts" => $posts,"user"=>$aUser,"Acourse"=>$Acourse]);
	}
	public function getHistory()
	{
		$posts= Post::orderBy('created_at', 'desc')->get();

		$posts = DB::table("posts")->get(array("user_id","created_at","body","id"));
		return view ('dashboard',['posts' => $posts]);
	}
	public function getPosts()
	{
		$aPost= array();
		$aPost= Post::orderBy('created_at', 'desc')->get();
		//dd($aPost[0]["attributes"]["body"]);
		$dIdPost = Session::get('id_post');
		$oPost = DB::table("posts")->where("id","=",$dIdPost)->get();
		$Post=$oPost[0]->body;
		//$posts=$aPost[0]["attributes"]["body"];
		$ast= array();
		$dIdSt = Session::get('st_id');

		foreach ($dIdSt as $st){
			$ast['st_names']=$st->student_name;
		}
        Session::put("Post",$Post);
		$dIdRole = Session::get("id_role");
		return view ('sendPost',['Post' => $Post,'st' => $ast,'role'=>$dIdRole]);
	}
	
	public function postCreatePost(Request $request)
	{
		$this->validate($request,[
		'body' => 'required|max:1000'
		]);
		$post = array(
			"body"=>$request['body'],
			"user_id"=>Session::get("id_user")
		);
		$dPostId = DB::table("posts")->insertGetId($post);
		Session::put("id_post",$dPostId);

		$dIdRole = Session::get("id_role");
		switch($dIdRole){
			case 2:
				return redirect()->route('courseSelection');
			break;
			case 1:
				return redirect()->route("depSelection");
			break;
		}

	}
//	public function sendPost(){
//		$dIdPost = Session::get('id_post');
//		$oPost = DB::table("posts")->where("id","=",$dIdPost)->get();
//		dd($oPost);
//	}
   public function 	getDeletePost($post_id)
   {
	   $post = Post::where('id', $post_id)->first();
	   if(Auth::user() != $post->user){
		   return redirect()->back();
	   }
	   $post->delete();
	   return redirect()->route('history')->with(['message' => 'Successfully deleted!']);
	   
   }
   public function postEditPost(Request $request)
   {
	   $this->validate($request,[
	   'body' => 'required'
	   ]);
	   $post = Post::find($request['postId']);
	    if(Auth::user() != $post->user){
		   return redirect()->back();
	   }
	   $post->body = $request['body'];
	   $post->update();
	   return response()->json(['new_body' => $post->body], 200);
   }
}