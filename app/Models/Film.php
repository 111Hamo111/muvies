<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Film extends Model
{
    use HasFactory;
    use SoftDeletes;

    const SELECT_FILM = 1;
    const UNSELECT_FILM = 0;

    static function getSelects(){
        return[
            self::SELECT_FILM =>'selected',
            self::UNSELECT_FILM =>'unselected',

        ];
    }

    protected $guarded = [];
    protected $table = 'films';


    public static function getSelectedFilms()
    {
        return self::where('selected', 1)->get();
    }


    public function actors(){
        return $this->belongsToMany(Actor::class, 'film_actor', 'film_id', 'actor_id');
    }

    public function genres(){
        return $this->belongsToMany(Genre::class, 'film_genres', 'film_id', 'genre_id');
    }

    public function countries(){
        return $this->belongsToMany(Country::class, 'film_country', 'film_id', 'country_id');
    }

    public function operator()
    {
        return $this->belongsTo(Operator::class, 'operator_id');
    }

    public function director()
    {
        return $this->belongsTo(Director::class, 'director_id');
    }
    
    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function averageRating()
    {
        return $this->ratings->avg('rating');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
