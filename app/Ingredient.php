<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The users that belong to the role.
     */
    public function cocktailsPivot()
    {
        return $this->belongsToMany('App\Cocktail');
    }

    /**
     * ...
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return urlencode($this->name);
    }
}
