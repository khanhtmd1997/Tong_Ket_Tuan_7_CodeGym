<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Session;
use http\Env\Response;
class ProductController extends Controller
{
   	public function index(){
   		$products = Product::all();
   		return view('index',compact(['products']));
   	}

   	public function show($id){
   		$productKey = 'product_' . $id;

   		if(Session::has($productKey)){
   			echo $productKey;
   			Product::where('id',$id)->increment('view_count');
   			Session::put($productKey,1);
   		}  		
   		$product = Product::findOrFail($id);
   		return view('show',compact('product'));
   	}
}
