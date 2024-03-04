@extends('admin.layouts.app')


@section('content')


<div class="film_info_img">
    <div class="film_show_page_img">

        <img src="{{ asset('/storage/' . $film->image_path) }}" alt="">


       {{-- @if (auth()->check())
    <form method="POST" action="j">
        @csrf
        <label for="rating">Rate from 1 to 5:</label><br>
        <button type="submit" name="rating" value="1">1</button>
        <button type="submit" name="rating" value="2">2</button>
        <button type="submit" name="rating" value="3">3</button>
        <button type="submit" name="rating" value="4">4</button>
        <button type="submit" name="rating" value="5">5</button>
    </form>
@else
    <p>Please log in to rate.</p>
@endif --}}
    </div>






    <div class="film_show_page_info">
        <div class="film_show_page_info_row">
            <div class="film_show_page_info_category">
                <p>Actors</p>
            </div>
            <div class="film_show_page_info_elemnts">

                @foreach ($film->actors as $actor)   
                            <span >{{$actor->name}} {{$actor->surename}}</span>
                @endforeach
                
            </div>
        </div>

        <div class="film_show_page_info_row">
            <div class="film_show_page_info_category">
                <p>Operator</p>
            </div>
            <div class="film_show_page_info_elemnts">
                {{(isset($film->operator)) ? $film->operator->name : ''}}                
            </div>
        </div>

        <div class="film_show_page_info_row">
            <div class="film_show_page_info_category">
                <p>Director</p>
            </div>
            <div class="film_show_page_info_elemnts">
                {{(isset($film->director)) ? $film->director->name : ''}}
            </div>
        </div>

        <div class="film_show_page_info_row">
            <div class="film_show_page_info_category">
                <p>Year</p>
            </div>
            <div class="film_show_page_info_elemnts">
                {{$film->year->year}}
            </div>
        </div>


        <div class="film_show_page_info_row">
            <div class="film_show_page_info_category">
                <p>Countries</p>
            </div>
            <div class="film_show_page_info_elemnts">
                @foreach ($film->countries as $country)
                        <span>{{$country->name}}</span>  
                    @endforeach  
            </div>
        </div>

        <div class="film_show_page_info_row">
            <div class="film_show_page_info_category">
                <p>Genres</p>
            </div>
            <div class="film_show_page_info_elemnts">
                @foreach ($film->genres as $genre) 
                        <span>{{$genre->name}}</span>
                    @endforeach
            </div>
        </div>

        <div class="film_show_page_info_row">
            <div class="film_show_page_info_category">
                <p>Time</p>
            </div>
            <div class="film_show_page_info_elemnts">
                <span>{{$film->time}} &nbsp;Minut</span>
            </div>
        </div>

        <div class="film_show_page_info_row">
            <div class="film_show_page_info_category">
                <p>Rating</p>
            </div>
            <div class="film_show_page_info_elemnts">
                <span>{{$film->averageRating()}}</span>
            </div>
        </div>

        <div class="film_show_page_info_row">
            <div class="film_show_page_info_category">
                <p>Content</p>
            </div>
            <div class="film_show_page_info_elemnts">
                <span> {{$film->content}}</span>
            </div>
        </div>



        
     
    </div>
</div>

<h2>triller</h2>
<video class="vidio" width="640" height="360" controls>
    <source src="{{Storage::url($film->trailer_path)}}" type="video/mp4">
</video>
<h2>full muvies</h2>
<video class="vidio" width="640" height="360" controls>
    <source src="{{Storage::url($film->video_path)}}" type="video/mp4">
    Your browser does not support the video tag.
</video>

<div class="comments" id="comments">
    <h2>Comments</h2>
  
{{-- 
    <form class="comment_form"  method="post">
        <textarea placeholder="Write your comment" id="comment" name="comment" rows="2" cols="50" required></textarea>

        <input class="Submit_Comment"  type="submit" value="Submit Comment">
    </form> --}}



    <!-- Blade Template: resources/views/film.blade.php -->

@auth
<form id="commentForm">
    @csrf
    <input type="hidden" name="film_id" value="{{ $film->id }}">
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <textarea name="comment" placeholder="Enter your comment"></textarea>
    <button type="submit">Submit Comment</button>
</form>
@endauth

<div class="comments_text" id="comments-container">
    @foreach ($comments as $comment)
    <div class="comment">
        <p>{{ $comment->user->name }}: {{ $comment->comment }}</p>
        @auth
        @if(auth()->user()->id === $comment->user_id)
        <button class="delete-comment-btn" data-comment-id="{{ $comment->id }}">Delete</button>
        @endif
        @endauth
    </div>
    @endforeach

    {{ $comments->links() }}
</div>


@endsection