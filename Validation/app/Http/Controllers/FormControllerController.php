<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormExampleRequest;

// use Illuminate\Foundation\Http\Request\FormExampleRequest;
class FormControllerController extends Controller
{
    public function checkValidation(FormExampleRequest $request){
    	$success = "Dữ liệu được xác thực thành công";
    	return view('customer-validations/form', compact('success'));
    }
}
