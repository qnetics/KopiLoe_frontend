<?php

namespace App\Http\Controllers\UniversalControllers;

// Import HTTP Modules
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Import Controller Modules
use App\Http\Controllers\Controller;

// Import Universal Modules
use App\Http\Services\Universal\Profile;


class ProfileController extends Controller {


    function ShowProfile (Request $Request) {
        if (Cookie::get('Token') == (null || "")) {

            return redirect() -> route("home");
        }

        // Get client profile
        $profile_object = new Profile();
        $profile_decode_json = $profile_object -> ProfileView(
            Cookie::get('Token'));

        if ($profile_decode_json -> http_status_code != 200) {

            return redirect() -> route("home");
        }  

        $is_admin = $profile_decode_json -> data_response -> is_admin;

        if ($is_admin == 1) {  
            return view('AdminPage.profile', [

                "profile" => $profile_decode_json -> data_response
            ]);

        } else {

            return view('UserPage.profile', [

                // authorization indicator
                "message" => null,
                "failed"  => false,
                "type"    => null,
                "login_success" => true,
    
                // cart indicator
                "cart_active"   => true,

                // user data
                "profile" => $profile_decode_json -> data_response
            ]);
        }
    }


    function EditProfile (Request $Request) {
        if (Cookie::get('Token') == (null || "")) {

            return redirect() -> route("home");
        }

        // Get client profile
        $profile_object = new Profile();
        $profile_decode_json = $profile_object -> ProfileView(
            Cookie::get('Token'));

        if ($profile_decode_json -> http_status_code != 200) {

            return redirect() -> route("home");
        }  


        // body request
        $body_requests = array();

        // username validation
        if ($Request -> username != NULL) {

            $body_requests['username'] = $Request -> username;
        }

        // email validation
        if ($Request -> email != NULL) {

            $body_requests['email'] = $Request -> email;
        }

        // password validation
        if ($Request -> password != NULL) {

            $body_requests['password'] = $Request -> password;
        }

        $profile_object -> EditProfile(
            $body_requests,
            Cookie::get('Token'),
        );

        return redirect() -> route("profile");

    }

}