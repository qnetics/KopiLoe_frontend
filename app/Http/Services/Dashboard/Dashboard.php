<?php

namespace App\Http\Services\Dashboard;

use App\Http\Services\Endpoints; 

class Dashboard extends Endpoints {

    // Dashboard View
    function DashboardView ($access_token) {
        $dashboard_view_curl = curl_init();

        curl_setopt_array($dashboard_view_curl, [

            CURLOPT_URL => $this -> DashboardEndpoint,
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

        $dashboard_view_response = curl_exec($dashboard_view_curl);
        $dashboard_view_error    = curl_error($dashboard_view_curl);

        // close curl
        curl_close($dashboard_view_curl);

        if ($dashboard_view_error) { echo "<h1>500 server error</h1>"; }
        else { return json_decode($dashboard_view_response, false); }
    }

}