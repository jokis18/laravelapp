<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;

class ApiController extends Controller
{
    /**
     * Show information about the shop.
     *
     * @return View
     * 
     */
    public function index() {
        $shop = ShopifyApp::shop();
        $request = $shop->api()->rest('GET', '/admin/api/2019-10/shop.json');
        $data = $request->body->shop;
        $collections = $shop->api()->rest('GET', '/admin/api/2019-10/custom_collections/count.json');
        $pages = $shop->api()->rest('GET', '/admin/api/2019-10/pages/count.json');
        $products = $shop->api()->rest('GET', '/admin/api/2019-10/products/count.json');
        $customers = $shop->api()->rest('GET', '/admin/api/2019-10/customers/count.json');


        $info = [
            'data' => $data,
            'collections'  => $collections,
            'pages'   => $pages,
            'products' => $products,
            'customers' => $customers
        ];

        return view('app', compact('info'));
    }
}
