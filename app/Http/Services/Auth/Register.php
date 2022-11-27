<?php

namespace App\Http\Services\Auth;

use App\Http\Services\Endpoints;

class Register extends Endpoints {

    function RegisterView ($body_requests) {
        $register_curl = curl_init();

        curl_setopt_array($register_curl, [

            CURLOPT_URL => $this -> RegisterEndpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30, 
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($body_requests)
        ]);

        $register_response = curl_exec($register_curl);
        $register_error    = curl_error($register_curl);

        // close curl
        curl_close($register_curl);

        if ($register_error) { echo "<h1>500 server error</h1>"; }

        else { return json_decode($register_response, false); }
    }

}