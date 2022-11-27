<?php

namespace App\Http\Controllers\UniversalControllers;


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

// Import Auth Modules
use App\Http\Services\Auth\Login;
use App\Http\Services\Auth\Register;



// Controller For Index Page
class IndexController extends Controller {



    // Method for index view
    function IndexView(Request $Request) {

        // Get product categories
        $categories_object = new Categories();
        $categories_decode_json =  $categories_object -> CategoriesView();

        // Get products
        $products_object = new Products();
        $products_decode_json = $products_object -> ProductsView();

        // Validation if token as null or token as empty string
        // with return universal index page.
        if (Cookie::get('Token') == (null || "")) {
            return view('UniversalPage.index', [

                // authorization indicator
                "message" => null,
                "failed"  => false,
                "type"    => null,
                "login_success" => false,

                // cart indicator
                "cart_active"   => false,

                // products and categories indicator
                "categories" => $categories_decode_json -> data_response,
                "products"   => $products_decode_json -> data_response
            ]);


        } else {

            // Get client profile
            $profile_object = new Profile();
            $profile_decode_json = $profile_object -> ProfileView(
                Cookie::get('Token'));

            // Validation if login success / fail
            // with return universal index page.
            if ($profile_decode_json -> http_status_code != 200) {
                return view('UniversalPage.index', [

                    // authorization indicator
                    "message" => null,
                    "failed"  => false,
                    "type"    => null,
                    "login_success" => false,
    
                    // cart indicator
                    "cart_active"   => false,
    
                    // products and categories indicator
                    "categories" => $categories_decode_json -> data_response,
                    "products"   => $products_decode_json -> data_response
                ]);
            }   

            // admin validation
            $is_admin = $profile_decode_json -> data_response -> is_admin;

            if ($is_admin == 1) {
                return view('UniversalPage.index', [

                    // authorization indicator
                    "message" => null,
                    "failed"  => false,
                    "type"    => null,
                    "login_success" => true,
    
                    // cart indicator
                    "cart_active"   => false,
    
                    // products and categories indicator
                    "categories" => $categories_decode_json -> data_response,
                    "products"   => $products_decode_json -> data_response
                ]);
            } else {
                return view('UniversalPage.index', [

                    // authorization indicator
                    "message" => null,
                    "failed"  => false,
                    "type"    => null,
                    "login_success" => true,
    
                    // cart indicator
                    "cart_active"   => true,
    
                    // products and categories indicator
                    "categories" => $categories_decode_json -> data_response,
                    "products"   => $products_decode_json -> data_response
                ]);
            }

        }

    }



    // Method for login view
    function LoginView(Request $Request) {
        $body_requests = array(
            'email'    =>  $Request -> email,
            'password' =>  $Request -> password
        );

        // Get product categories
        $categories_object = new Categories();
        $categories_decode_json =  $categories_object -> CategoriesView();

        // Get products
        $products_object = new Products();
        $products_decode_json = $products_object -> ProductsView();

        // Login call endpoint
        $login_object = new Login();
        $login_decode_json = $login_object -> LoginView($body_requests);

        // Login validation
        if ($login_decode_json-> http_status_code != 200) {
            return view('UniversalPage.index', [

                // authorization indicator
                "message" => "email / password salah",
                "failed"  => true,
                "type"    => 'login',
                "login_success" => false,
    
                // cart indicator
                "cart_active"   => false,
    
                // products and categories indicator
                "categories" => $categories_decode_json -> data_response,
                "products"   => $products_decode_json -> data_response
            ]);
        }  
        
        // Release token for client
        Cookie::queue('Token', 
            $login_decode_json -> data_response
                -> access_token
        );

        // Get client profile
        $profile_object = new Profile();
        $profile_decode_json = $profile_object -> ProfileView(
            $login_decode_json -> data_response -> access_token);

        // admin validation
        $is_admin = $profile_decode_json -> data_response -> is_admin;

        if ($is_admin == 1) { return redirect() -> route("dashboard"); }
        else { return redirect() -> route("home"); }
    }



    // Method for register view
    function RegisterView(Request $Request) {
        $body_requests = array(
            'username' =>  $Request -> username,
            'email'    =>  $Request -> email,
            'password' =>  $Request -> password
        );

        // Get product categories
        $categories_object = new Categories();
        $categories_decode_json =  $categories_object -> CategoriesView();

        // Get products
        $products_object = new Products();
        $products_decode_json = $products_object -> ProductsView();

        // Get profile
        $register_object = new Register();
        $register_decode_json = $register_object -> RegisterView($body_requests);

        // Register validation
        if ($register_decode_json-> http_status_code != 201) {
            return view('UniversalPage.index', [

                // authorization indicator
                "message" => "Email telah digunakan.",
                "failed"  => true,
                "type"    => 'register',
                "login_success" => false,
    
                // cart indicator
                "cart_active"   => false,
    
                // products and categories indicator
                "categories" => $categories_decode_json -> data_response,
                "products"   => $products_decode_json -> data_response
            ]);
        } 

        return redirect() -> route("home");
    }
    
}
