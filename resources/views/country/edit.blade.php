@extends('layouts.admin')
@section('content')

<form class="form" action="{{ route('country.update', $country->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required value="{{ $country->name }}">

    <input type="submit" value="Submit">

</form>



@endsection