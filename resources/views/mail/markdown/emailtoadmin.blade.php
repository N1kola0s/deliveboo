
<!-- questa è l'email che riceverà il proprietario del ristorante -->

@component('mail::message')

<div class="logo_deliveboo">
        <img class="logo_img text-center" width="200px" src="{{asset('img/deliveboo_logo.jpg')}}" alt="logo_img">
</div>
<!-- /.logo_deliveboo -->

<h1>Conferma ordine ricevuto</h1>

<!-- DETTAGLI DEI DATI DELL'ORDINE -->

<div class="intro_details">
Buongiorno <strong>{{$order['deliveboo_client']}}</strong><br>
Hai ricevuto un ordine per la tua attività <strong>{{$order['restaurant_name']}}</strong> da <strong>{{$order['guest_name']}} {{$order['guest_surname']}}</strong>.
    
</div>
<!-- /.intro_details -->

<h2>Ecco il riepilogo dell'ordine:</h2>

@foreach ($order['all_products'] as $product)
<div class="products_details">
Quantità n. <strong>{{$product['quantity']}}</strong> di <strong>{{$product['name']}}</strong>.
</div>
<!-- /.products_details -->
@endforeach

<br>
<div>per un totale di <strong>{{$order['total_price']}} euro </strong> da consegnare in <strong>{{$order['guest_address']}}</strong></div> 
<!-- /.price_details -->



<!-- Button per tornare al sito -->
@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Ritorna su Deliveboo

@endcomponent

<div class="conclusion">
Grazie per aver scelto il nostro servizio,<br>
Deliveboo Staff.
</div>
<!-- /.conclusion -->

@endcomponent
