<?php

namespace App\Http\Services\Product;

use App\Http\Services\Endpoints;

class Categories extends Endpoints {


    function CategoriesView () {
        $categories_curl = curl_init();

        curl_setopt_array($categories_curl, [

            CURLOPT_URL => $this -> CategoriesEndpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ]);

        $categories_response = curl_exec($categories_curl);
        $categories_error    = curl_error($categories_curl);

        // category curl
        curl_close($categories_curl);

        if ($categories_error) { echo "<h1>500 server error</h1>"; }

        else { return json_decode($categories_response, false); }
    }


    function AddCategory ($body_requests, $access_token) {
        $add_categories_curl = curl_init();

        curl_setopt_array($add_categories_curl, [

            CURLOPT_URL => $this -> AddCategoryEndpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($body_requests),
            CURLOPT_HTTPHEADER => [
                'Token: '.$access_token
            ]
        ]);

        $add_categories_response = curl_exec($add_categories_curl);
        $add_categories_error    = curl_error($add_categories_curl);

        // category curl
        curl_close($add_categories_curl);

        if ($add_categories_error) { echo "<h1>500 server error</h1>"; }

        else { return json_decode($add_categories_response, false); }
    }

}