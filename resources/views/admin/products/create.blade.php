@extends('layouts.admin')

@section('content')
@include('partials.errors')
<div class="container-fluid">
    <form class="add_product_form row row-cols-1 row-cols-lg-2" action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col">
            <div class="bg-white p-3 h-100">
                <div class="border_bottom">
                    <h2 class="py-4">Aggiungi un nuovo piatto</h2>
                </div>

                <!-- Input del Nome -->
                <div class="mb-4">
                    <label for="name">Nome *</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Scrivi nome piatto" aria-describedby="nameHelper" value="{{old('name')}}" maxlength="50" minlength="3" pattern="[A-Z a-z]{0,50}" required>
                    <small id="nameHelper" class="text-muted">Max 50 Caratteri</small>
                    @error('cover_img')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ 'Solo lettere' }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- Input delle categorie -->
                <div class="mb-4">
                    <label for="category_id" class="form-label">Categoria *</label>
                    <select class="form-control" name="category_id" id="category_id" required>
                        <option value selected>Seleziona una categoria </option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ 'Seleziona una categoria' }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Input prezzo del prodotto -->
                <div class="mb-4">
                    <label for="price">Prezzo *</label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Scrivi il prezzo" aria-describedby="priceHelper" value="{{old('price')}}" required>
                    <small id="priceHelper" class="text-muted">Solo Numeri</small>
                    @error('cover_img')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ 'Min 0.01-Max 99.99' }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Input descrizione del prodotto -->
                <div class="mb-4">
                    <label for="description">Descrizione *</label>
                    <textarea class="form-control  @error('description') is-invalid @enderror" placeholder="message" name="description" id="description" rows="4" required>{{old('description')}}</textarea>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="bg-white p-3 h-100">
                <div class="border_bottom">
                    <h2 class="py-4">Piatto</h2>
                </div>

                <!-- Input immagine del prodotto -->
                <div class="mb-4">
                    <label for="cover_img">Immagine *</label>
                    <input type="file" accept="image/*" name="cover_img" id="cover_img" class="form-control @error('cover_img') is-invalid @enderror" placeholder="Learn php article" aria-describedby="cover_imgHelper" required>
                    <small id="cover_imgHelper" class="text-muted">Max 500kb</small>
                    <img class="plate_image" src="{{asset('img/placeholder_plate.png')}}" id="img">

                    @error('cover_img')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ 'Immagine peso massimo 500kb formati accettati jpeg,png,svg,jpg' }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- Button aggiungi prodotto -->
                <button type="submit" class="btn btn-primary button">Aggiungi Prodotto</button>
            </div>
        </div>

    </form>
</div>

@endsection