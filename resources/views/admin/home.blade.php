@extends('layouts.admin')

@section('content')

<div class="container">

    {{-- resturant card --}}

    <div class="row justify-content-center rounded-3">
        <!-- Immagine dell'account utente -->
        <div class="col-12 px-0 box-shadow">
            @if(str_contains($user[0]->cover_img, '/img/'))
                <img class="img-fluid resturant-img rounded-3" src="{{$user[0]->cover_img}}" alt="{{$user[0]->name}}">
            @else
                <img class="img-fluid resturant-img rounded-3" src="{{asset('storage/' . $user[0]->cover_img)}}" alt="{{$user[0]->name}}">
            @endif
        </div>
    </div>


    <div class="row my-4">

        {{-- user card --}}
        <div class="col me-3 rounded-3 shadow">
            <div class="row justify-content-center">
                <!-- Intestazione utente -->
                <div class="user_card_admin p-2 text-white">
                    Dati Utente
                </div>
                <!-- Immagine profilo -->
                <div class="col-2 py-3">
                    <img class="img-fluid rounded-circle" src="{{asset('img/avatar_5.jpg')}}" alt="">
                </div>
                <!-- Dati Utente -->
                <div class="col-10">
                    <div class="card-body">
                        <h3 class="card-title">{{ucfirst($user[0]->name)}} {{ucfirst($user[0]->surname)}}</h3>
                        <h4 class="card-title">{{$user[0]->business_name}}</h4>
                        <address class="text-muted mb-1">{{$user[0]->city}}, {{$user[0]->address}}, {{$user[0]->zip_code}}</address>
                        <address class="text-muted mb-1">Tel : {{$user[0]->telephone_number}}</address>
                        <address class="text-muted mb-1">P.IVA : IT{{$user[0]->vat_number}}</address>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sezione del grafico -->
        <div class="col p-0 rounded-3 shadow analythics">
            <!-- Intestazione della colonna -->
            <div class="user_card_admin p-2 mb-2 text-white">
                Analythics
            </div>
            <!--  -->
            <div class="h-75 d-flex justify-content-center align-items-center mb-0">
                <img class="analitics_img" src="{{asset('img/w-i-progress.png')}}" alt="Work in progress">
            </div>
        </div>
    </div>
</div>
@endsection
