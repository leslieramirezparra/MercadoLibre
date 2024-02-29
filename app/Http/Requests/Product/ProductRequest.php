<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    protected $rules = [
		'category_id'=>['required','exists:categories,id'],
		'name'=>['required','string'],
		'price'=>['numeric','required'],
		'stock'=>['numeric','required'],
		'description'=>['string','required'],
		'file' => ['required','image']
];

public function authorize()
{
	return true;
}

public function rules()
{
	return $this->rules;
}

public function messages()
{
	return[
		'name.required'=>'El nombre es requerido',
		'name.string'=>'El nombre debe de ser valido',
	];
}
}
