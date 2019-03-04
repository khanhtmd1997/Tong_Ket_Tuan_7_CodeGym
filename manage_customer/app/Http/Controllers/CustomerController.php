<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use http\Env\Response;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index(){
    	$customers = Customer::all();
    	return view('customers.list',compact(['customers']));
    }

    public function create(){
    	return view('customers.create');
    }

    public function store(Request $request){
    	$customer = new Customer();
    	$customer->name = $request->input('name');
    	$customer->email = $request->input('email');
    	$customer->dob = $request->input('dob');
    	$customer->save();

    	//đưa ra thông báo bằng sesion
    	Session::flash("success","Thêm thành công");
    	return redirect()->route('customers.index');

    }

    public function edit($id){
    	$customer = Customer::findOrFail($id);
    	return view('customers.edit',compact(['customer']));
    }

    public function update(Request $request, $id){
    	$customer = Customer::findOrFail($id);
    	$customer->name     = $request->input('name');
      	$customer->email    = $request->input('email');
      	$customer->dob      = $request->input('dob');
      	$customer->save();

      	Session::flash("success","Cập nhật thành công");
    	return redirect()->route('customers.index');
    }

    public function destroy($id){
    	$customer = Customer::findOrFail($id);
    	$customer->delete();

    	Session::flash("success","Cập nhật thành công");
    	return redirect()->route('customers.index');
    }
}
