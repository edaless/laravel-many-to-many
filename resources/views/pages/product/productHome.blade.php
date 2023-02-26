@extends('layouts.main-layout')

@section('content')

<a href="{{ route('home')}}">
    Home
</a>
<br>
<a href="{{ route('product.create')}}">
                        CREATE NEW PRODUCT
</a>
<h1>PRODUCTS</h1>
    <ol>
    @foreach ($products as $product)
        <li>
            [{{$product -> code}}]
            {{$product -> name}} 
            <br>
            typology:
            {{$product -> typology -> name}}
            <br>
            digital:
            {{$product -> typology -> digital ? "YES" : "NO"}}
            <br>
            <a href="{{ route('product.edit', $product)}}">
                EDIT
            </a>
            -
            <a href="{{ route('product.delete', $product)}}">
                DELETE
            </a>


        </li>
    @endforeach
    </ol>
    
    
    
    <hr>
            

            

    
    

@endsection