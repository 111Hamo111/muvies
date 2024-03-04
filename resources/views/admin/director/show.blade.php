@extends('layouts.app')


@section('content')


<div class="film_info_img">
    <div class="film_show_page_img">
        <img src="{{asset('img/img1.jpg')}}" alt="">
    </div>
    <div class="film_show_page_info">
        <table class="uk-table uk-table-divider">
           
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>{{$director->name}}</td>
                </tr>
                <tr>
                    <td>Surename</td>
                    <td>{{$director->surename}}</td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td>{{$director->age}}</td>
                </tr>
               

                
                <tr>
                    <td>country</td>
                    <td>{{$director->country->name}}</td>
                    
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="films">
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
 </div>   





    


@endsection