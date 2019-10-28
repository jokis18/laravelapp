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

        $columns = array(
            'ID',
            'Title',
            'Shop_ID',
            'Handle',
            'Body_HTML',
            'Author',
            'Created_at',
            'Updated_at',
            'Published_at',
            'Template_suffix',
            'Admin_GraphQL_API_ID'
        );

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
        $headers = [
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=page.csv',
            'Pragma'              => 'public',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0'
        ];

        $shop = ShopifyApp::shop();
        $request = $shop->api()->rest('GET', '/admin/api/2019-10/pages.json', );
        $data = $request->body->pages; 
        $list = json_decode(json_encode($data), true);

        $columns = array(
            'ID',
            'Title',
            'Shop_ID',
            'Handle',
            'Body_HTML',
            'Author',
            'Created_at',
            'Updated_at',
            'Published_at',
            'Template_suffix',
            'Admin_GraphQL_API_ID'
        );

        $callback = function () use ($list, $columns)
        {
            $fh = fopen('php://output', 'w') or die ("Can't find the file");
            fputcsv($fh, $columns);
            foreach($list as $row) 
            {
                fputcsv($fh, $row);
            }
            fclose($fh);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function import(Request $request) 
    {
        if ($request->file('file') != null)
        {
            $file = $request->file('file');
            
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();

            $valid_extension = array('csv');

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

                    $shop = ShopifyApp::shop();
                    for ($i = 0; $i < count($assocData); $i++) {
                        $response = $shop->api()->rest('POST', '/admin/api/2019-10/pages.json', [
                            'page' => [
                                'title' => $assocData[$i]['Title'],
                                'handle' => $assocData[$i]['Handle'],
                                'body_html' => $assocData[$i]['Body_HTML'],
                            ]
                        ]);
                    }
                } else {
                    return redirect ('/import')->with('error', 'File is too large');
                }
                
            } else {
                return redirect ('/import')->with('error', 'Invalid file extension');
            }
        }

        return redirect ('/export')->with('success', 'File Uploaded');
    }
}
