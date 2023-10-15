<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    $customers=Customer::all();
    return view('admin.customers.all',compact('customers'));
  }

  // public function create()
  // {
  //     return view('admin.categories.create');
  // }

  public function store(Request $request)
  {
    $this->validate( $request,[
      'name'=>'required',
    ],
    [
      'name.required'=>'يرجى ادخال نوع العقار',
    ]
  );
  $add = new Customer;
  if($file=$request->file('picture'))
  {
    $file_extension = $request -> file('picture') -> getClientOriginalExtension();
    $file_name = time().'.'.$file_extension;
    $file_nameone = $file_name;
    $path = 'img/';
    $request-> file('picture') ->move($path,$file_name);
    $add->picture  =$file_nameone;
  }
  $add->name= $request->name;
  $add->email= $request->email;
  $add->password= $request->password;
  $add->nationality= $request->nationality;
  $add->address= $request->address;


  $add->save();
  return redirect()->back()->with("message", 'تم الإضافة بنجاح');
}


// public function edit(Category $category)
// {
//     return view('admin.categories.edit',compact('category'));
// }

public function update(Request $request)
{
  $this->validate( $request,[
    'name'=>'required',
  ],
  [
    'name.required'=>'يرجى ادخال نوع العقار',
  ]
);

$edit = Customer::findOrFail($request->id);
if($file=$request->file('picture'))
{
  $file_extension = $request -> file('picture')-> getClientOriginalExtension();
  $file_name = time().'.'.$file_extension;
  $file_nameone = $file_name;
  $path = 'img/';
  $request-> file('picture') ->move($path,$file_name);
  $edit->picture = $file_nameone;
}else{
  $edit->picture = $edit->picture;
}
$edit->name    = $request->name;
$edit->email    = $request->email;
// $edit->password    = $request->password;
$edit->nationality    = $request->nationality;
$edit->address    = $request->address;


$edit->save();
return redirect()->route('customers.index')->with("message", 'تم التعديل بنجاح');
}

public function destroy(Request $request )
{
  $customer = Customer::findOrFail($request->id);
  $customer->delete();
  return redirect()->route('customers.index')->with("message",'تم الحذف بنجاح');
}
}
