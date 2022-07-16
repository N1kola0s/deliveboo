@extends('layouts.admin')

@section('content')
<!-- Show about single product here -->
<!-- Questa pagina è stata creata -->
<!-- Da popolare correttamente -->



<!-- prima la classe era posts, occhio se prendi da boolpress -->
<div class="products d-flex py-4">
    <!-- Immagine del Post -->
    <img class="img-fluid" src="{{asset('storage/' . $product->cover)}}" alt="{{$product->title}}">
    <!-- Contenuto di tutto il product con le categorie -->
    <div class="product-data px-4">
        <!-- Titolo -->
        <h1>{{$product->title}}</h1>
        <!-- Categoria -->
        <div class="metadata">
            <strong>Category: </strong> <em>{{$product->category ? $product->category->name : 'Uncategorized'}}</em>
        </div>
        <!-- Tags -->
        <div class="tags">
            <strong>Tags: </strong>
            @if(count($product->tags) > 0)
                @foreach($product->tags as $tag)
                <span>{{$tag->name}}</span>
                @endforeach
            @else
            <span>N/A</span>
            @endif
        </div>
        <!-- Contenuto -->
        <div class="content"> <strong>Content: </strong> {{$product->content}}</div>
    </div>
</div>

@endsection
