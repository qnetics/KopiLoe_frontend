<?php

namespace App\Http\Services\Product;

use App\Http\Services\Endpoints; 

class Products extends Endpoints {

    // Products View Especially For Common User
    function ProductsView () {
        $products_curl = curl_init();

        curl_setopt_array($products_curl, [

            CURLOPT_URL => $this -> ProductsEndpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ]);

        $products_response = curl_exec($products_curl);
        $products_error    = curl_error($products_curl);

        // close curl
        curl_close($products_curl);

        if ($products_error) { echo "<h1>500 server error</h1>"; }

        else { return json_decode($products_response, false); }
    }



    // Admin View Products Service
    function AdminProductsView () {
        $products_curl = curl_init();

        curl_setopt_array($products_curl, [

            CURLOPT_URL => $this -> AdminProductEndpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ]);

        $products_response = curl_exec($products_curl);
        $products_error    = curl_error($products_curl);

        // close curl
        curl_close($products_curl);

        if ($products_error) { echo "<h1>500 server error</h1>"; }

        else { return json_decode($products_response, false); }
    }

    
    
    // Add Product Service
    function AddProduct ($body_requests, $access_token) {
        $add_product_curl = curl_init();

        curl_setopt_array($add_product_curl, [

            CURLOPT_URL => $this -> AddProductEndpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($body_requests),
            CURLOPT_HTTPHEADER => [
                'Token: ' . $access_token
            ]

        ]);

        $add_product_response = curl_exec($add_product_curl);
        $add_product_error    = curl_error($add_product_curl);

        // close curl
        curl_close($add_product_curl);

        if ($add_product_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($add_product_response, false); }
    }



    // Delete Product Service
    function DeleteProduct ($url_product, $access_token) {
        $delete_product_curl = curl_init();

        curl_setopt_array($delete_product_curl, [

            CURLOPT_URL => $this -> DeleteProductEndpoint . $url_product,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_HTTPHEADER => [
                'Token: ' . $access_token
            ]

        ]);

        $delete_product_response = curl_exec($delete_product_curl);
        $delete_product_error    = curl_error($delete_product_curl);

        // close curl
        curl_close($delete_product_curl);

        if ($delete_product_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($delete_product_response, false); }
    }



    // Edit Product Service
    function EditProduct ($url_product, $body_requests, $access_token) {
        $edit_product_curl = curl_init();

        curl_setopt_array($edit_product_curl, [

            CURLOPT_URL => $this -> EditProductEndpoint . $url_product,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => json_encode($body_requests),
            CURLOPT_HTTPHEADER => [
                'Token: ' . $access_token
            ]

        ]);

        $edit_product_response = curl_exec($edit_product_curl);
        $edit_product_error    = curl_error($edit_product_curl);

        // close curl
        curl_close($edit_product_curl);

        if ($edit_product_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($edit_product_response, false); }
    }


    // Detail Product Service
    function DetailProduct ($url_product) {
        $detail_product_curl = curl_init();

        curl_setopt_array($detail_product_curl, [

            CURLOPT_URL => $this -> DetailProductEndpoint . $url_product,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"

        ]);

        $detail_product_response = curl_exec($detail_product_curl);
        $detail_product_error    = curl_error($detail_product_curl);

        // close curl
        curl_close($detail_product_curl);

        if ($detail_product_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($detail_product_response, false); }
    }

}