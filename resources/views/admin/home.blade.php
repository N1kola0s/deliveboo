@extends('layouts.admin')

@section('content')

<div class="container">

    {{-- resturant card --}}

    <div class="main-card row justify-content-center rounded-3 shadow">
        <!-- Immagine dell'account utente -->
        <div class="col-xs-12 col-md-7 px-0">
            @if(str_contains($user[0]->cover_img, '/img/'))
                <img class="img-fluid resturant-img rounded-3" src="{{$user[0]->cover_img}}" alt="{{$user[0]->name}}">
            @else
                <img class="img-fluid resturant-img rounded-3" src="{{asset('storage/' . $user[0]->cover_img)}}" alt="{{$user[0]->name}}">
            @endif
        </div>

        <div class="col-md-5">
            <div class="card-body">
                <h3 class="card-title">{{$user[0]->business_name}}</h3>
                <address class="text-muted pb-3">{{$user[0]->city}}, {{$user[0]->address}}, {{$user[0]->zip_code}}</address>

                <h5 class="pb-2">{{$user[0]->telephone_number}}</h5>
                <h5>{{$user[0]->email}}</h5>
            </div>
        </div>
    </div>


    <div class="row my-4">

        {{-- user card --}}
        <div class="col me-3 rounded-3 shadow">
            <div class="row justify-content-center">
                <!-- Intestazione utente -->
                <div class="card-header text-white">
                    Utente
                </div>
                <!-- Immagine profilo -->
                <div class="col-md-3 py-3">
                    <img class="img-fluid rounded-circle" src="{{asset('img/avatar_5.jpg')}}" alt="">
                </div>
                <!-- Nome e cognome profilo -->
                <div class="col-md-9">
                    <div class="card-body">
                        <h3 class="card-title">{{$user[0]->name}} {{$user[0]->surname}}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col p-0 rounded-3 shadow analythics">
            <!-- Intestazione della colonna -->
            <div class="card-header text-white">
                Analythics
            </div>
            <!-- Grafico dei prodotti -->
            <div class="card-body">
                <h3 class="card-title">Grafico Prodotti</h3>
            </div>
        </div>
    </div>
</div>
@endsection
