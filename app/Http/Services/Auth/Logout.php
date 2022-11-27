<?php

namespace App\Http\Services\Auth;

use App\Http\Services\Endpoints; 

class Logout extends Endpoints {    
    
    // Add product service
    function LogoutAction ($access_token) {
        $logout_curl = curl_init();

        curl_setopt_array($logout_curl, [

            CURLOPT_URL => $this -> LogoutEndpoint,
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

        $logout_response = curl_exec($logout_curl);
        $logout_error    = curl_error($logout_curl);

        // close curl
        curl_close($logout_curl);

        if ($logout_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($logout_response, false); }
    }

}