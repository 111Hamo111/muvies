@extends('admin.layouts.app')


@section('content')




 
        
        
       
  


<div class="films">
    @foreach ($films->reverse() as $film)
    <div class="film">
        <div class="film_home_page_img">
            <a class="films_film_a" href="{{ route('admin.film.show', $film->id) }}">
                <img src="{{ asset('/storage/' . $film->image_path) }}" alt="">
            </a>
            {{-- @if (Auth::check() && Auth::user()->id == 1) --}}
            <div class="overlay">
                    <a href="{{ route('admin.film.edit', $film->id) }}">Update</a>
                    <form action="{{ route('admin.film.destroy', $film->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="delete_btn_in_form" type="submit" value="Delete">
                    </form>
                    
                </div>
                {{-- @endif --}}
        </div>
        <p>{{ $film->title }}</p>
    </div>
    @endforeach
</div>

    
    



@endsection