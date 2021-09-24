<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'title'       => 'required|string|max:255|',
            'description' => 'required|string|max:20000|',
            'website_id' => 'required',
        ];
    }
    public function messages() {
        return [
            'title.required'       => 'Please provide post title',
            'description.required' => 'Please provide post description',
            'website_id.required'  => 'Please provide a particuler website id!',
        ];
    }
}
