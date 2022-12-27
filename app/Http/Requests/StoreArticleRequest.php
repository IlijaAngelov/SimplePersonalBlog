<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        $rules = [
            'title' => 'required|max:255',
            'text' => 'required',
            'image' => ['image', 'mimes:png,jpg,jpeg', 'max:5048']
        ];

        if($this->isMethod('POST')){
            $rules['title'] = ['unique:articles'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'text.required' => 'A text is required'
        ];
    }
}
