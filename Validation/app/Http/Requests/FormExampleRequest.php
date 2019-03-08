<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormExampleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'requrired|min:2|max:30',
            'age' => 'requrired|numeric|min:18'
        ];
    }

    public function message(){
        $messages = [
            'name.requrired' => 'Trường NAME không được bỏ trống',
            'name.min' => 'vui lòng nhập từ 2 kí tự trở lên',
            'name.max' => 'vui lòng nhập không quá 30 kí tự',
            'age.requrired' => "Trường AGE không được bỏ trống",
            'age.numeric' => 'Vui lòng chỉ được nhập số',
            'age.min' => 'Vui lòng nhập 18 tuổi trở lên',
        ];
        return $messages;
    }
}
