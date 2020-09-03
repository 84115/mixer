<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cocktail extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public static function getIngredients()
    {
        $cocktails = self::orderBy('name', 'asc')->get();

        $filters = array_unique(
            array_merge(
                \Illuminate\Support\Arr::pluck($cocktails, 'ingredient1'),
                \Illuminate\Support\Arr::pluck($cocktails, 'ingredient2'),
                \Illuminate\Support\Arr::pluck($cocktails, 'ingredient3'),
                \Illuminate\Support\Arr::pluck($cocktails, 'ingredient4'),
                \Illuminate\Support\Arr::pluck($cocktails, 'ingredient5'),
                \Illuminate\Support\Arr::pluck($cocktails, 'ingredient6'),
                \Illuminate\Support\Arr::pluck($cocktails, 'ingredient7'),
                \Illuminate\Support\Arr::pluck($cocktails, 'ingredient8'),
                \Illuminate\Support\Arr::pluck($cocktails, 'ingredient9'),
                \Illuminate\Support\Arr::pluck($cocktails, 'ingredient10'),
                \Illuminate\Support\Arr::pluck($cocktails, 'ingredient11'),
                \Illuminate\Support\Arr::pluck($cocktails, 'ingredient12'),
                \Illuminate\Support\Arr::pluck($cocktails, 'ingredient13'),
                \Illuminate\Support\Arr::pluck($cocktails, 'ingredient14'),
                \Illuminate\Support\Arr::pluck($cocktails, 'ingredient15'),
            )
        );

        sort($filters, SORT_STRING | SORT_FLAG_CASE);

        return $filters;
    }

    /**
     * The users that belong to the user.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ingredientsPivot()
    {
        return $this->belongsToMany('App\Ingredient');
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
