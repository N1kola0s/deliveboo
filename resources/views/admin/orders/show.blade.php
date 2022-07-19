@extends('layouts.admin')

@section('content')

<div class="orders px-4">
    
    
        <h1>{{$order->guest_name}} {{$order->guest_surname}}</h1>

        <div class="info">
            <div>Telefono: {{$order->guest_phone_number}}</div>
            <div>Email: {{$order->guest_email}}</div>
        </div>

        <div class="price">
            <div>Prezzo: {{$order->total_price}}</div>
            <div>Stato: {{$order->status}}</div>
        </div>

        <div class="note">
            Note: {{$order->note}}
        </div>

        <div class="address">

            <p> Indirizzo: {{$order->guest_address}}  {{$order->guest_zip_code}}, {{$order->guest_city}}.</p>
            
        </div>
</div>



@endsection