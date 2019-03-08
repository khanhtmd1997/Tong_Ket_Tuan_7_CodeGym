<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function welcome(){
    	$products = Product::all();
    	return view('index',compact(['products']));
    }

    public function show($id){
   		$productKey = 'product_' . $id;

   		if(Session::has($productKey)){
   			Product::where('id',$id)->increment('view_count');
   			Session::put($productKey,1);
   		}
   		
   		$product = Product::findOrFail($id);
   		Session::put($productKey,$product->view_count);
   		return view('show',compact('product'));
   	}

   	 public function showBuy($id){
   	 	$productKey = 'product_' . $id;
   	 	if(Session::has($productKey)){
   	 		Session::put($productKey);
   	 	}
    	$product = Product::findOrFail($id);
    	return view('showBuy',compact(['product']));
    }

    public function index(){
    	$products = Product::paginate(5);
    	return view('product.list',compact(['products']));
    }

    public function create(){
    	return view('product.create');
    }

    public function store(Request $request){
    	$products = new Product();
    	$products->name = $request->input('name');
    	$products->description = $request->input('description');
    	$products->price = $request->input('price');
    	if($request->hasFile('picture')){
    		$picture = $request->file('picture');
    		$path = $picture->store('picture','public');
    		$products->picture = $path;
    	}
    	$products->view_count = $request->input('view_count');
    	if($products->view_count != 0){
    		$products->view_count = 0;
    	}
    	$products->save();
    	Session::flash('success', 'Thêm sản phẩm thành công');
    	return redirect()->route('product.index');
    }

    public function edit($id){
    	$product = Product::findOrFail($id);
    	return view('product.edit',compact(['product']));
    }

    public function update(Request $request, $id){
    	$product = Product::findOrFail($id);
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	if($request->hasFile('picture')){
    		$currentImg = $product->picture;
    		if($currentImg){
    			Storage::delete('/public/' . $currentImg);
    		}
    		$picture = $request->file('picture');
    		$path = $picture->store('picture','public');
    		$product->picture = $path;
    	}
    	
    	$product->save();
    	Session::flash('success', 'Cập nhật sản phẩm thành công');
    	return redirect()->route('product.index');;
    }

    public function destroy($id){
    	$product = Product::findOrFail($id);
  		$product->delete();
  		Session::flash('success',"Xóa thành công");
  		return redirect()->route('product.index');
    }



}
