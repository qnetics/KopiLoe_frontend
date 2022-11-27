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

// Import Product Modules
use App\Http\Services\Product\Products;
use App\Http\Services\Product\Categories;


class AdminProductController extends Controller {
    

    // product view
    function ProductView (Request $Request) {
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

        if ($is_admin == 1) { 

            $username = $profile_decode_json -> data_response -> username;

            // Get products
            $products_object = new Products();
            $products_decode_json = $products_object -> AdminProductsView();

            return view('AdminPage.products', [

                "username" => $username,
                "data_response" => $products_decode_json -> data_response
            ]);  
            
        } else { return redirect() -> route("home"); }
    }    




    // add product form view
    function AddProductView(Request $Request) {
        if (Cookie::get('Token') == (null || "")) {

            return redirect()->route("home");
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

            // Get product categories
            $categories_object = new Categories();
            $categories_decode_json =  $categories_object -> CategoriesView();

            return view('AdminPage.addProduct', [
                "username"   => $profile_decode_json -> data_response -> username,
                "categories" => $categories_decode_json -> data_response
            ]);  
            
        } else { return redirect()->route("home"); }
    }


    // Add new product 
    function AddNewProduct (Request $Request) {
        if (Cookie::get('Token') == (null || "")) {

            return redirect()->route("home");
        }

        // Get client profile
        $profile_object = new Profile();
        $profile_decode_json = $profile_object -> ProfileView(
            Cookie::get('Token'));

        if ($profile_decode_json -> http_status_code != 200) {

            return redirect() -> route("home"); 
        }   

        $is_admin = $profile_decode_json -> data_response -> is_admin;

        // if user is admin
        if ($is_admin == 1) { 

            // body request
            $product_name     = $Request -> product_name;
            $product_price    = $Request -> product_price;
            $product_category = $Request -> product_category;
            $product_image    = $Request -> file("product_image");

            // change name and upload image
            $filename = date('YmdHi').'_'.$product_category
                .'_'.$product_image -> getClientOriginalName();

            $body_requests = array(
                'product_name'     =>  $product_name ,
                'product_price'    =>  $product_price,
                'product_category' =>  $product_category,
                'product_image'    =>  $filename
            );

            // add product
            $add_product_object = new Products(); 
            $add_product_decode_json = $add_product_object -> AddProduct (
                $body_requests, Cookie::get('Token'));

            // email and password validation
            if ($add_product_decode_json -> http_status_code != 201) {

                return redirect() -> route("dashboard");
            } 

            // save image with new name
            $product_image -> move('uploads', $filename);

            return redirect() -> route("products");
            
        } else { return redirect() -> route("home"); }

    }



    function EditProductShow (Request $Request) {
        if (Cookie::get('Token') == (null || "")) {

            return redirect()->route("home");
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

            // Get product categories
            $categories_object = new Categories();
            $categories_decode_json =  $categories_object -> CategoriesView();

            // Detail Product
            $detail_product_object = new Products();
            $detail_product_decode_json =  $detail_product_object
                -> DetailProduct(
                    $Request -> input('product_url')
                );

            return view('AdminPage.editProduct', [
                "username"   => $profile_decode_json -> data_response -> username,
                "categories" => $categories_decode_json -> data_response,
                "product"    => $detail_product_decode_json -> data_response
            ]);  
            
        } else { return redirect()->route("home"); }
    }



    function EditProduct (Request $Request) {
        if (Cookie::get('Token') == (null || "")) {

            return redirect()->route("home");
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

            // body request
            $body_requests = array();

            // product name validation
            if ($Request -> product_name != NULL) {
                $body_requests['product_name'] = $Request -> product_name;
            }


            // product price validation
            if ($Request -> product_price != NULL) {
                $body_requests['product_price'] = $Request -> product_price;
            }


            // product category validation
            if (($Request -> product_category != NULL) ||
                ($Request -> product_category != "--- Kategori ---")) {
                $body_requests['product_category'] = $Request -> product_category;
            }


            // product image validation
            if (($Request -> file("product_image") != NULL) &&
                ($Request -> product_category != NULL)) {
 
                $body_requests['product_image'] = $Request -> file("product_image");

                $filename = date('YmdHi').'_'.$body_requests['product_category']
                    .'_'.$body_requests['product_image'] -> getClientOriginalName();

                // save image with new name
                $Request -> file("product_image") -> move('uploads', $filename);
            }
            

            // Edit Product
            $edit_product_object = new Products(); 
            $x = $edit_product_object -> EditProduct (
                $Request -> input('product_url'),
                $body_requests,
                Cookie::get('Token'),
            );

            echo var_dump($x);

            return redirect()->route("products");
            
        } else { return redirect()->route("home"); }
    }


    
    function DeleteProduct (Request $Request) {
        if (Cookie::get('Token') == (null || "")) {
            return redirect() -> route("home"); }

        // Get client profile
        $profile_object = new Profile();
        $profile_decode_json = $profile_object -> ProfileView(
            Cookie::get('Token'));

        if ($profile_decode_json -> http_status_code != 200) {
            return redirect()->route("home"); }   

        $is_admin = $profile_decode_json -> data_response -> is_admin;

        if ($is_admin == 1) { 

            // Delete Product
            $delete_product_object = new Products(); 
            $delete_product_object -> DeleteProduct (
                $Request -> input('product_url'),
                Cookie::get('Token')
            );

            return redirect() -> route("products");
            
        } else { return redirect() -> route("home"); }
    }


}