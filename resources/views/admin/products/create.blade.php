@extends('layouts.admin')

@section('content')
<!-- Create Forms goes here -->
<!-- Da popolare correttamente -->


<h2 class="py-4">Aggiungi un nuovo piatto</h2>
@include('partials.errors')
<form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- Input del Nome -->
    <div class="mb-4">
        <label for="name">Nome *</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Scrivi nome piatto" aria-describedby="nameHelper" value="{{old('name')}}" required>
        <small id="nameHelper" class="text-muted">Max 150 Caratteri</small>
    </div>
    <!-- Input immagine del prodotto -->
    <div class="mb-4">
        <label for="cover_img">Immagine *</label>
        <input type="file" name="cover_img" id="cover_img" class="form-control @error('cover_img') is-invalid @enderror" placeholder="Learn php article" aria-describedby="cover_imgHelper" required>
        <small id="cover_img" class="text-muted">Immagine del Prodotto</small>
    </div>
     <!-- Input prezzo del prodotto -->
    <div class="mb-4">
        <label for="price">Prezzo *</label>
        <input type="number" step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Scrivi il prezzo" aria-describedby="priceHelper" value="{{old('price')}}" required>
        <small id="priceHelper" class="text-muted">Solo Numeri</small>
    </div>
    <!-- Toggle del visibility -->
    <div class="form-check form-switch mb-4">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked  name='visibility'>
        <label class="form-check-label" for="flexSwitchCheckChecked">Seleziona visibilità</label>
    </div>
    <!-- Contenuto del post -->
    <div class="mb-4">
        <label for="description">Descrizione *</label>
        <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="description" rows="4" required>{{old('description')}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Aggiungi Prodotto</button>
</form>

@endsection
