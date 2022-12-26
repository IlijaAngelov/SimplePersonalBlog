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
        return [
            'title' => 'required|unique:articles|max:255',
            'text' => 'required',
            'image' => ['image', 'mimes:png,jpg,jpeg', 'max:5048']
        ];
    }

    public function message()
    {
        return [
            'title.required' => 'A title is required',
            'text.required' => 'A text is required'
        ];
    }
}
