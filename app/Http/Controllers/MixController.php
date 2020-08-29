<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cocktail;
use Illuminate\Support\Facades\DB;

class MixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cocktails = Cocktail::orderBy('name', 'asc')->get();

        $filters = Cocktail::getIngredients();

        $first = $request->input('first');
        $second = $request->input('second');
        $third = $request->input('third');

        $cocktails = DB::table('cocktails')
            ->select('name', 'tags', 'category', 'iba', 'glass', 'image')
            ->when(in_array($first, $filters), function($query) use($filters, $first) {
                return $query->where('ingredients', 'like', "%$first%");
            })
            ->when(in_array($second, $filters), function($query) use($filters, $second) {
                return $query->where('ingredients', 'like', "%$second%");
            })
            ->when(in_array($third, $filters), function($query) use($filters, $third) {
                return $query->where('ingredients', 'like', "%$third%");
            })
            // ->when(in_array($first, $filters), fn($query) => $query->where('ingredients', 'like', "%$first%"))
            // ->when(in_array($second, $filters), fn($query) => $query->where('ingredients', 'like', "%$second%"))
            // ->when(in_array($third, $filters), fn($query) => $query->where('ingredients', 'like', "%$third%"))
            ->get();

        return view('cocktails.index', [
            'filters' => $filters,
            'cocktails' => $cocktails,
        ]);
    }
}
