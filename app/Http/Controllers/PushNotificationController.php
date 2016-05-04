<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use PushNotification;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class PushNotificationController extends Controller
{
    public function sendNotificationToDevice()
    {

        $token = 'eDEH7Bj7mdg:APA91bH7xLUihgeOiS3PZREi6z879ZxwqdaLRSwxU3_lJQ_cWCcC5xLsExzzFw0aCtqWVpqBdepFUth_niokTpUTiYcWCa-U2LfkAb81fIrI310i_po2TlP5lZzkxsWCEGwllWpgVV0r';
        $token1='c0OuTKBHW9Q:APA91bE_s4-iDlC2qARsxZxL1oye85SBLSInbrZPZrlOzbcF_IKHpISWwQXF3eYw68i6LZOZzHUV9MZB5wzwycLa4qjsWN7zfRNCl_UocPe3Y8RwkrPA9VsDjSiistj-0o3JtaDM5ytR';
        //$tok= Session::get("atok");
        $devices = PushNotification::DeviceCollection(array(
            PushNotification::Device($token),
            PushNotification::Device($token1)
        ));

       //$message = 'We have successfully sent a push notification!';
        $dIdPost = Session::get('id_post');
        $oPost = DB::table("posts")->where("id","=",$dIdPost)->get();
        $Post=$oPost[0]->body;
        $dIdRole = Session::get("id_role");


        if($dIdRole == 1){
            //Departments ids
        }elseif ($dIdRole == 2){

        }
        $oJSONobj = json_encode(array("id_role"=>$dIdRole,"message"=>$Post));

        // Send the notification to the device with a token of $deviceToken
        $collection = PushNotification::app('appNameAndroid')
            ->to($devices)
            ->send($oJSONobj);

        return redirect('dashboard')->with('status', 'Message sent successfully');
    }
}
