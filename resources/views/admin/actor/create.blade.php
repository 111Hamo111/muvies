@extends('layouts.admin')
@section('content')


<form class="form" action="{{ route('actor.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="title">Name:</label>
    <input type="text" id="title" name="name" required><br>

    <label for="title">SureName:</label>
    <input type="text" id="title" name="surename" required><br>

    <label for="img_file">Image File:</label>
    <input type="file" id="img_file" name="image_path" accept="image/*" required><br>

    <label for="time">Age:</label>
    <input type="text" id="time" name="age" required><br>
    
        <label for="">countries</label>
        <select style="width: 300px" name="country_id" id="favorite-cars2" >
            <?php
            foreach ($countries as $country) {
                echo "<option value=\"$country->id\">$country->name</option>";
            }
            ?>
        </select>
        <br>

        

    <input type="submit" value="Submit">
</form>

@endsection