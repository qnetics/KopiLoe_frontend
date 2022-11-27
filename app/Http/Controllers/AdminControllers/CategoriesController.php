<?php

namespace App\Http\Controllers\AdminControllers;

// Import HTTP Modules
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Http\Response; 

// Import Controller Modules
use App\Http\Controllers\Controller;

// Import Service Modules
use App\Http\Services\Universal\Profile;
use App\Http\Services\Product\Categories;

class CategoriesController extends Controller {
    
    function CategoriesView (Request $Request) {
        // Get product categories
        $categories_object = new Categories();
        $categories_decode_json =  $categories_object -> CategoriesView();

        // Get client profile
        $profile_object = new Profile();
        $profile_decode_json = $profile_object -> ProfileView(
            Cookie::get('Token'));

        // validation if token null or empty
        if (Cookie::get('Token') == (null || "")) { return redirect() -> route("home"); }

        // http status code validation
        if ($profile_decode_json -> http_status_code != 200) { return redirect()
            -> route("home"); }

        // Validation if user not admin
        $is_admin = $profile_decode_json -> data_response -> is_admin;
        if ($is_admin != 1) { return redirect() -> route("home"); }

        return view('AdminPage.categories', [
            "username" => $profile_decode_json -> data_response -> username,
            "categories" => $categories_decode_json -> data_response
        ]);
    }


    function AddCategory (Request $Request) {
        $body_requests = array(
            'product_category'  =>  $Request -> category
        );

        // Add category
        $add_category_object = new Categories();
        $add_category_decode_json = $add_category_object -> AddCategory(
            $body_requests, Cookie::get('Token'));

        return redirect() -> route("categories");
    }

}
