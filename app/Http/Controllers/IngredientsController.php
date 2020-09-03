<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::orderBy('name', 'asc')->get();

        return view('ingredients.index', [
            'ingredients' => $ingredients,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function types()
    {
        $ingredients = Ingredient::orderBy('name', 'asc')->get();

        $ingredients = array_unique(Arr::pluck($ingredients, 'type'));

        return view('collections.simple_list', [
            'name' => 'Ingredients: Types',
            'link' => "ingredients-type",
            'items' => $ingredients,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function type($name)
    {
        $ingredients = Ingredient::where('type', urldecode($name))->orderBy('name', 'asc')->get();

        return view('ingredients.index', [
            'ingredients' => $ingredients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredient = new Ingredient;

        $ingredient->name = $request->name;
        $ingredient->description = $request->description;
        $ingredient->type = $request->type ?? "";
        $ingredient->alcoholic = $request->alcoholic ?? "";
        $ingredient->abv = $request->abv ?? "";
        $ingredient->save();

        if ($ingredient) {
            return redirect('ingredients/' . urlencode($ingredient->name));
        } else {
            return "ERROR!";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingredient = Ingredient::where('name', urldecode($id))->first();

        if (empty($ingredient)) {
            abort(404, "Ingredient: $ingredient not found.");
        }

        $related = $ingredient->cocktailsPivot->filter(function ($value, $key) use ($ingredient) {
            return $value->id !== $ingredient->id;
        })->sortBy('name');

        // dd($related);
        return view('ingredients.show', [
            'ingredient' => $ingredient,
            'related' => $related,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ingredient::destroy($id);

        return redirect('/users/'.Auth::id());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pivot($id)
    {
        $ingredient = Ingredient::findOrFail($id);

        echo "<ul>";
        foreach ($ingredient->cocktailsPivot as $cocktail) {
            echo "<li><a href=\"/cocktails/pivot/{$cocktail->id}\">{$cocktail->name}</a></li>";
        }
        echo "</ul>";
    }
}
