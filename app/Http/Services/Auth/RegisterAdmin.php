<?php

namespace App\Http\Services\Auth;

use App\Http\Services\Endpoints; 

class RegisterAdmin extends Endpoints {

    // Register Admin Service
    function AddNewAdmin ($body_requests, $access_token) {
        $register_admin_curl = curl_init();

        curl_setopt_array($register_admin_curl, [

            CURLOPT_URL => $this -> RegisterAdminEndpoint,
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

        $register_admin_response = curl_exec($register_admin_curl);
        $register_admin_error    = curl_error($register_admin_curl);

        // close curl
        curl_close($register_admin_curl);

        if ($register_admin_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($register_admin_response, false); }
    }
}