<?php
namespace App\Http\Controllers;

use App\Courses;
use View;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class depController extends Controller
{
    public function index()
    {
        $departments = DB::table('departments')->get();
        return view('depSelection', ['departments' => $departments]);
    }
}