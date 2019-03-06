<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use http\Env\Response;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    public function index(){
    	$categories = Category::all();
    	return view('categories.list',compact(['categories']));
    }

    public function create(){
    	return view('categories.create');
    }

    public function store(Request $request){
    	$category = new Category();
    	$category->name = $request->input('name');
    	$category->save();
    	return redirect()->route('categories.index');
    }

    public function edit($id){
    	$category = Category::findOrFail($id);
    	return view('categories.edit',compact(['category']));
    }

    public function update(Request $request,$id){
    	$category = Category::findOrFail($id);
    	$category->name = $request->input('name');

    	$category->save();
    	Session::flash('success', 'Cập nhật danh mục thành công');
    	return redirect()->route('categories.index');
    }

    public function destroy($id){
    	$category = Category::findOrFail($id);
    	$category->delete();
    	Session::flash("success","Xóa thành công");
    	return redirect()->route('categories.index');
    }
}
