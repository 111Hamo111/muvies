@extends('admin.layouts.app')

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
    
                <div class="overlay">
                    <a href="{{ route('film.edit', $film->id) }}">Update</a>
                        <form action="{{ route('film.destroy', $film->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                
                            <input class="delete_btn_in_form" type="submit" value="Delete">
                        </form>
    
                    <a href="">Add in carusel</a>
                    </div>
            </div>
            <p>{{ $film->title }}</p>
        </div>
      
        
      @endforeach
    
    </div>
       
    @else
        <p>No films found.</p>
    @endif





@endsection