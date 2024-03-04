@extends('layouts.app')


@section('content')



    <div class="films actors">
        @foreach ($operators->reverse() as $operator)
        <div class="film">
            <div class="film_home_page_img">
                <a class="films_film_a" href="{{ route('operator.show', $operator->id) }}">
                    <img src="{{ asset('/storage/' . $operator->image_path) }}" alt="">
                </a>
                <div class="overlay">
                    <a href="{{ route('operator.edit', $operator->id) }}">Update</a>
                    
                    <form action="{{ route('operator.destroy', $operator->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            
                        <input class="delete_btn_in_form" type="submit" value="Delete">
                    </form>
                    
                    </div>
            </div>
            <p>{{ $operator->name }}</p>
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