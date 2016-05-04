<?php

use illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

	Route::group(['middleware' => ['web']], function () {
		Route::get('/', function () {
		return view('welcome');
	})->name('home');
   
    Route::get('/courseSelection', [
	'uses' => 'CourseController@index',
	'as' =>  'courseSelection',
	'middleware' => 'auth'
	]);
	Route::get("SelectionForm","UserController@studentsSelection");
	 Route::get("courseSelectionForm","UserController@getUser");

	Route::get("collegeForm","collegeController@getCollege");
	
     Route::get('/signIn', function () {
       return view('signIn');
     })->name('signIn');
		Route::get('/collegeSelection', [
			'uses' => 'collegeController@index',
			'as' =>  'collegeSelection',
			'middleware' => 'auth'
		]);
		Route::get('/depSelection', [
			'uses' => 'depController@index',
			'as' =>  'depSelection',
		]);
		Route::get('/notification', [
			'uses'=> 'PushNotificationController@sendNotificationToDevice',
			'as' => 'notification'
		]);
    Route::post('/signup', [
	   'uses' => 'UserController@postSignUp',
	   'as' => 'signup'
	]);
		Route::get('/signUp', function () {
			$aRoles = DB::table("roles")->get(array("*"));
			$aRolesResult=array();
			foreach($aRoles as $oRole){
				$aTMP['name'] = $oRole->name;
				$aTMP['id']=$oRole->id;
				$aRolesResult[]=$aTMP;
			}
			return view('signUp',['Roles'=>$aRolesResult]);
		})->name('signUp');
//	Route::get('/sendPost', function () {
//			return view('sendPost');
//		})->name('sendPost');
//
 	Route::get('/sendPost',[
			'uses' => 'PostController@getPosts',
			'as' => 'sendPost'
		]);

	Route::post('/signin', [
	   'uses' => 'UserController@postSignIn',
	   'as' => 'signin'  
	]);
	
	Route::get('/logout',[
	   'uses' => 'UserController@getLogout',
	   'as' => 'logout'
	]);
	
	 Route::get('/history', function () {
       return view('history');
     })->name('history');

	Route::get('/account',[
	     'uses' => 'UserController@getAccount',
		  'as' => 'account',
		  'middleware' => 'auth'
	]);
    Route::post('/updateaccount',[
            'uses' => 'UserController@postSaveAccount',
            'as' =>   'account.save', 
			'middleware' => 'auth'
     ]);
	
	Route::get('/history',[
	   'uses' => 'PostController@getDashboard',
	   'as' => 'history',
	   'middleware' => 'auth'
	]);
	Route::get('/studentSelection',[
	   'uses' => 'UserController@getUser',
	   'as' => 'studentSelection'
	]);
	
	Route::get('/dashboard', [
		'uses' => 'PostController@getHistory',
		'as' => 'dashboard',
		'middleware' => 'auth'
	]);
	
   Route::post('/createpost',[
      'uses' => 'PostController@postCreatePost',
	  'as' => 'post.create',
	  'middleware' => 'auth'
     ]);
	 
    Route::get('/delete-post/{post_id}',[
	'uses' => 'PostController@getDeletePost',
	'as' => 'post.delete',
	'middleware' => 'auth'
	]);	 
	Route::	post('/edit', [
	'uses' => 'PostController@postEditPost',
	'as' => 'edit',
	'middleware' => 'auth'
	]);
	
});
