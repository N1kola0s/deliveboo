<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            "token" => "required",
            "restaurantId" => "required",
            "products" => "required",
            "guest_name" => ['required', 'string', 'min:3', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
            "guest_surname" => ['required', 'string', 'min:3', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
            "guest_phone_number" => ['required', 'string', 'min:10', 'max:10', 'regex:/^[0-9]+$/'],
            "guest_email" => ['required', 'string', 'email', 'max:50'],
            "guest_city" => "required",
            "guest_zip_code" => ['required', 'string', 'min:5', 'max:5', 'regex:/^[0-9]+$/'],
            "guest_address" => "required|string|min:3|max:50",
            "note" => ['nullable', 'string'],
            "total_price" => ['required', 'numeric'],
            "status" => "nullable",
            
        ];
    }
}