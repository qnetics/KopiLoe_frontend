<?php

namespace App\Http\Services;

class Endpoints {

    // Dashboard Endpoint
    public $DashboardEndpoint;

    // Authentication And Authorization Endpoint
    public $LoginEndpoint;
    public $LogoutEndpoint;
    public $RegisterEndpoint;
    public $RegisterAdminEndpoint;

    // Profile Endpoint
    public $ProfileEndpoint;
    public $EditProfileEndpoint;

    // Category Endpoint
    public $CategoriesEndpoint;
    public $AddCategoryEndpoint;

    // Product Endpoint
    public $ProductsEndpoint;
    public $AdminProductEndpoint;
    public $AddProductEndpoint;
    public $EditProductEndpoint;
    public $DeleteProductEndpoint;
    public $DetailProductEndpoint;

    // Cart Endpoint
    public $AddCartEndpoint;
    public $ShowCartEndpoint;
    public $EditCartEndpoint;
    public $DeleteCartEndpoint;

    // Order Endpoint
    public $AdminViewOrderEndpoint;
    public $UserViewOrderEndpoint;
    public $AddOrderEndpoint;
    public $ApproveOrderEndpoint;
    public $AdminDeleteOrder;

    // Location Endpoint
    public $ShowLocationEndpoint;
    public $AddLocationEndpoint;

    function __construct() {

        $ENDPOINT = env('BACKEND_SERVICE_ENDPOINT', 'http://0.0.0.0:8000');

        // Dashboard Endpoint
        $this -> DashboardEndpoint  = $ENDPOINT . "/v1/dashboard";

        // Authentication And Authorization Endpoint
        $this -> LoginEndpoint         = $ENDPOINT . "/v1/login";
        $this -> LogoutEndpoint        = $ENDPOINT . "/v1/logout";
        $this -> RegisterEndpoint      = $ENDPOINT . "/v1/register";
        $this -> RegisterAdminEndpoint = $ENDPOINT . "/v1/register_admin";

        // Universal Endpoint
        $this -> ProfileEndpoint     = $ENDPOINT . "/v1/profile";
        $this -> EditProfileEndpoint = $ENDPOINT . "/v1/edit_profile";

        // Category Endpoint
        $this -> CategoriesEndpoint  = $ENDPOINT . "/v1/categories";
        $this -> AddCategoryEndpoint = $ENDPOINT . "/v1/add_category";

        // Product Endpoint
        $this -> AdminProductEndpoint  = $ENDPOINT . "/v1/products";
        $this -> ProductsEndpoint      = $ENDPOINT . "/v1/products/?limit=50&contain=1";
        $this -> AddProductEndpoint    = $ENDPOINT . "/v1/add_product";
        $this -> EditProductEndpoint   = $ENDPOINT . "/v1/edit_product/";
        $this -> DeleteProductEndpoint = $ENDPOINT . "/v1/delete_product/";
        $this -> DetailProductEndpoint = $ENDPOINT . "/v1/detail_product/";

        // Cart Endpoint
        $this -> AddCartEndpoint    =  $ENDPOINT . "/v1/add_cart";
        $this -> ShowCartEndpoint   =  $ENDPOINT . "/v1/show_cart";
        $this -> EditCartEndpoint   =  $ENDPOINT . "/v1/update_cart";
        $this -> DeleteCartEndpoint =  $ENDPOINT . "/v1/delete_cart";

        // Order Endpoint
        $this -> AdminViewOrderEndpoint =  $ENDPOINT . "/v1/show_order/admin";
        $this -> UserViewOrderEndpoint  =  $ENDPOINT . "/v1/show_order/user";
        $this -> AddOrderEndpoint       =  $ENDPOINT . "/v1/add_order";
        $this -> ApproveOrderEndpoint   =  $ENDPOINT . "/v1/approve_order";
        $this -> AdminDeleteOrder       =  $ENDPOINT . "/v1/delete_order/admin";

        // Location Endpoint
        $this -> AddLocationEndpoint    =  $ENDPOINT . "/v1/add_location";
        $this -> ShowLocationEndpoint   =  $ENDPOINT . "/v1/show_location";
    }

}