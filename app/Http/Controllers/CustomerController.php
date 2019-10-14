<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;

class CustomerController extends Controller
{
    public function index() {
        $shop = ShopifyApp::shop();
        $request = $shop->api()->rest('GET', '/admin/api/2019-10/customers.json');
        $data = $request->body->customers;
        $response = json_encode($data);

        return view('welcome',compact('response'));
    }

    public function create() {
        $shop = ShopifyApp::shop();
        $request = $shop->api()->rest('POST', '/admin/api/2019-10/customers.json', [
            'customer' => [
                'first_name' => 'Dmitriy',
                'email' => 'test@test.com',
                'pasword' => 'test123',
            ]
        ]);
    }
}