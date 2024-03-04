<?php


use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('/ratings/store', [RatingController::class, 'store'])->name('ratings.store');



Route::post('/save-comment', [CommentController::class, 'saveComment'])->name('comment.store');
Route::get('/get-comments/{film}', [CommentController::class, 'getComments'])->name('get-comments');
Route::delete('/comments/{comment}', [CommentController::class, 'deleteComment'])->name('comments.delete');

Route::group([
    'namespace' => 'App\Http\Controllers\Main'
    ], function(){
        Route::get('/', IndexController::class)->name('main.index');
    }
);

Auth::routes();




// Route::group(['namespace' => 'App\Http\Controllers\Comment' ], function () {
//     Route::get('/get-comments/{film}', ShowController::class);
//     Route::post('/save-comment', StoreController::class);
// });


///////////////////////////films//////////////////////////////

Route::group(['namespace' => 'App\Http\Controllers\Film', 'prefix' => 'films'], function () {
    Route::get('/films/search', SearchController::class)->name('films.search');
    Route::get('/', IndexController::class)->name('film.index');
    Route::get('/{film}', ShowController::class)->name('film.show');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::group(['namespace' => 'Film', 'prefix' => 'films'], function () {
        Route::get('/films/search', SearchController::class)->name('admin.films.search');
        Route::get('/', IndexController::class)->name('admin.film.index');
        Route::get('/create', CreateController::class)->name('admin.film.create');
        Route::post('/', StoreController::class)->name('admin.film.store');
        Route::get('/{film}', ShowController::class)->name('admin.film.show');
        Route::get('/edit/{film}', EditController::class)->name('admin.film.edit');
        Route::patch('/{film}', UpdateController::class)->name('admin.film.update');
        Route::delete('/{film}', DestroyController::class)->name('admin.film.destroy');
    });
});



/////////////////Country////////////////


Route::group(['namespace' => 'App\Http\Controllers\country', 'prefix' => 'country'], function () {
    Route::get('/', IndexController::class)->name('country.index');
    Route::get('/{film}', ShowController::class)->name('country.show');
});


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::group(['namespace' => 'Country', 'prefix' => 'country'], function () {
        Route::get('/', IndexController::class)->name('admin.country.index');
        Route::get('/create', CreateController::class)->name('admin.country.create');
        Route::post('/', StoreController::class)->name('admin.country.store');
        Route::get('/{film}', ShowController::class)->name('admin.country.show');
        Route::get('/edit/{country}', EditController::class)->name('admin.country.edit');
        Route::patch('/{country}', UpdateController::class)->name('admin.country.update');
    });
});

////////////////// Director ////////////////////


Route::group(['namespace' => 'App\Http\Controllers\Director', 'prefix' => 'director'], function () {
    Route::get('/', IndexController::class)->name('director.index');
    Route::get('/{director}', ShowController::class)->name('director.show');
});


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::group(['namespace' => 'Director', 'prefix' => 'director'], function () {
        Route::get('/', IndexController::class)->name('admin.director.index');
        Route::get('/create', CreateController::class)->name('admin.director.create');
        Route::post('/', StoreController::class)->name('admin.director.store');
        Route::get('/{director}', ShowController::class)->name('admin.director.show');
        Route::delete('/{director}', DestroyController::class)->name('admin.director.destroy');
    });
});

// operator

Route::group(['namespace' => 'App\Http\Controllers\operator', 'prefix' => 'operator'], function () {
    Route::get('/', IndexController::class)->name('operator.index');
    Route::get('/{operator}', ShowController::class)->name('operator.show');
});


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::group(['namespace' => 'Operator', 'prefix' => 'operator'], function () {
        Route::get('/', IndexController::class)->name('admin.operator.index');
        Route::get('/create', CreateController::class)->name('admin.operator.create');
        Route::post('/', StoreController::class)->name('admin.operator.store');
        Route::get('/{operator}', ShowController::class)->name('admin.operator.show');
        Route::get('/edit/{operator}', EditController::class)->name('admin.operator.edit');
        Route::patch('/{operator}', UpdateController::class)->name('admin.operator.update');
        Route::delete('/{operator}', DestroyController::class)->name('admin.operator.destroy');
    });
});

// actors

Route::group(['namespace' => 'App\Http\Controllers\Actor', 'prefix' => 'actors'], function () {
    Route::get('/', IndexController::class)->name('actor.index');
    Route::get('/{actor}', ShowController::class)->name('actor.show');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::group(['namespace' => 'Actor', 'prefix' => 'actors'], function () {
        Route::get('/', IndexController::class)->name('admin.actor.index');
        Route::get('/create', CreateController::class)->name('admin.actor.create');
        Route::post('/', StoreController::class)->name('admin.actor.store');
        Route::get('/{actor}', ShowController::class)->name('admin.actor.show');
        Route::get('/edit/{actor}', EditController::class)->name('admin.actor.edit');
        Route::patch('/{actor}', UpdateController::class)->name('admin.actor.update');
        Route::delete('/{actor}', DestroyController::class)->name('admin.actor.destroy');
    });
});









Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
