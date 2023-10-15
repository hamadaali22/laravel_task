<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Customer;

class DashBoardController extends Controller
{


  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {

    $customers=Customer::get();
    $customers_count=count($customers);

    return view('admin.index_admin',compact('customers_count'));
  }

}
