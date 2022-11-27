<?php

namespace App\Http\Controllers\UserControllers;


// Import HTTP Modules
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Import Controller Modules
use App\Http\Controllers\Controller;

// Import Product Modules
use App\Http\Services\Product\Products;
use App\Http\Services\Product\Categories;

// Import Universal Modules
use App\Http\Services\Universal\Profile;
use App\Http\Services\Location\LocationService;


class LocationController extends Controller {


    function LocationView (Request $Request) {
        // Validation if token as null or token as empty string
        // with return universal index page.
        if (Cookie::get('Token') == (null || "")) {
            return redirect() -> route("home");
        }

        // Get client profile
        $profile_object = new Profile();
        $profile_decode_json = $profile_object -> ProfileView(
            Cookie::get('Token'));

        // Validation if login success / fail
        // with return universal cart page.
        if ($profile_decode_json -> http_status_code != 200) {
            return redirect() -> route("home"); 
        }

        // admin validation
        $is_admin = $profile_decode_json -> data_response -> is_admin;
        if ($is_admin == 1) { return redirect() -> route("home"); }

        // Get User Location
        $show_location_object = new LocationService();
        $show_location_decode_json = $show_location_object -> ShowLocation(
            Cookie::get('Token'));

        return view('UserPage.location', [

            // authorization indicator
            "message" => null,
            "failed"  => false,
            "type"    => null,
            "login_success" => true,

            // cart indicator
            "cart_active" => true,
            "location"  => $show_location_decode_json
                -> data_response -> user_location
        ]);
    }

    
    function AddLocation (Request $Request) {
        // Validation if token as null or token as empty string
        // with return universal index page.
        if (Cookie::get('Token') == (null || "")) {
            return redirect() -> route("home");
        }

        // Get client profile
        $profile_object = new Profile();
        $profile_decode_json = $profile_object -> ProfileView(
            Cookie::get('Token'));

        // Validation if login success / fail
        // with return universal cart page.
        if ($profile_decode_json -> http_status_code != 200) {
            return redirect() -> route("home"); 
        }

        // admin validation
        $is_admin = $profile_decode_json -> data_response -> is_admin;
        if ($is_admin == 1) { return redirect() -> route("home"); }

        // Body Requests
        $body_requests = array(
            'user_location'     =>  $Request -> user_location
        );

        // Add User Location
        $add_location_object = new LocationService();
        $add_location_object -> AddLocation(
            $body_requests, Cookie::get('Token'));

        return redirect() -> route("user_location");
    }

}