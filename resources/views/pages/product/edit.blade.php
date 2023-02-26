@extends('layouts.main-layout')

@section('content')

<a href="{{ route('home')}}">
    Home
</a>
<br>
<h1>UPDATE PRODUCT</h1>

<form method="post" action="{{route('product.update', $product)}}">
    @csrf
    <label for="name">Name</label>
    <input value="{{$product -> name}}" type="text" name="name">
    <br>
    <label for="description">Description</label>
    <input value="{{$product -> description}}" type="text" name="description">
    <br>
    <label for="price">Price</label>
    <input value="{{$product -> price}}" type="number" name="price">
    <br>
    <label for="weight">Weight</label>
    <input value="{{$product -> weight}}" type="number" name="weight">
    <br>
    <label for="typology">typology</label>
    <select name="typology_id">
        @foreach ($typologies as $typology)
        <option value="{{$typology -> id}}" 
            @if ($product -> typology_id == $typology -> id)
                selected
            @endif
            >{{$typology -> name}}</option>

        @endforeach

    </select>
    <br>
    <br>
    <h5>categories:</h5>
    @foreach ($categories as $category)

        <input type="checkbox" name="categories[]" value="{{$category -> id}}"
        {{-- 
            controllo fra tutte le categorie del prodotto ce n'è una con
            il valore di questo checkbox ($category -> id)
         --}}
        @foreach ($product -> categories as $productCategory)
            @if ($productCategory -> id == $category -> id)
                checked
            @endif
            
        @endforeach
        >
        <label for="categories">{{$category -> name}}</label>
        <br>
    @endforeach
    <br>
    <input type="submit" value="Update">
</form>



@endsection