<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function create(){
    	return view('posts.create');
    }

    public function store(Request $request){
    	//
    }
}
