@extends('layouts.admin')

@section('content')

<div class="container">

    {{-- resturant card --}}

    <div class="row d-flex justify-content-between rounded-3">
        <!-- Immagine dell'account utente -->
        <div class="col-6 px-0 d-flex justify-content-start align-items-center box-shadow">
            @if(str_contains($user[0]->cover_img, '/img/'))
                <img class="resturant-img p-0 rounded-3" src="{{$user[0]->cover_img}}" alt="{{$user[0]->name}}">
            @else
                <img class="resturant-img p-0 rounded-3" src="{{asset('storage/' . $user[0]->cover_img)}}" alt="{{$user[0]->name}}">
            @endif
        </div>
        <!-- Dati utente -->
        <div class="col-5 shadow card_info_home">
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
                <div class="col-10 card_info_home">
                    <div class="card-body">
                        <h3 class="card-title">{{ucfirst($user[0]->name)}} {{ucfirst($user[0]->surname)}}</h3>
                        <h5 class="card-title">{{$user[0]->business_name}}</h5>
                        <address class="text-muted mb-1">{{$user[0]->city}}, {{$user[0]->address}}, {{$user[0]->zip_code}}</address>
                        <address class="text-muted mb-1">Tel : {{$user[0]->telephone_number}}</address>
                        <address class="text-muted mb-1">P.IVA : IT{{$user[0]->vat_number}}</address>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row my-4">
        <!-- Sezione del grafico -->
        <div class="col-12 card_analitics_img_admin p-0 rounded-3 shadow">
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
