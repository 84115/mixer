<?php

namespace App\Http\Controllers;

use App\Cocktail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Events\NewCocktailCreatedEvent;

class CocktailsController extends Controller
{
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

    //TODO: add me to update
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

            return redirect('cocktails/' . urlencode($cocktail->name));
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
        return view('cocktails.show', [
            'cocktail' => Cocktail::where('name', urldecode($id))->first(),
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
            'link' => "cocktails-ibas",
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
}
