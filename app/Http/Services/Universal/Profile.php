<?php

namespace App\Http\Services\Universal;

use App\Http\Services\Endpoints;

class Profile extends Endpoints {

    function ProfileView ($access_token) { 
        $profile_curl = curl_init();

        curl_setopt_array($profile_curl, [

            CURLOPT_URL => $this -> ProfileEndpoint, 
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

        $profile_response = curl_exec($profile_curl);
        $profile_error    = curl_error($profile_curl);

        // category curl
        curl_close($profile_curl);

        if ($profile_error) { echo "<h1>500 server error</h1>"; }

        else { return json_decode($profile_response, false); }
    }


    function EditProfile ($body_requests, $access_token) {
        $edit_profile_curl = curl_init();

        curl_setopt_array($edit_profile_curl, [

            CURLOPT_URL => $this -> EditProfileEndpoint,
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

        $edit_profile_response = curl_exec($edit_profile_curl);
        $edit_profile_error    = curl_error($edit_profile_curl);

        // close curl
        curl_close($edit_profile_curl);

        if ($edit_profile_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($edit_profile_response, false); }
    }

}