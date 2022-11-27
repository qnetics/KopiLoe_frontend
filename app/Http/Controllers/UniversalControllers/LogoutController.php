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


// Import Auth Modules
use App\Http\Services\Auth\Logout;



// Controller For Index Page
class LogoutController extends Controller {

    // Logout Method
    function Logout(Request $Request) {

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

            // Logout Action
            $logout_object = new Logout();
            $logout_object -> LogoutAction(
                Cookie::get('Token'));

            Cookie::queue(
                Cookie::forget('Token')
            );

            return redirect() -> route("home");

        }

    }
    
}
