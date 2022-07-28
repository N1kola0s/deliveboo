<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderRequest;
use App\Order;
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
        $products = Product::all();

        // POPULATE ORDER TABLE
        $new_order = new Order();
    
        $new_order->user_id = $request->restaurantId;
        $new_order->guest_name = $request->guest_name;
        $new_order->guest_surname = $request->guest_surname;
        $new_order->guest_phone_number = $request->guest_phone_number;
        $new_order->guest_email = $request->guest_email;
        $new_order->guest_city = 'Milano';
        $new_order->guest_zip_code = $request->guest_zip_code;
        $new_order->guest_address = $request->guest_address;
        $new_order->note = $request->note;
        $new_order->total_price = $request->total_price;
        $new_order->status = 1;

        

        $new_order->save();
     

        foreach ($request->products as $product) {
            $new_order->products()->attach($product['product_id'], ['quantity' => $product["quantity"]]);
        }
        
        
    }
}