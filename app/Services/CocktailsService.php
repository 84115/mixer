<?php

namespace App\Services;

use App\Cocktail;
use App\Mail\CreateCocktailEmail;
use App\Events\NewCocktailCreatedEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class CocktailsService
{
    public function store(Request $request) : ?Cocktail
    {
        $validation = $request->validate([
            'name' => [ 'required' ],
        ]);

        $cocktail = new Cocktail;

        $cocktail->name = $request->name;
        $cocktail->category = $request->category;
        $cocktail->glass = $request->glass;
        $cocktail->instructions = $request->instructions;

        if (!empty($request->ingredient1)) $cocktail->ingredient1 = $request->ingredient1;
        if (!empty($request->ingredient2)) $cocktail->ingredient2 = $request->ingredient2;
        if (!empty($request->ingredient3)) $cocktail->ingredient3 = $request->ingredient3;
        if (!empty($request->ingredient4)) $cocktail->ingredient4 = $request->ingredient4;
        if (!empty($request->ingredient5)) $cocktail->ingredient5 = $request->ingredient5;
        if (!empty($request->ingredient6)) $cocktail->ingredient6 = $request->ingredient6;
        if (!empty($request->ingredient7)) $cocktail->ingredient7 = $request->ingredient7;
        if (!empty($request->ingredient8)) $cocktail->ingredient8 = $request->ingredient8;
        if (!empty($request->ingredient9)) $cocktail->ingredient9 = $request->ingredient9;
        if (!empty($request->ingredient10)) $cocktail->ingredient10 = $request->ingredient10;
        if (!empty($request->ingredient11)) $cocktail->ingredient11 = $request->ingredient11;
        if (!empty($request->ingredient12)) $cocktail->ingredient12 = $request->ingredient12;
        if (!empty($request->ingredient13)) $cocktail->ingredient13 = $request->ingredient13;
        if (!empty($request->ingredient14)) $cocktail->ingredient14 = $request->ingredient14;
        if (!empty($request->ingredient15)) $cocktail->ingredient15 = $request->ingredient15;

        if (!empty($request->measure1)) $cocktail->measure1 = $request->measure1;
        if (!empty($request->measure2)) $cocktail->measure2 = $request->measure2;
        if (!empty($request->measure3)) $cocktail->measure3 = $request->measure3;
        if (!empty($request->measure4)) $cocktail->measure4 = $request->measure4;
        if (!empty($request->measure5)) $cocktail->measure5 = $request->measure5;
        if (!empty($request->measure6)) $cocktail->measure6 = $request->measure6;
        if (!empty($request->measure7)) $cocktail->measure7 = $request->measure7;
        if (!empty($request->measure8)) $cocktail->measure8 = $request->measure8;
        if (!empty($request->measure9)) $cocktail->measure9 = $request->measure9;
        if (!empty($request->measure10)) $cocktail->measure10 = $request->measure10;
        if (!empty($request->measure11)) $cocktail->measure11 = $request->measure11;
        if (!empty($request->measure12)) $cocktail->measure12 = $request->measure12;
        if (!empty($request->measure13)) $cocktail->measure13 = $request->measure13;
        if (!empty($request->measure14)) $cocktail->measure14 = $request->measure14;
        if (!empty($request->measure15)) $cocktail->measure15 = $request->measure15;

        $cocktail->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $this->storeImage($request, $cocktail);
        }

        if ($cocktail->save()) {
            event(new NewCocktailCreatedEvent(Auth::user(), $cocktail));

            Mail::to('test@test.com')->send(new CreateCocktailEmail(Auth::user(), $cocktail));

            return $cocktail;
        }

        return null;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cocktail             $cocktail
     * @return \Illuminate\Http\Response
     */
    public function storeImage(Request $request, Cocktail $cocktail)
    {
        if ($request->hasFile('image')) {
            // $request->validate([
            //     'image' => [ 'file|image"max:5000' ],
            // ]);

            $cocktail->image = $request->image->store('uploads', 'public');
        }
    }

    public function update(Request $request, int $id) : ?Cocktail
    {
        try {
            $cocktail = Cocktail::findOrFail($id);
        } catch (\Throwable $th) {
            return null;
        }

        $cocktail->name = $request->name;
        $cocktail->category = $request->category;
        $cocktail->glass = $request->glass;
        $cocktail->instructions = $request->instructions;

        if ($cocktail->isDirty()) {
            $cocktail->save();
        }

        return $cocktail;
    }
}