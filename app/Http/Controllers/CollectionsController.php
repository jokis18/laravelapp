<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;

class CollectionsController extends Controller
{
    public function index() 
    {
        $shop = ShopifyApp::shop();
        $request = $shop->api()->rest('GET', '/admin/api/2019-10/custom_collections.json');
        $data = $request->body->custom_collections;

        return view('collection', compact('data'));
    }

    public function export($id) 
    {
        //HEADERS
        $headers = [
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=page.csv',
            'Pragma'              => 'public',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0'
        ];

        $shop = ShopifyApp::shop();
        $request = $shop->api()->rest('GET', '/admin/api/2019-10/custom_collections/'.$id.'.json');
        $data = $request->body->custom_collection; 
        $list = json_decode(json_encode($data), true);

        //FIRST ROW OF THE CSV FILE
        $columns = array(
            'Collection_ID',
            'Handle',
            'Title',
            'Updated_at',
            'Body_HTML',
            'Published_at',
            'Sort Order',
            'Template_Suffix',
            'Published_Scope',
            'Admin GraphQL API ID',
            'Product Info',
            'Product Handle'
        );

        $product_request = $shop->api()->rest('GET', '/admin/api/2019-10/products.json', ['collection_id' => $id]);
        $product_data = $product_request->body->products;
        $data_list = json_decode(json_encode($product_data), true);

        foreach($data_list as $handle) {
            $product_handle = $handle['handle'];
        }
        $list[] = $product_handle;

        $callback = function () use ($list, $columns)
        {
            $fh = fopen('php://output', 'w') or die ("Can't find the file");
            fputcsv($fh, $columns);
            fputcsv($fh, $list);
            fclose($fh);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportAll() 
    {
        //HEADERS
        $headers = [
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=page.csv',
            'Pragma'              => 'public',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0'
        ];

        //FIRST ROW OF THE CSV FILE
        $columns = array(
            'Collection_ID',
            'Handle',
            'Title',
            'Updated_at',
            'Body_HTML',
            'Published_at',
            'Sort Order',
            'Template_Suffix',
            'Published_Scope',
            'Admin GraphQL API ID',
            'Product Handle'
        );

        //GET CUSTOM_COLLECTION INFO
        $shop = ShopifyApp::shop();
        $request = $shop->api()->rest('GET', '/admin/api/2019-10/custom_collections.json', );
        $lists = [];
        foreach($request->body->custom_collections as $collection){
            $string = '';
            $product_request = $shop->api()->rest('GET', '/admin/api/2019-10/products.json', ['collection_id' => $collection->id]);

            foreach($product_request->body->products as $product) {
                $handle = $product->handle;
                $string .= $handle . " , ";  
            } 

            $collection->product_handle = $string;
            $lists[] = json_decode(json_encode($collection), true);
        }

        $callback = function () use ($lists, $columns)
        {
            $fh = fopen('php://output', 'w') or die ("Can't find the file");
            fputcsv($fh, $columns);
            foreach($lists as $row) 
            {
                fputcsv($fh, $row);
            }
            fclose($fh);
        };   

        //DOWNLOAD THE FILE
        return response()->stream($callback, 200, $headers);
    }

    public function import(Request $request) 
    {
        //CHECK IF FILE EXISTS
        if ($request->file('file') != null){
            $file = $request->file('file');
            
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();

            //VALID FILE EXTENSION
            $valid_extension = array('csv');

            //FILE SIZE
            $maxFileSize = 2097152;

            if(in_array(strtolower($extension), $valid_extension))
            {
                if($fileSize <= $maxFileSize) {
                    $location = 'uploads';
                    $file->move($location, $filename);
                    $filepath = public_path($location.'/'.$filename);
                    $handle = fopen($filepath, 'r');

                    $rowCounter = 0;
                    while(($rowData = fgetcsv($handle, 1000, ',')) != False) 
                    {
                        if (0 === $rowCounter) {
                            $headerRecord = $rowData;
                        } else {
                            foreach ($rowData as $key=>$value) {
                                $assocData[ $rowCounter - 1][ $headerRecord[$key]] = $value;
                            }
                        }
                        $rowCounter++;
                    }
                    fclose($handle);

                    //INSERT CSV DATA TO CUSTOM_COLLECTION
                    $shop = ShopifyApp::shop();
                    for ($i = 0; $i < count($assocData); $i++) {
                        $response = $shop->api()->rest('POST', '/admin/api/2019-10/custom_collections.json', [
                            'custom_collection' => [
                                'handle' => $assocData[$i]['Handle'],
                                'title' => $assocData[$i]['Title'],
                                'body_html' => $assocData[$i]['Body_HTML'],
                                'sort_order' => $assocData[$i]['Sort Order'],
                                'published_scope' => $assocData[$i]['Published_Scope']
                            ]
                        ]);

                        //IF COLLECTION EXISTS
                        if($response->body) {
                            $collection_id = $response->body->custom_collections->id;

                        //IF NOT
                        } else {
                            //FIND COLLECTION ID BY THE HANDLE
                            $request_handle = $shop->api()->rest('GET', '/admin/api/2019-10/custom_collections.json', ['handle' => $assocData[$i]['Handle']]);
                            $collection_id = reset($request_handle->body->custom_collections)->id;
                        } 

                        if($collection_id != NULL) {
                            $products = $assocData[$i]['Product Handle'];
                            $products = explode(',', $products);

                            foreach($products as $product) {
                                $product_response = $shop->api()->rest('GET', '/admin/api/2019-10/products.json', ['handle' => $product]);
                                if(empty($product_id)) {
                                    return redirect ('/import_collection')->with('error', 'Products do not exist');
                                } else {
                                    $product_id = reset($product_response->body->products)->id;
                                    $product_request = $shop->api()->rest('POST', '/admin/api/2019-10/collects.json', [
                                        'collect' => [
                                            'product_id' => $product_id,
                                            'collection_id' => $collection_id
                                        ],
                                    ]);
                                }
                            }
                        }
                        
                    }
                    } else {
                    return redirect ('/import_collection')->with('error', 'File is too large');
                }
            } else {
                return redirect ('/import_collection')->with('error', 'Invalid file extension');
            }
        }
        return redirect ('/collection')->with('success', 'File Uploaded');
    }
}