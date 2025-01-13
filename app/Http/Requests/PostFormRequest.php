<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'min_to_read' => 'required|integer|min:1|max:59',
            'body' => 'required|string',
            'image' => ['max:2048', 'mimes:jpg,png,jpeg'], // Image validation
            'is_published' => '', // Accepts 'on' if the checkbox is checked 
        ];
        if(in_array($this->method(),['POST'])){
            $rules['title'] .= '|unique:posts';
            $rules['image'] = 'required|max:2048|mimes:jpg,png,jpeg';
        }
        return $rules;
    }
}
