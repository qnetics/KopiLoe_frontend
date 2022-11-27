<?php

namespace App\Http\Controllers\AdminControllers;

// Import HTTP Modules
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Import Controller Modules
use App\Http\Controllers\Controller;

// Import Universal Modules
use App\Http\Services\Universal\Profile;

// Import Dasboard Modules
use App\Http\Services\Dashboard\Dashboard;


class AdminDashboardController extends Controller {

    public function DashboardView (Request $Request) { 

        // Cookie::queue('name', "test");
        // echo Cookie::get('name');

        // pelanggan : users
        // produk : products
        // pesanan : orders
        // pemasukan : accept orders 

        if (Cookie::get('Token') == (null || "")) {

            return redirect() -> route("home");
        }

        // Get client profile
        $profile_object = new Profile();
        $profile_decode_json = $profile_object -> ProfileView(
            Cookie::get('Token'));  

        // Admin validation
        $is_admin = $profile_decode_json -> data_response -> is_admin;
        if ($is_admin == 1) { 

            // Get dashboard data
            $dashboard_object = new Dashboard();
            $dashboard_decode_json = $dashboard_object -> DashboardView(
                Cookie::get('Token')); 

            return view('AdminPage.dashboard', [
                "username"   => $profile_decode_json -> data_response -> username,
                "parameters" => $dashboard_decode_json -> data_response
            ]);  

        } else { return redirect()->route("home"); }

    }
}
