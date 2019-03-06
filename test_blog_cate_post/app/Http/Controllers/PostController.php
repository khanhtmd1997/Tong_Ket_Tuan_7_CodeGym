<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use http\Env\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function index(){
    	$posts = Post::paginate(5);
    	$categories = Category::all();
    	return view('posts.list',compact(['posts','categories']));
    }

    public function create(){
    	return view('posts.create');
    }

    public function store(Request $request){
    	$posts = new Post();
    	$posts->title = $request->input('title');
    	$posts->summary = $request->input('summary');
    	$posts->content = $request->input('content');
    	if($request->hasFile('picture')){
    		$picture = $request->file('picture');
    		$path = $picture->store('picture','public');
    		$posts->picture = $path;
    	}
    	$posts->category_id  = $request->input('category_id');
    	if($posts->category_id == 1){
    		$posts->category_id = 'Văn Hóa';
    	}else if($posts->category_id == 1){
    		$posts->category_id = 'Du Lịch';
    	}else $posts->category_id = 'Ẩm Thực';
    	$posts->save();
    	Session::flash('success', 'Thêm bài viết thành công');
    	return redirect()->route('posts.index');
    }


    public function edit($id){
    	$post = Post::findOrFail($id);
    	$categories = Category::all();

    	return view('posts.edit',compact('post','categories'));
    }

    public function update(Request $request,$id){
    	$post = Post::findOrFail($id);
    	$post->title = $request->input('title');
    	$post->summary = $request->input('summary');
    	$post->content = $request->input('content');
    	if($request->hasFile('picture')){
    		$currentImg = $post->picture;
    		if($currentImg){
    			Storage::delete('/public/' . $currentImg);
    		}
    		$picture = $request->file('picture');
    		$path = $picture->store('picture','public');
    		$post->picture = $path;
    	}
    	$post->save();
    	Session::flash('success', 'Cập nhật bài viết thành công');
    	return redirect()->route('posts.index');
    }
    public function destroy($id){
    	$post = Post::findOrFail($id);
    	if($post->picture){
  			Storage::delete('/public'. $picture);
  		}
  		$post->delete();
  		Session::flash('success',"Xóa thành công");
  		return redirect()->route('posts.index');
    }

    //lọc danh mục
    public function fillerByCategory(Request $request){
    	$idCategory = $request->input('category_id');

    	$categoryFiller = Category::findOrFail($idCategory);
    	$posts = Post::where('category_id',$categoryFiller->id)->paginate(5);
    	$total = count($posts);
    	$categories = Category::all();

    	return view('posts.list',compact(['posts','categories','total','categoryFiller']));
    }


    public function search(Request $request){
        $keyword = $request->input('keyword');
        if(!$keyword){
            return redirect()->route('posts.index');
        }
        $posts = Post::where('title','LIKE','%'.$keyword.'%')->paginate(5);
        $categories = Category::all();
        return view('posts.list',compact(['posts','categories']));
    }
}
