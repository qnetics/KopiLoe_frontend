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


class CartController extends Controller {

    function CartView (Request $Request) {
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

        // add product
        $add_cart_object = new Cart(); 
        $add_cart_decode_json = $add_cart_object -> ShowCart(
            Cookie::get('Token'));

        $total_item = 0;

        foreach ( $add_cart_decode_json["data_response"]["detail_cart "] as $item_cart ) {
            
            $total_item += $item_cart["order_quantity"]; 
        }

        return view('UserPage.cart', [

                // authorization indicator
                "message" => null,
                "failed"  => false,
                "type"    => null,
                "login_success" => true,

                // cart indicator
                "cart_active"   => true,

                // total items
                "items" => $total_item,

                // order datas
                "orders" => $add_cart_decode_json["data_response"]["detail_cart "],
                "total_price" => $add_cart_decode_json["data_response"]["total_price"],
                "api_token"   => Cookie::get('Token')
            ]
        
        );

    }



    function AddCart (Request $Request) {
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
            'product_url'     =>  $Request -> product_url ,
            'order_quantity'  =>  1
        );

        // add product
        $add_cart_object = new Cart(); 
        $add_cart_decode_json = $add_cart_object -> AddCart(
            $body_requests, Cookie::get('Token'));

        // email and password validation
        if ($add_cart_decode_json -> http_status_code != 201) {

            return redirect() -> route("dashboard");
        } 

        return redirect() -> route("cart");
    }



    function AddProductCart (Request $Request) {
        // Validation if token as null or token as empty string
        // with return universal index page.
        if (Cookie::get('Token') == (null || "")) {
            return [
                "status" => "unauthorized"
            ];
        }

        // Get client profile
        $profile_object = new Profile();
        $profile_decode_json = $profile_object -> ProfileView(
            Cookie::get('Token'));

        if ($profile_decode_json -> http_status_code != 200) {
            return [
                "status" => "unauthorized"
            ];
        }

        // admin validation
        $is_admin = $profile_decode_json -> data_response -> is_admin;
        if ($is_admin == 1) {
            return [
                "status" => "failed"
            ];
        }


        // Body Requests
        $body_requests = array(
            'product_url'     =>  $Request -> input('product'),
            'order_quantity'  =>  (int) $Request -> input('quantity')
        );

        // edit cart
        $add_cart_object = new Cart(); 
        $add_cart_decode_json = $add_cart_object -> UpdateCart (
            $body_requests, Cookie::get('Token'));

        // email and password validation
        if ($add_cart_decode_json -> http_status_code != 201) {

            return [
                "status" => "failed"
            ];
        } 

        return [
            "quantity" => $add_cart_decode_json -> data_response -> order_quantity
        ];

        // echo $Request -> input('name');
        // echo Cookie::get('Token');
    }



    function DeleteProductCart (Request $Request) {
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
            'product_url'     =>  $Request -> product_url
        );

        // edit cart
        $add_cart_object = new Cart(); 
        $add_cart_object -> DeleteCart ($body_requests, Cookie::get('Token'));

        return redirect() -> route("cart");
    }

}