@extends('layouts.main-layout')

@section('content')

<a href="{{ route('product.create')}}">
                        CREATE NEW PRODUCT
</a>
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


        </li>
    @endforeach
    </ol>
    
    
    
    <hr>
            

            

    
    

@endsection