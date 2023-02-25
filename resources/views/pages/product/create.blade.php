@extends('layouts.main-layout')

@section('content')
<h1>create new product</h1>
<form method="post" action="{{route('product.store')}}">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name">
    <br>
    <label for="description">Description</label>
    <input type="text" name="description">
    <br>
    <label for="price">Price</label>
    <input type="number" name="price">
    <br>
    <label for="weight">Weight</label>
    <input type="number" name="weight">
    <br>
    <label for="typology">typology</label>
    <select name="typology_id" >
        @foreach ($typologies as $typology)
        <option value="{{$typology -> id}}">{{$typology -> name}}</option>
            
        @endforeach
        
    </select>
    <br>
    <br>
    <h5>categories:</h5>
    @foreach ($categories as $category)
        
        <input type="checkbox" name="categories[]" value="{{$category -> id}}">
        <label for="categories">{{$category -> name}}</label>
        <br>
    @endforeach
    <br>
    <input type="submit" value="Create">
</form>
    
    

@endsection
