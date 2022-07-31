
<!-- questa è l'email che riceverà il cliente -->

@component('mail::message')

<div class="logo_deliveboo">
        <img class="logo_img text-center" width="200px" src="{{asset('img/deliveboo_logo.jpg')}}" alt="logo_img">
</div>
<!-- /.logo_deliveboo -->

<h1>Conferma ordine</h1>

<!-- DETTAGLI DEI DATI DELL'ORDINE -->

<div class="intro_details">
    Grazie <strong>{{$order['guest_name']}} {{$order['guest_surname']}}</strong>, <br>
    Il tuo acquisto dall'importo totale di <strong>{{$order['total_price']}} euro</strong> è stato processato con successo.
</div> 
<!-- /.intro_details -->

<div class="address_details">
    A breve riceverai i prodotti selezionati all'indirizzo <strong>{{$order['guest_address']}}</strong>
</div> 
<!-- /.address_details -->

<h2> Il tuo ordine: </h2>

@foreach ($order['all_products'] as $product)
<div class="products_details">
    Quantità n. <strong>{{$product['quantity']}}</strong> di <strong>{{$product['name']}}</strong>.
</div>
<!-- /.products_details -->
@endforeach

<!-- BUTTON per tornare al sito-->
@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Ritorna su Deliveboo


@endcomponent
<div class="conclusion">
Grazie per aver scelto il nostro servizio,<br>
Deliveboo Staff.
</div>
<!-- /.conclusion -->
@endcomponent
