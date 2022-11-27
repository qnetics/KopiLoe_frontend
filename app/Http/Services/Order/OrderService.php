<?php

namespace App\Http\Services\Order;

use App\Http\Services\Endpoints; 

class OrderService extends Endpoints {

    // Admin View Order Method
    function ViewOrder ($access_token) {
        $order_view_curl = curl_init();

        curl_setopt_array($order_view_curl, [

            CURLOPT_URL => $this -> AdminViewOrderEndpoint,
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

        $order_view_response = curl_exec($order_view_curl);
        $order_view_error    = curl_error($order_view_curl);

        // close curl
        curl_close($order_view_curl);

        if ($order_view_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($order_view_response, false); }
    }


    // User View Order Method
    function UserViewOrder ($access_token) {
        $order_view_curl = curl_init();

        curl_setopt_array($order_view_curl, [

            CURLOPT_URL => $this -> UserViewOrderEndpoint,
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

        $order_view_response = curl_exec($order_view_curl);
        $order_view_error    = curl_error($order_view_curl);

        // close curl
        curl_close($order_view_curl);

        if ($order_view_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($order_view_response, false); }
    }
 

    // Add Order Method
    function AddOrder ($access_token) {
        $add_order_curl = curl_init();

        curl_setopt_array($add_order_curl, [

            CURLOPT_URL => $this -> AddOrderEndpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => [
                'Token: '.$access_token
            ]
        ]);

        $add_order_response = curl_exec($add_order_curl);
        $add_order_error    = curl_error($add_order_curl);

        // close curl
        curl_close($add_order_curl);

        if ($add_order_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($add_order_response, false); }
    }


    function ApproveOrder ($body_requests, $access_token) {
        $approve_order_curl = curl_init();

        curl_setopt_array($approve_order_curl, [

            CURLOPT_URL => $this -> ApproveOrderEndpoint,
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

        $approve_order_response = curl_exec($approve_order_curl);
        $approve_order_error    = curl_error($approve_order_curl);

        // close curl
        curl_close($approve_order_curl);

        if ($approve_order_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($approve_order_response, false); }
    }


    function AdminDeleteOrder ($body_requests, $access_token) {
        $delete_order_curl = curl_init();

        curl_setopt_array($delete_order_curl, [

            CURLOPT_URL => $this -> AdminDeleteOrder,
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

        $delete_order_response = curl_exec($delete_order_curl);
        $delete_order_error    = curl_error($delete_order_curl);

        // close curl
        curl_close($delete_order_curl);

        if ($delete_order_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($delete_order_response, false); }
    }

}