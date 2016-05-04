<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    public function user()
	{
      return $this->belongsToMany('App\User');
	}
	public function student()
	{
		return $this->belongsToMany('App\Student');
	}
	
	public static function GetCourseUsers($idCourse){
		
	}
}