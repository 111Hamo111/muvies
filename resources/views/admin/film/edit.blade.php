@extends('admin.layouts.admin')
@section('content')


<form class="form" action="{{ route('admin.film.update', $film->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <label for="title">Title:</label>
    <input type="text" id="title" name="title"  required value="{{ $film->title }}"><br>

    <label for="img_file">Carusel Image:</label>
    <input type="file" id="img_file" name="main_img_path" accept="image/*" value="{{ $film->main_img_path }}"><br>

    <label for="img_file">Image File:</label>
    <img src="{{ Storage::url($film->image_path) }}" alt="image_path" width="50%" height="20%">
    <input type="file" id="img_file" name="image_path" accept="image/*" value="{{ $film->image_path }}"><br>

    <label for="video_file">Video File:</label>
    <input type="file" id="video_file" name="video_path" accept="video/*" value="{{ $film->video_path }}"><br>
    
    <label for="trailer_video_file">Trailer Video File:</label>
    <input type="file" id="trailer_video_file" name="trailer_path" accept="video/*" value="{{ $film->video_path }}"><br>

    <label for="content">Content:</label>
    <textarea id="content" name="content" rows="4" required>{{ $film->content }}</textarea><br>

    <label for="time">Time:</label>
    <input type="text" id="time" name="time" required value="{{ $film->time }}"><br>

    <label for="category">Year:</label>

    <select style="width: 300px" name="year_id" id="favorite-car" >
        @foreach ($years as $year) 
            <option value="{{ $year->id }}" {{ $year->id == $film->year_id ? ' selected' : '' }}>{{ $year->year }}</option>
        @endforeach
    </select>

    <label for="category">Director:</label>

    <select style="width: 300px" name="director_id" id="favorite-car" >
        @foreach ($directors as $director) 
            <option value="{{ $director->id }}" {{ $director->id == $film->director_id ? ' selected' : '' }}>{{ $director->name }}</option>
        @endforeach
    </select>
    <br>

    <label for="category">operator:</label>

    <select style="width: 300px" name="operator_id" id="favorite-car" >
        @foreach ($operators as $operator) 
            <option value="{{ $operator->id }}" {{ $operator->id == $film->operator_id ? ' selected' : '' }}>{{ $operator->name }}</option>
        @endforeach
    </select>
    <br>

    <label for="category">Genres:</label>

    <select style="width: 300px" name="genre_ids[]" id="favorite-cars1" multiple>

        @foreach ($genres as $genre) 
            <option {{ is_array($film->genres->pluck('id')->toArray()) && in_array($genre->id, $film->genres->pluck('id')->toArray()) ? " selected" : ""}} value="{{ $genre->id }}">{{ $genre->name }}</option>;
        @endforeach
    </select>
    <br>
    
    <label for="">Actors</label>
        <select style="width: 300px" name="actor_ids[]" id="favorite-cars" multiple>
            @foreach ($actors as $actor) 
                <option {{ is_array($film->actors->pluck('id')->toArray()) && in_array($actor->id, $film->actors->pluck('id')->toArray()) ? " selected" : ""}} value="{{ $actor->id }}">{{ $actor->name }}</option>;
            @endforeach
        </select>
        <br>


        <label for="">countries</label>
        <select style="width: 300px" name="country_ids[]" id="favorite-cars2" multiple>
            @foreach ($countries as $country) 
                <option {{ is_array($film->countries->pluck('id')->toArray()) && in_array($country->id, $film->countries->pluck('id')->toArray()) ? " selected" : ""}} value="{{ $country->id }}">{{ $country->name }}</option>;
            @endforeach
        </select>
        <br>


        {{-- <label for="category">carousel:</label>

        <select style="width: 300px" name="selected" id="favorite-car" >
            @foreach ($selects as $id => $select) 
                <option value="{{ $id }}" {{ $id == $film->selected ? ' selected' : ''}}>{{ $select }} </option>;
            @endforeach
        </select>
        <br> --}}

        

        

    <input type="submit" value="Submit">
</form>

@endsection