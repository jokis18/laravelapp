<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;

class CustomerController extends Controller
{
    /**
     * Show the list of all customers.
     *
     * @return View
     * 
     */
    public function index() {
        $shop = ShopifyApp::shop();
        $request = $shop->api()->rest('GET', '/admin/api/2019-10/customers.json');
        $data = $request->body->customers;

        return view('view', compact('data'));
    }

    /**
     * Create customer.
     * 
     * @param Request $request
     * @return View
     * 
     */
    public function create(Request $request) {

        $this->validate($request, [
            'inputFirstName'                => 'required',
            'inputLastName'                 => 'required',
            'inputEmail'                    => 'required',
            'inputPhone'                    => 'required',
            'inputPassword'                 => ['required', 
                                                'min:5', 
                                                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X]).*$/'],
            'inputPasswordConfirm'          => 'required',
            'inputTags'                     => 'required',
        ]);

        $shop = ShopifyApp::shop();
        $response = $shop->api()->rest('POST', '/admin/api/2019-10/customers.json', [
            'customer' => [
                'first_name' => $request->input('inputFirstName'),
                'last_name' => $request->input('inputLastName'),
                'email' => $request->input('inputEmail'),
                'phone' => $request->input('inputPhone'),
                'password' => $request->input('inputPassword'),
                'password_confirmation' => $request->input('inputPasswordConfirm'),
                'tags' => $request->input('inputTags'),
            ]
        ]);

        return redirect ('/create')->with('success', 'Customer Created');
    }
}
