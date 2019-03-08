<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Validate_NumbericController extends Controller
{
    public function create(){
    	return view('validates.create');
    }

    public function store(Request $request){
    	$validateData = $request->validate([
    		'number' => 'required|numeric',
    	]);
    	echo 'đã xác thực thành công';
    }
}
