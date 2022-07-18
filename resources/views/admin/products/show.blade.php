@extends('layouts.admin')

@section('content')

<div class="posts d-flex px-4">
    <div class="cover_image">
        @if(str_contains($product->cover_img, '/img/'))
        <td><img width="150" src="{{$product->cover_img}}" alt="{{$product->name}}"></td>
        @else
        <td><img width="150" src="{{asset('storage/' . $product->cover_img)}}" alt="{{$product->name}}"></td>
        @endif
    </div>
    <div class="post-data px-4">
        <h1>{{$product->name}}</h1>

        <div class="price">

            <h3>{{$product->price}}</h3>

        </div>

        <div class="content">
            {{$product->description}}
        </div>

        <div class="visbility">

            <p>visibility:</p>
            <h1>{{$product->visibility}}</h1>

        </div>

    </div>
</div>



@endsection