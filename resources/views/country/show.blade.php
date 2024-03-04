@extends('layouts.app')


@section('content')


<h1>dddd</h1>
<h1>dddd</h1>
<h1>dddd</h1>
<h1>dddd</h1>
<h1 style="color: aliceblue">{{$films}}</h1>




    @foreach ($films as $film)   
                    
<a href="{{ route('film.show', $film->id) }}">
    <div class="film">
        <div class="film_home_page_img">

            <img src="{{ asset('/storage/' . $film->image_path) }}" alt="">
        </div>
        <p>{{ $film->title }}</p>
    </div>
</a>
@endforeach 


@endsection