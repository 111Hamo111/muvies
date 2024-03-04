@extends('layouts.app')


@section('content')


<div class="film_info_img">
    <div class="film_show_page_img">

        <img src="{{ asset('/storage/' . $film->image_path) }}" alt="">


        @if (auth()->check())
        <form id="ratingForm">
            @csrf
            <input type="hidden" name="film_id" value="{{ $film->id }}">
            <div class="form-group">
                <label for="rating">Rating:</label>
                <select name="rating" id="rating" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit Rating</button>
        </form>
    @else
        <p>Please log in to rate.</p>
    @endif

    <p id="currentRating">Current Rating: {{ $film->rating }}</p>
    
    </div>






    <div class="film_show_page_info">
        <div class="film_show_page_info_row">
            <div class="film_show_page_info_category">
                <p>Actors</p>
            </div>
            <div class="film_show_page_info_elemnts">

                @foreach ($film->actors as $actor) 
                <a href="{{ route('actor.show', $actor->id) }}"> 
                            <span >{{$actor->name}} {{$actor->surename}}</span></a>  
                @endforeach

                
                
            </div>
        </div>

        <div class="film_show_page_info_row">
            <div class="film_show_page_info_category">
                <p>Operator</p>
            </div>
            <div class="film_show_page_info_elemnts">
                <a href="{{ route('operator.show', $film->operator->id) }}">{{(isset($film->operator)) ? $film->operator->name : ''}}</a>
                          
            </div>
        </div>

        <div class="film_show_page_info_row">
            <div class="film_show_page_info_category">
                <p>Director</p>
            </div>
            <div class="film_show_page_info_elemnts">
                <a href="{{ route('director.show', $film->director->id) }}">{{(isset($film->director)) ? $film->director->name : ''}}</a>

                
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
                <span id="averageRating">{{$film->averageRating()}}</span>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>









  










$(document).ready(function () {
    // Set up CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Function to fetch and display comments
    function getComments() {
        $.ajax({
            type: 'GET',
            url: '/get-comments/{{ $film->id }}',
            success: function(response) {
                var commentsContainer = $('#comments-container');

                // Clear existing comments
                commentsContainer.empty();

                // Append the fetched comments to the container
                $.each(response.comments, function(index, comment) {
                    if (comment.user && comment.user.name) {
                        var commentHtml = '<div class="comment" id="comment-' + comment.id + '">';
                        commentHtml += '<p>' + comment.user.name + ': ' + comment.comment + '</p>';
                        @auth
                        if (comment.user_id === {{ auth()->user()->id }}) {
                            commentHtml += '<button class="delete-comment-btn" data-comment-id="' + comment.id + '">Delete</button>';
                        }
                        @endauth
                        commentHtml += '</div>';
                        commentsContainer.append(commentHtml);
                    }
                });
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    getComments();

    $('#commentForm').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/save-comment',
            data: $('#commentForm').serialize(),
            success: function(response) {
                // Fetch and display comments after submitting a new comment
                getComments();

                // Clear the comment input
                $('#commentForm textarea').val('');
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    // Delete comment using AJAX
    $(document).on('click', '.delete-comment-btn', function() {
        var commentId = $(this).data('comment-id');
        
        $.ajax({
            type: 'DELETE',
            url: '/comments/' + commentId,
            success: function(response) {
                // Remove the deleted comment from the UI
                $('#comment-' + commentId).remove();
                console.log('Comment deleted successfully');
            },
            error: function(xhr, status, error) {
                console.error('Error deleting comment:', error);
            }
        });
    });

    // Submit rating form
    $('#ratingForm').submit(function(e) {
                e.preventDefault(); // Prevent form submission

                var formData = $(this).serialize(); // Serialize form data

                $.ajax({
                        type: 'POST',
                        url: '{{ route("ratings.store") }}',
                        data: formData,
                        success: function(response) {
                            // Format the average rating without trailing zeros
                            var averageRating = parseFloat(response.average_rating).toFixed(1);

                            // Update the average rating display
                            $('#averageRating').text( averageRating);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            // Handle errors as needed
                        }
});

            });
});





</script>