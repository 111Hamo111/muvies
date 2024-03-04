@extends('layouts.admin')
@section('content')


<form class="form" action="{{ route('operator.update', $operator->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <label for="title">Name:</label>
    <input type="text" id="title" name="name" required value="{{$operator->name}}"><br>

    <label for="title">SureName:</label>
    <input type="text" id="title" name="surename" required value="{{$operator->surename}}"><br>

    <label for="img_file">Image File:</label>
    <img src="{{ Storage::url($operator->image_path) }}" alt="image_path" width="50%" height="20%">
    <input type="file" id="img_file" name="image_path" accept="image/*" required value="{{ $operator->image_path }}"><br>

    <label for="time">Age:</label>
    <input type="text" id="time" name="age" required value="{{$operator->age}}"><br>
    
    <label for="">countries</label>
    <select style="width: 300px" name="country_id" id="favorite-car2" >
        @foreach ($countries as $country) 
            <option value="{{ $country->id }}" {{ $country->id == $operator->country_id ? ' selected' : '' }}>{{ $country->name }}</option>
        @endforeach
    </select>
    <br>

        

    <input type="submit" value="Submit">
</form>

@endsection