@extends('layouts.admin')

@section('content')
<!-- Edit Forms goes here -->

<!-- Da popolare correttamente -->


<h2 class="py-4">Edit {{$product->title}}</h2>
@include('partials.errors')
<form action="{{route('admin.products.update', $product->slug)}}" method="post" enctype="multipart/form-data">
    <!-- Token e metodo -->
    @csrf
    @method('PUT')
    <!-- Zona edit del titolo -->
    <div class="mb-4">
        <label for="title">Titolo</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Learn php article" aria-describedby="titleHelper" value="{{old('title', $product->title)}}">
        <small id="titleHelper" class="text-muted">Max 150 caratteri</small>
    </div>
    <!-- Zona edit dell'immagine -->
    <div class="d-flex">
        <!-- Immagine -->
        <div class="media me-4 pb-4">
            <img class="shadow" width="140" src="{{asset('storage/' . $product->cover)}}" alt="{{$product->title}}">
        </div>
        <!-- Messaggi -->
        <div class="mb-4 px-3">
            <label for="cover" class="mb-3">Cambia immagine del Prodotto</label>
            <input type="file" name="cover" id="cover" class="form-control w-100  @error('cover') is-invalid @enderror" placeholder="Learn php article" aria-describedby="coverHelper">
            <small id="coverHelper" class="text-muted">Edita l'immagine del Prodotto</small>
        </div>
    </div>

    
    <!-- Contenuto del Prodotto -->
    <div class="mb-4">
        <label for="content">Contenuto del Prodotto</label>
        <textarea class="form-control p-1  @error('content') is-invalid @enderror" name="content" id="content" rows="3">
        {{old('content', $product->content)}}
        </textarea>
    </div>
    <!-- Button per l'edit -->
    <button type="submit" class="btn btn-primary">Edita</button>
</form>





@endsection
