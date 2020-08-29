<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;
use Illuminate\Support\Arr;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        return view('ingredients.show', [
            'ingredient' => $ingredient,
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
        //
    }
}
