@extends('layouts.app')


@section('content')


    <div class="films actors">
        @foreach ($actors->reverse() as $actor)
        <div class="film">
            <div class="film_home_page_img">
                <a class="films_film_a" href="{{ route('actor.show', $actor->id) }}">
                    <img src="{{ asset('/storage/' . $actor->image_path) }}" alt="">
                </a>
                
            </div>
            <p>{{ $actor->name }}</p>
        </div>
        @endforeach
    </div>

@endsection