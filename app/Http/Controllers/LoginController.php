<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller {

    private $LoginEndpoint;

    function __construct() {

        $this -> LoginEndpoint = "http://127.0.0.1:8000/v1/login";
    }
    
    public function LoginView(Request $Request) { return view('UniversalPage.login'); }


}
