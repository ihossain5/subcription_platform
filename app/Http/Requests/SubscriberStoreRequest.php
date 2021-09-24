<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriberStoreRequest extends FormRequest {
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
            'email'      => 'required|email|max:255|',
            'website_id' => 'required',
        ];
    }
    public function messages() {
        return [
            'email.required'      => 'Please provide your email',
            'email.email'         => 'Please provide a valid email address',
            'website_id.required' => 'Please provide a particuler website id!',
        ];
    }
}
