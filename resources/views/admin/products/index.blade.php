@extends('layouts.admin')

@section('content')
<!-- Index table goes here -->
<div class="container-fluid p-0 partials_index w-100">
    <div class="row w-100 m-0 p-0 h-100">
        <!-- Colonna con Titolo e button -->
        <div class="col-12 index_header">
                <div class="d-flex justify-content-between h-100 align-items-center py-4">
                    <h1 class="mb-0">Tutti i Prodotti di
                        <!-- Nome dell'utente -->
                        @foreach($name as $utente)
                            <span>{{ucfirst($utente->name)}}</span>
                        @endforeach
                        <!-- Cognome dell'utente -->
                        @foreach($surname as $utente)
                            <span>{{ucfirst($utente->surname)}}</span>
                        @endforeach
                    </h1>
                <div>
                    <a href="{{route('admin.products.create')}}" class="btn create_button">Aggiungi</a>
                </div>
            </div>
        </div>
        <!-- Include del messaggio -->
        @include('partials.session_message')

        <!-- Ciclo forEach -->
        <div class="col-12 index_main p-0 ">
            @forelse($products as $product)
            <!-- Questo è da fare con forEach, da questo punto -->
            <div class="index_card col-12 h-25 flex_cent p-1">
                <!-- Immagine di profilo dinamico -->
                <div class="col-2 h-100 p-0 flex_cent">
                    <!-- Box immagine (dovrà diventare img) -->
                    @if(str_contains($product->cover_img, '/img/'))
                        <img class="flex_cent index_product_img" src="{{$product->cover_img}}" alt="{{$product->name}}">
                    @else
                        <img class="flex_cent index_product_img" src="{{asset('storage/' . $product->cover_img)}}" alt="{{$product->name}}">
                    @endif
                </div>
                <!-- Descrizione -->
                <div class="col-8 h-100 d-flex justify-content-center align-items-start flex-column p-0">
                    <!-- Descrizione -->
                    <div class="col-12 p-1 index_description h-100">
                        <!-- Categories -->
                        <p class="mb-0"> <span class="strong">Categorie :</span> {{ ucfirst($product->category) ? ucfirst($product->category->name) : 'Uncategorized'}} </p>
                        <!-- Nome Piatto -->
                        <h2 class="mb-0">{{$product->name}}</h2>
                        <!-- Descrizione piatto -->
                        <p class="mb-0"><span class="strong">Descrizione : </span>{{$product->description}}</p>
                        <!-- Prezzo piatto -->
                        <p class="mb-0"><span class="strong">Prezzo : </span> {{$product->price}} € </p>
                        <!-- ID piatto -->
                        <p class="mb-0"><span class="strong">ID : </span> {{$product->id}} </p>
                    </div>
                </div>
                <!-- Buttons goes here -->
                <div class="col-2 h-100 d-flex justify-content-evenly align-items-end pe-2 flex-column">
                    <!-- Tasto visualizza -->
                    <a href="{{route('admin.products.show', $product->slug)}}" class="btn w-50 btn-primary">Visualizza</a>
                    <!-- Tasto edita -->
                    <a href="{{route('admin.products.edit', $product->slug)}}" class="btn w-50 btn-warning my-2">Edita</a>
                    <!-- Tasto cancella -->
                    <a type="button" class="btn w-50 btn-danger" data-bs-toggle="modal" data-bs-target="#delete-product-{{$product->id}}">Cancella </a>
                    <!-- Modale del cancella (da implementare) -->
                    <div class="modal fade" id="delete-product-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitle-{{$product->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Cancella</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <!-- Domanda del Modale -->
                                <div class="modal-body">
                                    Sicuro di voler cancellare?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <!-- Form per Eliminare -->
                                    <form action="{{route('admin.products.destroy', $product->slug)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <!-- Button per conferma eliminazione -->
                                        <button type="submit" class="btn btn-danger">Conferma</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <h2 class="text-center">Non c'è niente</h2>
            @endforelse
        </div>
    </div>
    <!-- Paginazione -->
    <div class="pt-3 d-flex justify-content-center">
    {{ $products->links() }}
    </div>

</div>

@endsection
