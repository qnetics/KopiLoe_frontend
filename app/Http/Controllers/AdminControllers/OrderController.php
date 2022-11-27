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
use App\Http\Services\Order\OrderService;


class OrderController extends Controller {


    function OrderView (Request $Request) {

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
        
        if ($is_admin != 1) { return redirect() -> route("home"); }

        // Get orders data
        $orders_object = new OrderService();
        $orders_decode_json = $orders_object -> ViewOrder(
            Cookie::get('Token')); 

        return view('AdminPage.orders', [
            "username"   => $profile_decode_json -> data_response -> username,
            "orders" => $orders_decode_json -> data_response
        ]);  

    }


    function ApproveOrder (Request $Request) {

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
        if ($is_admin != 1) { return redirect() -> route("home"); }

        // Body Requests
        $body_requests = array(
            'email'        =>  $Request -> email,
            'product_url'  =>  $Request -> product_url
        );

        // Get client profile
        $approve_object = new OrderService();
        $approve_object -> ApproveOrder(
            $body_requests, Cookie::get('Token'));

        return redirect() -> route("order");

    }


    function DeleteOrder (Request $Request) {
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
        if ($is_admin != 1) { return redirect() -> route("home"); }

        // Body Requests
        $body_requests = array(
            'email'        =>  $Request -> email,
            'product_url'  =>  $Request -> product_url
        );

        // Get client profile
        $approve_object = new OrderService();
        $approve_object -> AdminDeleteOrder(
            $body_requests, Cookie::get('Token'));

        return redirect() -> route("order");

    }

}