<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        "login",
        "logout",
        "cart",
        "add_to_order",
        "dashboard",
        "add_new_products",
        "user_location",
        "add_location",
        "delete_product",
        "products",
        "edit_product",
        "admin_register_view",
        "admin_register",
        "profile",
        "edit_profile"
    ];
}
