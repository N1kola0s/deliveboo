<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderRequest;
use  App\Order;
use App\Product;
use App\User;
use Braintree\Gateway;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    //genero il token
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway)
    {
        dd('dio cane');
        $validator = Validator::make(
            $request->all(),
            [
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
            ],

            [
                'required' => 'Questo campo è obbligatorio',
                'name.max' => 'Massimo :max caratteri concessi',
                'min' => 'Minimo :min caratteri richiesti',
            ]
        );
        /* dd($validator); */

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        $this_restaurant = User::find($request->restaurantId);
        $amount = 0;
        $all_products = [];

        foreach($request->products as $product){
            $this_product = Product::where("id", $product['product_id'])->where("restaurant_id", $this_restaurant->id)->get()->first();
            $amount +=  $this_product->price * $product['quantity'];
            // PUSH IN ARRAY FOR DATA EMAIL
            $this_product["quantity"] = $product['quantity'];
            array_push($all_products, $this_product);
        }

        // POPULATE ORDER TABLE
        $new_order = new Order();
    
        $new_order->restaurant_id = $request->restaurantId;
        $new_order->guest_name = $request->guest_name;
        $new_order->guest_surname = $request->guest_surname;
        $new_order->guest_phone_number = $request->guest_phone_number;
        $new_order->guest_email = $request->guest_email;
        $new_order->guest_city = 'Milano';
        $new_order->guest_zip_code = $request->guest_zip_code;
        $new_order->guest_address = $request->guest_address;
        $new_order->note = $request->note;
        $new_order->total = $amount;
        $new_order->status = 1;

        $new_order->save();
       
    }
}
