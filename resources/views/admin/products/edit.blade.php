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
    <!-- Seleziona una categoria -->
    <div class="mb-3">
        <label for="category_id" class="form-label">Categorie</label>
        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
            <option value="">Select a category</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}" {{$category->id == old('category_id', $product->category->id)  ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <!-- Zona del tag -->
    <div class="mb-4">
        <label for="tags" class="form-label m-0">Tags</label>
        <!-- Select -->
        <select multiple class="form-select" name="tags[]" id="tags" aria-label="tags">
        <option value="" disabled>Seleziona un Tag</option>
        @forelse ($tags as $tag)
            @if($errors->any())
                <option value="{{$tag->id}}" {{in_array($tag->id,old('tags')) ? 'selected' : ''}}>{{$tag->name}}</option>
            @else
                <option value="{{$tag->id}}" {{$product->tags->contains($tag->id) ? 'selected' : ''}}>{{$tag->name}}</option>
            @endif
            <!-- Condizione -->
        @empty
            <option value="">No tags</option>
        @endforelse
        </select>
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
