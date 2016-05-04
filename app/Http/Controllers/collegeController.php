<?php
namespace App\Http\Controllers;

use App\Courses;
use View;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class collegeController extends Controller
{
    public function index()
    {
        $colleges = DB::table('colleges')->get();
        return view('collegeSelection', ['colleges' => $colleges]);
    }
    public function getCollege(){
        $colleges = DB::table('colleges')->get();
      //  dd($colleges);
    }
}