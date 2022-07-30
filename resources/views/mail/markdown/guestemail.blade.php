@component('mail::message')

<div class="logo_deliveboo">
        <img class="logo_img text-center" width="200px" src="{{asset('img/deliveboo_logo.jpg')}}" alt="logo_img">
</div>

<h1>Conferma ordine</h1>

    Grazie <strong>{{$order['guest_name']}} {{$order['guest_surname']}}</strong>,
    Il tuo acquisto dall'importo totale di <strong>{$order['total_price']}}</strong> è stato processato con successo.

    A breve riceverai i prodotti selezionati all'indirizzo <strong>{{$order['guest_address']}}</strong>

    <strong>Il tuo ordine:</strong> 

    @foreach ($order['all_products'] as $product)
        <strong>Prodotto:</strong> {{$product['name']}}, <strong> Quantità:</strong> {{$product['quantity']}}
    @endforeach


@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Ritorna su Deliveboo
@endcomponent

Grazie,
Deliveboo Staff.
@endcomponent
