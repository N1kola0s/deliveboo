@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="plate_details d-flex justify-content-center p-4">

        <div class="row g-3">

            <div class="col-12">

                <div class="cover_image pb-4">

                    @if(str_contains($product->cover_img, '/img/'))
                    <img class="w-100" src="{{$product->cover_img}}" alt="{{$product->name}}">
                    @else
                    <img class="w-100" src="{{asset('storage/' . $product->cover_img)}}" alt="{{$product->name}}">
                    @endif

                </div>
                <!-- /.cover_image -->

                <!-- <h1 class="plate_name d-flex align-items-center justify-content-center py-3">
                    {{$product->name}}
                </h1> -->
                <!-- /.plate_name -->

            </div>
            <!-- /.col-12 -->

            <div class="plate_info col col-12 col-lg-6">

                <div class="card card_admin border-0 px-4 py-2">


                    <h2 class="card-header">
                        Informazioni Prodotto
                    </h2>
                    <!-- /.card-header -->

                    <div class="card-body">

                        <div class="plate_name d-flex justify-content-between">
                            <h6>
                                Nome Prodotto
                            </h6>

                            <div>
                                {{$product->name}}
                            </div>

                        </div>
                        <!-- /.palte_name -->

                        <div class="plate_price d-flex justify-content-between">

                            <h6>
                                Prezzo
                            </h6>

                            <div>
                                {{$product->price}} euro
                            </div>

                        </div>
                        <!-- /.plate_price -->

                        <div class="plate_category d-flex justify-content-between">

                            <h6>
                                Categoria Prodotto
                            </h6>

                            <div>
                                {{ $product->category ? $product->category->name : 'Uncategorized'}}

                            </div>

                        </div>
                        <!-- /.plate_category -->

                        <div class="visbility  d-flex justify-content-between">

                            <h6>Visibilità Prodotto</h6>

                            @if($product->visibility == true)
                            <div>Attivata</div>
                            @else
                            <div>Disattivata</div>
                            @endif


                        </div>
                        <!-- /.visibilty -->

                    </div>
                    <!-- card-body -->

                </div>
                <!-- /.card-->

            </div>
            <!-- /.col-6 plate_info-->

            <div class="plate_description col col-12 col-lg-6 ">

                <div class="card card_admin border-0 px-4 py-2">

                    <h2 class="card-header">
                        Descrizione
                    </h2>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <div class="content text-start">
                            {{$product->description}}
                        </div>
                        <!-- /.content -->
                    </div>

                </div>

            </div>
            <!-- /.col-6 plate_description -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.plate_details -->

</div>
<!-- /.container -->




@endsection