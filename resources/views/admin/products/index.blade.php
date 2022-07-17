@extends('layouts.admin')

@section('content')
<!-- Index table goes here -->
<div class="container-xxl">
    <div class="d-flex justify-content-between py-4">
        <h1>Tutti i Prodotti</h1>
        <div><a href="{{route('admin.products.create')}}" class="btn btn-primary">Aggiungi un Prodotto</a></div>
    </div>

    @include('partials.session_message')
    <table class="table">
        <!-- Intestazione della tabella -->
        <!-- Da popolare correttamente -->
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>TITOLO</th>
                <th>SLUG</th>
                <th>IMAGE</th>
                <th class="text-center">AZIONI</th>
            </tr>
        </thead>
        <!-- Corpo della tabella -->
        <tbody>
            @forelse($products as $product)
            <tr>
                <!-- Colonna dell'ID -->
                <td scope="row">{{$product->id}}</td>
                <!-- Colonna del Titolo -->
                <td>{{$product->name}}</td>
                <!-- Colonna dello Slug (praticamente mette i trattini al titolo (?) ) -->
                <td>{{$product->slug}}</td>
                <!-- Colonna dell'immagine -->
                <td><img width="150" src="{{asset('storage/' . $product->cover_img)}}" alt="{{$product->name}}"></td>
                <!-- Colonna delle opzioni -->
                <td class="flex flex-row">
                    <!-- Button per la rotta show.blade.php -->
                    <a class="btn btn-primary text-white btn-sm" href="{{route('admin.products.show', $product->slug)}}">Visualizza</a>
                    <!-- Button per la rotta edit.blade.php -->
                    <a class="btn btn-secondary text-white btn-sm" href="{{route('admin.products.edit', $product->slug)}}">Edit</a>
                    <!-- Da qua il modale per il click del delete -->
                    <!-- Button trigger modal -->
                    <!-- ???? DA FARE ???? -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-product-{{$product->id}}">Cancella</button>
                    <!-- Modal -->
                    <div class="modal fade" id="delete-product-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitle-{{$product->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Cancella</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <!-- Domanda del Modale -->
                                <div class="modal-body">
                                    Sicuro di voler cancellare?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                </td>
            </tr>

            @empty
            <!-- Condizione in caso di Vuoto -->
            <tr>
                <td scope="row">Non ci sono Prodotti<a href="{{route('admin.products.create')}}">Creane uno tu!</a></td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
