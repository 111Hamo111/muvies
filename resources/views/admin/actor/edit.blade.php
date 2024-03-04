@extends('layouts.admin')
@section('content')

<form class="form" action="{{ route('actor.update', $actor->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required value="{{ $actor->name }}"><br>

    <label for="surename">SureName:</label>
    <input type="text" id="surename" name="surename" required value="{{ $actor->surename }}"><br>

    <label for="img_file">Image File:</label>
    <img src="{{ Storage::url($actor->image_path) }}" alt="Actor Image" width="50%" height="20%">
    <input type="file" id="img_file" name="image_path" accept="image/*"><br>

    <label for="age">Age:</label>
    <input type="text" id="age" name="age" required value="{{ $actor->age }}"><br>
    
    <label for="">countries</label>
    <select style="width: 300px" name="country_id" id="favorite-car2" >
        @foreach ($countries as $country) 
            <option value="{{ $country->id }}" {{ $country->id == $actor->country_id ? ' selected' : '' }}>{{ $country->name }}</option>
        @endforeach
    </select>
    <br>

    <input type="submit" value="Submit">
</form>

@endsection
