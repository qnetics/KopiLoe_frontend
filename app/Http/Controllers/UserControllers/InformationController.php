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
use App\Http\Services\Cart\Cart;


class InformationController extends Controller {

    function InformationView (Request $Request) {

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

        return view('UserPage.information', [

            // authorization indicator
            "message" => null,
            "failed"  => false,
            "type"    => null,
            "login_success" => true,

            // cart indicator
            "cart_active"   => true
        ]);
    }

}