@extends('layouts.app')

@section('content')
    <h1>Search Results</h1>

    @if ($films->count() > 0)
    <div class="films">
        @foreach ($films->reverse() as $film)
        
        <div class="film">
            <div class="film_home_page_img">
    
                <a class="films_film_a" href="{{ route('film.show', $film->id) }}">
                    <img src="{{ asset('/storage/' . $film->image_path) }}" alt="">
                </a>
    
                
            <p>{{ $film->title }}</p>
        </div>
      
        
      @endforeach
    
    </div>
       
    @else
        <p>No films found.</p>
    @endif





@endsection