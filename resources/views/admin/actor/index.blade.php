@extends('layouts.app')


@section('content')


    <div class="films actors">
        @foreach ($actors->reverse() as $actor)
        <div class="film">
            <div class="film_home_page_img">
                <a class="films_film_a" href="{{ route('actor.show', $actor->id) }}">
                    <img src="{{ asset('/storage/' . $actor->image_path) }}" alt="">
                </a>
                <div class="overlay">

                    <a href="{{ route('actor.edit', $actor->id) }}">Update</a>


                    <form action="{{ route('actor.destroy', $actor->id) }}" method="POST">
                        
                        @csrf
                        @method('DELETE')
                        <input class="delete_btn_in_form" type="submit" value="Delete">
                    </form>
                    {{-- <a href="">Delete</a> --}}
                  
                    </div>
            </div>
            <p>{{ $actor->name }}</p>
        </div>
        @endforeach
    </div>

    {{-- <a class="director_a" href="">
        <div class="">
            <img src="{{asset('img/img1.jpg')}}" alt="">
        </div>
        <div class="name">hamo</div>
    </a>
    <a class="director_a" href="">
        <div class="">
            <img src="{{asset('img/img1.jpg')}}" alt="">
        </div>
        <div class="name">hamo</div>
    </a>

    <a class="director_a" href="">
        <div class="">
            <img src="{{asset('img/img1.jpg')}}" alt="">
        </div>
        <div class="name">hamo</div>
    </a>
    <a class="director_a" href="">
        <div class="">
            <img src="{{asset('img/img1.jpg')}}" alt="">
        </div>
        <div class="name">hamo</div>
    </a>

    <a class="director_a" href="">
        <div class="">
            <img src="{{asset('img/img1.jpg')}}" alt="">
        </div>
        <div class="name">hamo</div>
    </a>
</div> --}}


@endsection