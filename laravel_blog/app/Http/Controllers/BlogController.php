<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use http\Env\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(){
    	$blogs = Blog::all();
    	return view('blogs.list',compact(['blogs']));
    }


    public function create(){
    	return view('blogs.create');
    }

    public function store(Request $request){
    	$blogs = new Blog();
    	$blogs->title = $request->input('title');
    	$blogs->summary = $request->input('summary');
    	$blogs->content = $request->input('content');

    	//upfile
    	if($request->hasFile('picture')){
    		$picture = $request->file('picture');
    		$path = $picture->store('picture','public');
    		$blogs->picture = $path;
    	}

    	Session::flash('success',"Tạo thành công");
    	$blogs->save();

    	return redirect()->route('blogs.index');
    }

    public function edit($id){
      	$blog = Blog::findOrFail($id);
      	return view('blogs.edit', compact('blog'));
  	}

  	public function update(Request $request, $id){
  		$blog = Blog::findOrFail($id);
  		$blog->title = $request->input('title');
    	$blog->summary = $request->input('summary');
    	$blog->content = $request->input('content');
    	if($request->hasFile('picture')){
    		$currentImg = $blog->picture;
    		if ($currentImg) {
              	Storage::delete('/public/' . $currentImg);
          	}
          	$picture = $request->file('picture');
    		$path = $picture->store('picture','public');
    		$blog->picture = $path;
    	}
    	$blog->save();
    	Session::flash('success',"Cập nhật thành công");
    	return redirect()->route('blogs.index');
  	}

  	public function destroy($id){
  		$blog = Blog::findOrFail($id);
  		$picture = $blog->picture;
  		if($picture){
  			Storage::delete('/public'. $picture);
  		}
  		$blog->delete();
  		Session::flash('success',"Xóa thành công");
  		return redirect()->route('blogs.index');
  	}
}
