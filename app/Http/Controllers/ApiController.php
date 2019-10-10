<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;

class ApiController extends Controller
{
    public function index() {
        $shop = ShopifyApp::shop();
        $request = $shop->api()->rest('GET', '/admin/api/2019-10/shop.json');
        $data = $request->body->shop;
        $response = json_encode($data);

        return view('welcome',compact('response'));
    }
}
