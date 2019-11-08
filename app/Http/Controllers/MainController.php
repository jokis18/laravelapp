<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;

class MainController extends Controller
{
    public $headers;
    public $columns;

    function __construct()
    {
        $this->headers = [
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=page.csv',
            'Pragma'              => 'public',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0'
        ];

        $this->columns = [
            'Page_ID',
            'Page_Title',
            'Shop_ID',
            'Handle',
            'Page_Body_HTML',
            'Page_Author',
            'Page_Created_at',
            'Page_Updated_at',
            'Page_Published_at',
            'Page_Template_suffix',
            'Page_Admin_GraphQL_API_ID',
            'Customer_ID',
            'Customer_Email',
            'Customer_Accepts_Marketing',
            "Customer_Created_at",
            "Customer_Updated_at",
            "Customer_First_Name",
            "Customer_Last_Name",
            "Customer_Orders_Count",
            "Customer_State",
            "Customer_Total_Spent",
            "Customer_Last_Order_Id",
            "Customer_Note",
            "Customer_Verified_Email",
            "Customer_Multipass_Identifier",
            "Customer_Tax_Exempt",
            "Customer_Phone",
            "Customer_Tags",
            "Customer_Last_Order_Name",
            "Customer_Currency",
            "Customer_Addresses",
            "Customer_accepts_marketing_updated_at",
            "Customer_marketing_opt_in_level",
            "Customer_tax_exemptions",
            "Customer_admin_graphql_api_id",
            "Customer_Default_addresses"
        ];
    }

    /**
     * Export all pages to the csv file.
     * 
     * @return View
     * 
     */
    public function exportAll() 
    {        
        $shop = ShopifyApp::shop();
        //Get pages info
        $page_request = $shop->api()->rest('GET', '/admin/api/2019-10/pages.json', );
        $page_data = $page_request->body->pages; 
        $list = json_decode(json_encode($page_data), true);

        //Get customers info
        $customer_request = $shop->api()->rest('GET', '/admin/api/2019-10/customers.json', );
        $customer_data = $customer_request->body->customers; 
        $customer_list = json_decode(json_encode($customer_data), true);

        $columns = $this->columns;
        $callback = function () use ($list, $customer_list, $columns)
        {
            $fh = fopen('php://output', 'w') or die ("Can't find the file");
            fputcsv($fh, $columns);
            foreach($list as $row) 
            {
                fputcsv($fh, $row);
            }
            fclose($fh);
        };

        return response()->stream($callback, 200, $this->headers);
    }
}
