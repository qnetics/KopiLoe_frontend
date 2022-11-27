<?php

namespace App\Http\Controllers\AdminControllers;

// Import HTTP Modules
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Import Controller Modules
use App\Http\Controllers\Controller;

// Import Universal Modules
use App\Http\Services\Universal\Profile;
use App\Http\Services\Auth\RegisterAdmin;


class RegisterAdminController extends Controller {

    function RegisterAdminView (Request $Request) {
        if (Cookie::get('Token') == (null || "")) {

            return redirect() -> route("home");
        }

        // Get client profile
        $profile_object = new Profile();
        $profile_decode_json = $profile_object -> ProfileView(
            Cookie::get('Token'));

        if ($profile_decode_json -> http_status_code != 200) {

            return redirect()->route("home"); 
        }   

        $is_admin = $profile_decode_json -> data_response -> is_admin;
        if ($is_admin != 1) { return redirect()->route("home"); }
        
        return view('AdminPage.registerAdmin',[
            "username"   => $profile_decode_json -> data_response -> username
        ]);  

    }


    function RegisterAdmin (Request $Request) {
        if (Cookie::get('Token') == (null || "")) {

            return redirect() -> route("home");
        }

        // Get client profile
        $profile_object = new Profile();
        $profile_decode_json = $profile_object -> ProfileView(
            Cookie::get('Token'));

        if ($profile_decode_json -> http_status_code != 200) {

            return redirect()->route("home"); 
        }   

        $is_admin = $profile_decode_json -> data_response -> is_admin;
        if ($is_admin != 1) { return redirect()->route("home"); }

        $body_requests = array(
            'username' =>  $Request -> username,
            'password' =>  $Request -> password,
            'email'    =>  $Request -> email,
        );

        // Get client profile
        $register_admin_object = new RegisterAdmin();
        $register_admin_decode_json = $register_admin_object -> AddNewAdmin(
            $body_requests, Cookie::get('Token'));
        
        return redirect()->route("dashboard");  

    }

}