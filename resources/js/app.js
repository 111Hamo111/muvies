import './bootstrap';

// $(document).ready(function() {
//     // Function to fetch and display comments
//     function getComments() {
//         $.ajax({
//             type: 'GET',
//             url: '/get-comments/{{ $film->id }}',
//             success: function(response) {
//                 var commentsContainer = $('#comments-container');

//                 // Clear existing comments
//                 commentsContainer.empty();

//                 // Append the fetched comments to the container
//                 $.each(response.comments, function(index, comment) {
//                     if (comment.user && comment.user.name) {
//                         var commentHtml = '<div class="comment" id="comment-' + comment.id + '">';
//                         commentHtml += '<p>' + comment.user.name + ': ' + comment.comment + '</p>';
//                         @auth
//                         if (comment.user_id === {{ auth()->user()->id }}) {
//                             commentHtml += '<button class="delete-comment-btn" data-comment-id="' + comment.id + '">Delete</button>';
//                         }
//                         @endauth
//                         commentHtml += '</div>';
//                         commentsContainer.append(commentHtml);
//                     }
//                 });
//             },
//             error: function(error) {
//                 console.log(error);
//             }
//         });
//     }

//     // Fetch and display comments when the page loads
//     getComments();

//     // Submit comment using AJAX
//     // Пример использования jQuery


//     $('#commentForm').submit(function(event) {
//         event.preventDefault();

//         $.ajax({
//             type: 'POST',
//             url: '/save-comment',
//             data: $('#commentForm').serialize(),
//             success: function(response) {
//                 // Fetch and display comments after submitting a new comment
//                 getComments();

//                 // Clear the comment input
//                 $('#commentForm textarea').val('');
//             },
//             error: function(error) {
//                 console.log(error);
//             }
//         });
//     });

//     // Delete comment using AJAX
//     $(document).on('click', '.delete-comment-btn', function() {
//     var commentId = $(this).data('comment-id');
    
//     $.ajax({
//         type: 'DELETE',
//         url: '/comments/' + commentId,
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         success: function(response) {
//             // Remove the deleted comment from the UI
//             $('#comment-' + commentId).remove();
//             console.log('Comment deleted successfully');
//         },
//         error: function(xhr, status, error) {
//             console.error('Error deleting comment:', error);
//         }
//     });
//  });

// });

