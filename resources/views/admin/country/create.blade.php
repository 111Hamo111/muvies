@extends('layouts.admin')
@section('country')

<form class="form" action="{{ route('country.store') }}" method="POST">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required>

    <input type="submit" value="Submit">

</form>



@endsection