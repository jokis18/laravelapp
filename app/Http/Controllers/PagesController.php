<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;

class PagesController extends Controller
{
    public function index() 
    {
        $shop = ShopifyApp::shop();
        $request = $shop->api()->rest('GET', '/admin/api/2019-10/pages.json');
        $data = $request->body->pages;

        return view('export', compact('data'));
    }

    public function export($id) 
    {
        $headers = [
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=page.csv',
            'Pragma'              => 'public',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0'
        ];

        $shop = ShopifyApp::shop();
        $request = $shop->api()->rest('GET', '/admin/api/2019-10/pages/'.$id.'.json', );
        $data = $request->body->page; 
        $list = json_decode(json_encode($data), true);

        $callback = function () use ($list)
        {
            $fh = fopen('php://output', 'w') or die ("Can't find the file");
            fputcsv($fh, $list);
            fclose($fh);
        };

        return response()->stream($callback, 200, $headers);
    }
}
