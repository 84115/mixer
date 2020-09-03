<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Ingredient;
use App\Cocktail;

class CocktailIngredientPivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Cocktail::all() as $cocktail) {
            $cid = $cocktail->id;
            $cocktail = Cocktail::find($cid);
    
            $iids = Ingredient::select('id')
                ->whereIn('name', explode(',', $cocktail->ingredients))
                ->get()
                ->pluck('id');
    
            foreach ($iids as $iid) {
                DB::table('cocktail_ingredient')->insert([
                    'cocktail_id' => $cid,
                    'ingredient_id' => $iid,
                ]);
            }
        }
    }
}
