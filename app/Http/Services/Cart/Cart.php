<?php

namespace App\Http\Services\Cart;

use App\Http\Services\Endpoints;  

class Cart extends Endpoints {

    // Add cart method
    function AddCart ($body_requests, $access_token) {
        $add_cart_curl = curl_init();

        curl_setopt_array($add_cart_curl, [

            CURLOPT_URL => $this -> AddCartEndpoint,
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

        $add_cart_response = curl_exec($add_cart_curl);
        $add_cart_error    = curl_error($add_cart_curl);

        // close curl
        curl_close($add_cart_curl);

        if ($add_cart_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($add_cart_response, false); }
    }



    // Add cart method
    function ShowCart ($access_token) {
        $show_cart_curl = curl_init();

        curl_setopt_array($show_cart_curl, [

            CURLOPT_URL => $this -> ShowCartEndpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                'Token: '.$access_token
            ]

        ]);

        $show_cart_response = curl_exec($show_cart_curl);
        $show_cart_error    = curl_error($show_cart_curl);

        // close curl
        curl_close($show_cart_curl);

        // echo var_dump(json_decode($show_cart_response, true)["data_response"]["detail_cart "][0]);

        if ($show_cart_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($show_cart_response, true); }
    }


    function UpdateCart ($body_requests, $access_token) {
        $update_cart_curl = curl_init();

        curl_setopt_array($update_cart_curl, [

            CURLOPT_URL => $this -> EditCartEndpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => json_encode($body_requests),
            CURLOPT_HTTPHEADER => [
                'Token: '.$access_token
            ]

        ]);

        $update_cart_response = curl_exec($update_cart_curl);
        $update_cart_error    = curl_error($update_cart_curl);

        // close curl
        curl_close($update_cart_curl);

        if ($update_cart_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($update_cart_response, false); }
    }


    function DeleteCart ($body_requests, $access_token) {
        $delete_cart_curl = curl_init();

        curl_setopt_array($delete_cart_curl, [

            CURLOPT_URL => $this -> DeleteCartEndpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_POSTFIELDS => json_encode($body_requests),
            CURLOPT_HTTPHEADER => [
                'Token: '.$access_token
            ]

        ]);

        $delete_cart_response = curl_exec($delete_cart_curl);
        $delete_cart_error    = curl_error($delete_cart_curl);

        // close curl
        curl_close($delete_cart_curl);

        if ($delete_cart_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($delete_cart_response, false); }
    }

}