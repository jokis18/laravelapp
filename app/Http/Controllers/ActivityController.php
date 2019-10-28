<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requests;

class ActivityController extends Controller
{
    public function index() 
    {
        $requests = Requests::orderBy('created_at', 'desc')->paginate(25);
        return view('/activity')->with('requests', $requests);
    }
}
