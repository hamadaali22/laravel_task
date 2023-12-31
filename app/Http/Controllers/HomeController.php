<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $customers=Customer::get();
        $customers_count=count($customers);
       
        return view('admin.index_admin',compact('customers_count'));
    }
}
