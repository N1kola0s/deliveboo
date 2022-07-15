<?php

use App\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = config('db.arrayOrders');

        foreach ($orders as $order) {
            $new_order = new Order();
            $new_order->guest_name = $order['guest_name'];
            $new_order->guest_surname = $order['guest_surname'];
            $new_order->guest_phone_number = $order['guest_phone_number'];
            $new_order->guest_email = $order['guest_email'];
            $new_order->guest_city = $order['guest_city'];
            $new_order->guest_zip_code = $order['guest_zip_code'];
            $new_order->guest_address = $order['guest_address'];
            $new_order->note = $order['note'];
            $new_order->total_price = $order['total_price'];
            $new_order->status = $order['status'];
           /*  $new_order->id_transaction = $order['id_transaction'];    */      
            $new_order->save(); 
        }
    }
}
