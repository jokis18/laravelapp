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

        return view('app',compact('data'));
    }
}
