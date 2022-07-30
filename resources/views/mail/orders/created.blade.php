<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conferma ordine</title>
</head>

<body>

    <div class="container bg-lightgray">

        <div class="email d-flex justify-content-center align-items-center p-5">

            <div class="logo">
                <img class="text-center" width="200px" src="{{asset('img/deliveboo_logo.jpg')}}" alt="logo_img">
            </div>
            <!-- ./logo -->

            <h1 class="display-3">Conferma ordine ricevuto</h1>

            <div class="order_details">
                <div class="order_data">
                    <p>Buongiorno <strong>{{$order['deliveboo_client']}}</strong></p>
                    <p>Hai ricevuto un ordine per la tua attività <strong>{{$order['restaurant_name']}}</strong> da {{$order['guest_name']}} {{$order['guest_surname']}}</p>

                </div>
                <!-- /order_data -->

                <div class="order_data_products">
                    <p>Ecco il riepilogo dell'ordine:</p>

                    @foreach ($order['all_products'] as $product)
                    {{$product['name']}} Quantità : {{$product['quantity']}} <br>
                    @endforeach

                    <p>per un totale di <strong>{{$order['total_price']}}</strong> euro da consegnare in via <strong>{{$order['guest_address']}}</strong></p>
                </div>
                <!-- /.order_data_products -->

            </div>
            <!-- /.order_details -->

            <p>
                Ti auguriamo una buona giornata
            </p>

            <p> 
                Grazie,<br>
                Deliveboo Staff
            </p>

        </div>
        <!-- /.email -->


    </div>
    <!-- /.container -->

</body>

</html>