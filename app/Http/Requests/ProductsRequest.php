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
        $categories = config('db.arrayCategories');

        return [
            'name' => ['required', 'min:3', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
            'cover_img' => ['nullable'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'price' => ['required', 'numeric', 'max:99.99', 'min:0.01'],
            'visibility' =>['nullable', 'boolean'],
            'description' =>['required'],
            'user_id' => ['nullable', 'exists:users,id']
        ];
    }
}
