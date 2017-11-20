<?php

namespace App\Models\Access\Genre;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'genres';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'display_name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function films(){
        return $this->belongsToMany('App\Models\Access\Film\Film', 'film_genres', 'genre_id', 'film_id');
    }
}
