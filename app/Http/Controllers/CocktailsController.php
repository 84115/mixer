<?php

namespace App\Http\Controllers;

use App\Cocktail;
use App\Services\CocktailsService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CocktailsController extends Controller
{
    private $service;

    public function __construct(CocktailsService $service)
    {
        $this->service = new $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cocktails = Cocktail::select('name', 'category', 'iba')
            ->orderBy('name', 'asc')
            ->get();

        return view('cocktails.index', [
            'cocktails' => $cocktails,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datum = [
            'category' => DB::table('cocktails')->pluck('category')->unique()->sort(),
            'glass' => DB::table('cocktails')->pluck('glass')->unique()->sort(),
            'ingredients' => collect(Cocktail::getIngredients()),
        ];

        return view('cocktails.create', [
            'datum' => $datum,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cocktail = $this->service->store($request);

        if (!$cocktail) {
            abort(503, "Failed to save Cocktail: $cocktail.");
        }

        return redirect('cocktails/' . urlencode($cocktail->name));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cocktail = Cocktail::where('name', urldecode($id))->first();

        if (empty($cocktail)) {
            abort(404, "Cocktail: $cocktail not found.");
        }

        $related = $cocktail->ingredientsPivot[0]->cocktailsPivot->filter(function ($value, $key) use ($cocktail) {
            return $value->id !== $cocktail->id;
        })->slice(0, 10);

        return view('cocktails.show', [
            'cocktail' => $cocktail,
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
        $cocktail = Cocktail::where('name', urldecode($id))->first();

        $datum = [
            'category' => DB::table('cocktails')->pluck('category')->unique()->sort(),
            'glass' => DB::table('cocktails')->pluck('glass')->unique()->sort(),
            'ingredients' => collect(Cocktail::getIngredients()),
        ];

        return view('cocktails.edit', [
            'cocktail' => $cocktail,
            'datum' => $datum,
        ]);
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
        $cocktail = $this->service->update($request, $id);

        if (empty($cocktail)) {
            abort(404, "Cocktail: $cocktail could not be saved.");
        }

        return redirect("cocktails/{$cocktail->url}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cocktail::destroy($id);

        return redirect('/users/'.Auth::id());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        $categories = Cocktail::select('category')->orderBy('category', 'asc')->get();

        $categories = array_unique(Arr::pluck($categories, 'category'));

        return view('collections.simple_list', [
            'name' => 'Cocktails: Categories',
            'link' => "cocktails-category",
            'items' => $categories,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($name)
    {
        $cocktails = Cocktail::select('name', 'category', 'iba')->where('category', urldecode($name))->orderBy('name', 'asc')->get();

        return view('cocktails.index', [
            'cocktails' => $cocktails,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ibas()
    {
        $ibas = Cocktail::select('iba')->orderBy('iba', 'asc')->get();

        $ibas = array_unique(Arr::pluck($ibas, 'iba'));

        return view('collections.simple_list', [
            'name' => 'Cocktails: IBAS',
            'link' => "cocktails-iba",
            'items' => $ibas,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function iba($name)
    {
        $cocktails = Cocktail::where('iba', urldecode($name))->orderBy('name', 'asc')->get();

        return view('cocktails.index', [
            'cocktails' => $cocktails,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pivot($id)
    {
        $cocktail = Cocktail::findOrFail($id);

        echo "<ul>";
        foreach ($cocktail->ingredientsPivot as $ingredient) {
            echo "<li><a href=\"/ingredients/pivot/{$ingredient->id}\">{$ingredient->name}</a></li>";
        }
        echo "</ul>";
    }
}
