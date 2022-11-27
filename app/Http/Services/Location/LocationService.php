<?php

namespace App\Http\Services\Location;

use App\Http\Services\Endpoints; 

class LocationService extends Endpoints {

    // Show Location Service
    function ShowLocation ($access_token) {
        $show_location_curl = curl_init();

        curl_setopt_array($show_location_curl, [

            CURLOPT_URL => $this -> ShowLocationEndpoint,
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

        $show_location_response = curl_exec($show_location_curl);
        $show_location_error    = curl_error($show_location_curl);

        // close curl
        curl_close($show_location_curl);

        if ($show_location_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($show_location_response, false); }
    }


    // Add Location Service
    function AddLocation ($body_requests, $access_token) {
        $add_location_curl = curl_init();

        curl_setopt_array($add_location_curl, [

            CURLOPT_URL => $this -> AddLocationEndpoint,
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

        $add_location_response = curl_exec($add_location_curl);
        $add_location_error    = curl_error($add_location_curl);

        // close curl
        curl_close($add_location_curl);

        if ($add_location_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($add_location_response, false); }
    }
}