@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="plate_details d-flex justify-content-center p-4">
        <div class="row g-3">
            <!-- Immagine del prodotto -->
            <div class="col-6">
                <div class="cover_image pb-4">
                    @if(str_contains($product->cover_img, '/img/'))
                    <img class="w-100" src="{{$product->cover_img}}" alt="{{$product->name}}">
                    @else
                    <img class="w-100" src="{{asset('storage/' . $product->cover_img)}}" alt="{{$product->name}}">
                    @endif
                </div>
            </div>

            <!-- Card con info singolo piatto -->
            <div class="plate_info col-6">
                <div class="card card_admin border-0">
                    <h2 class="card-header p-2 text-white">
                        Informazioni Prodotto
                    </h2>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- /.plate_name -->
                        <div class="plate_name d-flex justify-content-between">
                            <!-- Title -->
                            <h6> Nome Prodotto :</h6>
                            <div>{{$product->name}}</div>
                        </div>
                        <!-- /.plate_price -->
                        <div class="plate_price d-flex justify-content-between">
                            <!-- Title -->
                            <h6>Prezzo :</h6>
                            <div>{{$product->price}} euro</div>
                        </div>
                        <!-- /.plate_category -->
                        <div class="plate_category d-flex justify-content-between">
                            <!-- Title -->
                            <h6>Categoria Prodotto :</h6>
                            <div>{{ $product->category ? $product->category->name : 'Uncategorized'}}</div>
                        </div>
                        <!-- /.visibilty -->
                        <div class="visbility d-flex justify-content-between">
                            <!-- Title -->
                            <h6>Visibilità Prodotto :</h6>
                            @if($product->visibility == true)
                                <div>Attivata</div>
                            @else
                                <div>Disattivata</div>
                            @endif
                        </div>
                        <!-- Descrizione -->
                        <div>
                            <!-- Title -->
                            <h6 class="mt-2 mb-1">Descrizione :</h6>
                            <!-- Testo -->
                            <p>
                                {{$product->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-6 plate_info-->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.plate_details -->
</div>
<!-- /.container -->


@endsection
