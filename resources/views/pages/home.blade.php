@extends('layouts.main-layout')

@section('content')
<h1>HOME</h1>

<a href="{{ route('product.home')}}">
    PRODUCTS
</a>
<br>
<a href="{{ route('product.create')}}">
                        CREATE NEW PRODUCT
</a>
    
    <h4>categories: {{$categories -> count()}}</h4>
    <ol>
        @foreach ($categories as $category)
        <li>
            <b>                
                {{$category -> name}}
            </b>
            <div>products: {{$category -> products -> count()}}</div>
            <ol>
            @foreach ($category -> products as $product)
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
        </li>
            
        @endforeach
    </ol>

    
    

@endsection