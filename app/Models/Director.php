<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Director extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'directors';

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function films()
    {
        return $this->hasMany(Film::class);
    }


    public function beforeDelete()
    {
        // Перед удалением оператора устанавливаем связанным фильмам operator_id в NULL
              $this->films()->get()->each(function ($film) {
            $film->update(['director_id' => null]);
        });
    }
}
