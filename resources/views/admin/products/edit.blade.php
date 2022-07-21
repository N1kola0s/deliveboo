@extends('layouts.admin')

@section('content')
<!-- Edit Forms goes here -->

<!-- Da popolare correttamente -->


<h2 class="py-4">Edit {{$product->name}}</h2>
@include('partials.errors')
<form action="{{route('admin.products.update', $product->slug)}}" method="post" enctype="multipart/form-data">
    <!-- Token e metodo -->
    @csrf
    @method('PUT')
    <!-- Zona edit del nome -->
    <!-- FATTO -->
    <div class="mb-4">
        <label for="name">Nome *</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Learn php article" aria-describedby="nameHelper" value="{{old('name', $product->name)}}">
        <small id="titleHelper" class="text-muted">Max 150 caratteri</small>
    </div>
    <!-- Zona edit dell'immagine -->
    <div class="d-flex">
        <!-- Immagine (FATTO) -->
        <div class="media me-4 pb-4">
            @if(str_contains($product->cover_img, '/img/'))
            <td><img width="150" src="{{$product->cover_img}}" alt="{{$product->name}}"></td>
            @else
            <td><img width="150" src="{{asset('storage/' . $product->cover_img)}}" alt="{{$product->name}}"></td>
            @endif
        </div>
        <!-- immagine -->
        <div class="mb-4 px-3">
            <input type="file" name="cover_img" id="cover_img" class="form-control w-100  @error('cover_img') is-invalid @enderror" placeholder="Immagine Prodotto" aria-describedby="cover_imgHelper">
            <small id="cover_imgHelper" class="text-muted">Edita l'immagine del Prodotto</small>
        </div>
    </div>

    <!-- categorie -->
    <div class="form-group">
        <label for="category_id">Categories</label>
        <select class="form-control" name="category_id" id="category_id" required>
            <option value="">Select a category</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}" {{$category->id == old('category', $product->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach

        </select>
    </div>

    <!-- Prezzo -->
    <div class="mb-4 w-25">
        <label for="price">Prezzo *</label>
        <input type="number" step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Modifica il prezzo" aria-describedby="priceHelper" value="{{old('price', $product->price)}}" required>
        <small id="priceHelper" class="text-muted">Utilizza solo valori numerici</small>
    </div>
    <!-- Visibility corretto -->
    <div class="form-check form-switch mb-4">
        <input class="form-check-input" value="1" type="checkbox" id="flexSwitchCheckChecked" name='visibility' @if ($product->visibility) checked @endif>
        <label class="form-check-label" for="visibility">Seleziona visibilità</label>
    </div>
    <!-- Descrizione del Prodotto -->
    <div class="mb-4">
        <label for="description">Contenuto del Prodotto</label>
        <textarea class="form-control p-1  @error('description') is-invalid @enderror" name="description" id="description" rows="3">
        {{old('description', $product->description)}}
        </textarea>
    </div>
    <!-- Button per l'edit -->
    <button type="submit" class="btn btn-primary">Edita</button>
</form>





@endsection