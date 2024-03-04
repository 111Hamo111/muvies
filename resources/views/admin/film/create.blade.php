@extends('admin.layouts.admin')
@section('content')


<form class="form" action="{{ route('film.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required><br>

    <label for="img_file">Carusel Image:</label>
    <input type="file" id="img_file" name="main_img_path" accept="image/*"><br>

    <label for="img_file">Image File:</label>
    <input type="file" id="img_file" name="image_path" accept="image/*" required><br>

    <label for="video_file">Video File:</label>
    <input type="file" id="video_file" name="video_path" accept="video/*" required><br>

    <label for="trailer_video_file">Trailer Video File:</label>
    <input type="file" id="trailer_video_file" name="trailer_path" accept="video/*" required><br>

    <label for="content">Content:</label>
    <textarea id="content" name="content" rows="4" required></textarea><br>

    <label for="time">Time:</label>
    <input type="text" id="time" name="time" required><br>

    <label for="category">Year:</label>

    <select style="width: 300px" name="year_id" id="favorite-car" >
        <?php
        foreach ($years as $year) {
            echo "<option value=\"$year->id\">$year->year</option>";
        }
        ?>
    </select>

    <label for="category">Director:</label>

    <select style="width: 300px" name="director_id" id="favorite-car" >
        <?php
        foreach ($directors as $director) {
            echo "<option value=\"$director->id\">$director->name</option>";
        }
        ?>
    </select>
    <br>

    <label for="category">operator:</label>

    <select style="width: 300px" name="operator_id" id="favorite-car" >
        <?php
        foreach ($operators as $operator) {
            echo "<option value=\"$operator->id\">$operator->name</option>";
        }
        ?>
    </select>
    <br>

    <label for="category">Genres:</label>

    <select style="width: 300px" name="genre_ids[]" id="favorite-cars1" multiple>
        <?php
        foreach ($genres as $genre) {
            echo "<option value=\"$genre->id\">$genre->name</option>";
        }
        ?>
    </select>
    <br>
    
    <label for="">Actors</label>
        <select style="width: 300px" name="actor_ids[]" id="favorite-cars" multiple>
            <?php
            foreach ($actors as $actor) {
                echo "<option value=\"$actor->id\">$actor->name</option>";
            }
            ?>
        </select>
        <br>


        <label for="">countries</label>
        <select style="width: 300px" name="country_ids[]" id="favorite-cars2" multiple>
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