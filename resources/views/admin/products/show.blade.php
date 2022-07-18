@extends('layouts.admin')

@section('content')
<!-- Show about single product here -->
<!-- Questa pagina è stata creata -->
<!-- Da popolare correttamente -->



<!-- prima la classe era posts, occhio se prendi da boolpress -->
<div class="products d-flex py-4">
    <!-- Immagine del Post -->
    <img class="img-fluid" src="{{asset('storage/' . $product->cover_img)}}" alt="{{$product->name}}">
    <!-- Contenuto di tutto il product con le categorie -->
    <div class="product-data px-4">
        <!-- Titolo -->
        <h1>{{$product->title}}</h1>
        <!-- Categoria -->


        <!-- Contenuto -->
        <div class="content"> <strong>Content: </strong> {{$product->description}}</div>
    </div>
</div>

@endsection
