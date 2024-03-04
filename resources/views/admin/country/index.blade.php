@extends('layouts.app')


@section('content')

<div  class="countries_index">

    @foreach ($countries as $country)
        
    <a class="" href="{{ route('country.show', $country->id) }}">
            
            <p>{{$country->name}}</p>      
    </a>
    @endforeach

 @endsection


