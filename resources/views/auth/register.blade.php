@extends('layouts.app')

@section('content')

<div class="container-fluid py-4 px-5">
    <div class="row justify-content-center">

        <div class="col-12 col-md-9 col-xl-6">
            <div class="row justify-content-center">

                <div class="card border-0">
                    <div class="card-header bg-transparent border-0">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form onsubmit="return valthis()" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }} <span class="text-primary">*</span></label>

                                <div class="col-md-6">
                                    <input onkeypress="return (event.charCode >= 60 || event.charCode == 8 || event.charCode == 32)" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ 'Il nome deve contenere almeno 3 caratteri e non deve contenere numeri' }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }} <span class="text-primary">*</span></label>

                                <div class="col-md-6">
                                    <input onkeypress="return (event.charCode >= 60 || event.charCode == 8 || event.charCode == 32)" id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ 'Il cognome deve contenere almeno 3 caratteri e non deve contenere numeri' }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="telephone_number" class="col-md-4 col-form-label text-md-right">{{ __('Numero di Telefono') }} <span class="text-primary">*</span></label>

                                <div class="col-md-6">
                                    <input id="telephone_number" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" type="text" class="form-control @error('telephone_number') is-invalid @enderror" name="telephone_number" value="{{ old('telephone_number') }}" required autocomplete="telephone_number" minlength="10" maxlength="10" autofocus>

                                    @error('telephone_number')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ 'Il numero deve contenere 10 caratteri numerici' }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="business_name" class="col-md-4 col-form-label text-md-right">{{ __('Nome Locale') }} <span class="text-primary">*</span></label>

                                <div class="col-md-6">
                                    <input id="business_name" type="text" class="form-control @error('business_name') is-invalid @enderror" name="business_name" value="{{ old('business_name') }}" required autocomplete="business_name" autofocus>

                                    @error('business_name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ 'Il nome del ristorante deve essere univoco' }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- seleziona tipologia ristorante -->
                            <div class="types row pt-2 mb-3">
                                <!-- Info -->
                                <h6 class="fw-bolder color">Tipo di cucina (min. 1) <span class="text-primary">*</span></h6>
                                <!-- Form checkbox  -->

                                <div class="btn-group d-flex flex-wrap" role="group" aria-label="Basic checkbox toggle button group">
                                    @foreach($types as $type)
                                    <input type="checkbox" class="btn-check form-control @error('types') is-invalid @enderror" id="type-{{$type->id}}" value="{{$type->id}}" name="types[{{$type->id}}]" autocomplete="off">

                                    <label class="btn btn-outline-primary mb-2 me-1" for="type-{{$type->id}}">{{$type->name}}</label>
                                    @endforeach
                                </div>
                                <span id="errors_type" class="text-danger"></span>

                                {{-- Errors types --}}
                                @error('types')
                                <span class="text-danger" role="alert">
                                    {{ 'seleziona almeno una tipologia' }}
                                </span>
                                @enderror
                            </div>


                            <div class="mb-3 row">
                                <label for="cover_img" class="col-md-4 col-form-label text-md-right">{{ __('Immagine Locale') }} <span class="text-primary">*</span></label>

                                <div class="col-md-6">
                                    <input accept="image/*" id="cover_img" type="file" class="form-control @error('cover_img') is-invalid @enderror" name="cover_img" value="{{ old('cover_img') }}" required autocomplete="cover_img" autofocus>

                                    @error('cover_img')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ 'Le immagini accettate devono pesare max: 500kb ed avere uno dei seguenti formati | jpeg | jpg | png | svg' }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Città') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="Milano" autocomplete="city" autofocus disabled>

                                    <!--  @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror -->
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="zip_code" class="col-md-4 col-form-label text-md-right">{{ __('Cap') }} <span class="text-primary">*</span></label>

                                <div class="col-md-6">
                                    <input id="zip_code" type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" size="5" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code') }}" required autocomplete="zip_code" minlength="5" maxlength="5" autofocus>

                                    @error('zip_code')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ 'Il cap deve contenere 5 caratteri numerici' }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }} <span class="text-primary">*</span></label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    @error('adress')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ 'Inserisci un indirizzo valido' }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="vat_number" class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA') }} <span class="text-primary">*</span></label>

                                <div class="col-md-6">
                                    <input id="vat_number" type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number') }}" required autocomplete="vat_number" minlength="11" maxlength="11" autofocus>

                                    @error('vat_number')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ 'La partita Iva deve contenere 11 caratteri numerici' }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }} <span class="text-primary">*</span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ 'Inserisci una e-mail valida Es: prova@gmail.com '}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }} <span class="text-primary">*</span></label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    <span id="errors_password" class="text-danger"></span>

                                    @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ 'Le password devono essere uguali' }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }} <span class="text-primary">*</span></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="mb-3 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



</div>


@endsection
