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
            "products" => "required",
            "restaurantId" => "required",
            "guest_name" => ['required', 'string', 'min:3', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
            "guest_surname" => ['required', 'string', 'min:3', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
            "guest_phone_number" => ['required', 'string', 'min:10', 'max:10', 'regex:/^[0-9]+$/'],
            "guest_email" => ['required', 'string', 'email', 'max:50'],
            "guest_zip_code" => ['required', 'string', 'min:5', 'max:5', 'regex:/^[0-9]+$/'],
            "guest_address" => "required|string|min:3|max:50",
            "note" => ['nullable', 'string'],
            "total_price" => ['required', 'numeric'],
            "status" => "boolean",
            
        ];
    }
}

$table->id();

            $table->string('guest_phone_number', 10);
            $table->string('guest_email', 50);
            $table->string('guest_city')->default('Milano');
            $table->string('guest_zip_code', 5);
            $table->string('guest_address', 100);
            $table->text('note')->nullable();
            $table->decimal('total_price', 5,2);
            $table->boolean('status')->default(0);