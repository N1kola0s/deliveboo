@extends('layouts.admin')

@section('content')
<!-- Table about order goes here -->
<div class="container-xxl">
    <div class="d-flex justify-content-between py-4">
        <h1>Tutti gli ordini</h1>
    </div>

    @include('partials.session_message')
    <table class="table">
        <!-- Intestazione della tabella -->
        <!-- Da popolare correttamente -->
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>NOME COMPLETO</th>
                <th>TELEFONO</th>
                <th>EMAIL</th>
                <th>CITTA'</th>
                <th>INDIRIZZO</th>
                <th>NOTE</th>
                <th>STATO DEL PAGAMENTO</th>
            </tr>
        </thead>
        <!-- Corpo della tabella -->
        <tbody>
            @forelse($orders as $order)
            <tr>
                <!-- Colonna dell'ID -->
                <td scope="row">{{$order->id}}</td>
                <!-- Colonna del nome completo del customer -->
                <td>{{$order->guest_name}} {{$order->guest_surname}}</td>
               <!-- Colonna del numero di telefono del customer -->
                <td>{{$order->guest_phone_number}}</td>
                <!-- Colonna dell'email del customer -->
                <td>{{$order->guest_email}}</td>
                <!-- Colonna citta' piu zip code del customer -->
                <td>{{$order->guest_city}} {{$order->guest_zip_code}}</td>
                <!-- Colonna indirizzo del customer -->
                <td>{{$order->guest_address}}</td>
                <!-- Colonna delle note del customer -->
                <td>{{$order->note}}</td>
                <!-- Colonna prezzo totale dell'ordine -->
                <td>{{$order->total_price}}</td>
                <!-- Colonna status pagamento dell'ordine -->
                <td>{{$order->status}}</td>

                
                <!-- Colonna delle opzioni -->
                <td class="flex flex-row">
                    <!-- Button per la rotta show.blade.php -->
                    <a class="btn btn-primary text-white btn-sm" href="{{route('admin.orders.show', $order->id)}}">Visualizza</a>
                </td>
            </tr>

            @empty
            <!-- Condizione in caso di Vuoto -->
            <tr>
                <td scope="row">Non sono presenti ordini</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
