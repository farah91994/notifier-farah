<?php
namespace App\Http\Controllers;

use App\Courses;
use View;
use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CourseController extends Controller
{
    public function index()
    {
        $courses = DB::table('courses')->where("user_id","=",Session::get("id_user"))->get();

        return view('courseSelection', ['courses' => $courses]);
    }
}