<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'actors';

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function films(){
        return $this->belongsToMany(Film::class, 'film_actor',  'actor_id', 'film_id');
    }
}
