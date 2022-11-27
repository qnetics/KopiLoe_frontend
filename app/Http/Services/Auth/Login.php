<?php

namespace App\Http\Services\Auth;

use App\Http\Services\Endpoints;

class Login extends Endpoints {

    function LoginView ($body_requests) {
        $login_curl = curl_init();

        curl_setopt_array($login_curl, [

            CURLOPT_URL => $this -> LoginEndpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($body_requests)
        ]);

        $login_response = curl_exec($login_curl);
        $login_error    = curl_error($login_curl);

        // close curl
        curl_close($login_curl);

        if ($login_error) { echo "<h1>500 server error</h1>"; }

        else { return json_decode($login_response, false); }
    }

}