<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ProductsRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('products')->ignore($this->product), 'min:3', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
            'cover_img' => ['required'],
            'price' => ['required', 'numeric', 'max:99.99', 'min:0.01'],
            'visibility' =>['nullable', 'boolean'],
            'description' =>['required'],
            'user_id' => ['nullable', 'exists:users,id']
        ];
    }
}
