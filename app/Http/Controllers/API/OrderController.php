<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderRequest;
use App\Mail\GuestEmail;
use App\Mail\SendAdminEmail;
use App\Order;
use App\Product;
use App\User;
use Braintree\Gateway;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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


        $this_restaurant = User::find($request->restaurantId);
        $all_products = [];
        foreach($request->products as $product){
            $this_product = Product::where("id", $product['product_id'])->where("user_id", $this_restaurant->id)->get()->first();
            // PUSH IN ARRAY FOR DATA EMAIL
            $this_product["quantity"] = $product['quantity'];
            array_push($all_products, $this_product);
        }


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
        
        
        // GENERATE SECOND KEY
        $result = $gateway->transaction()->sale([
            "amount" =>  "$request->total_price",
            "paymentMethodNonce" => $request->token,
            "options" => [
                "submitForSettlement" => true,
            ]
        ]);
        

        if($result->success){
            $data = [
                "success" => true,
                "message" => "Transazione avvenuta con successo",
            ];

           
            $this_restaurant = User::find($request->restaurantId);
            $user= User::where("id", $this_restaurant["id"])->get()->first();


            $this_order =  [
                "total_price" => $request->total_price,
                "restaurant_name" => $user['business_name'],
                "guest_name" => $request->guest_name,
                "guest_surname"=> $request->guest_surname,
                "guest_address" => $request->guest_address,
                "all_products" => $all_products,
                "deliveboo_client" => $user['name'],
            ];
           
           
            
            
            //email da deliveboo a ristoratore
            Mail::to($user['email'])->send(new SendAdminEmail($this_order ));

            //email da deliveboo a cliente
            Mail::to($request->guest_email)->send(new GuestEmail($this_order));



            return response()->json($data,200);
        }else{
            $data = [
                "success" => false,
                "message" => "Transazione negata"
            ];
            return response()->json($data,401);
        };
    }
}