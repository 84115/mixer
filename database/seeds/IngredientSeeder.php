<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datum = json_decode(Storage::disk('public')->get('manifest-ingredients.json'));

        foreach ($datum as $item) {
            if ($item->ingredients !== null) {
                DB::table('ingredients')->insert([
                    'id' => (int) $item->ingredients[0]->idIngredient,
                    'name' => (string) $item->ingredients[0]->strIngredient,
                    'description' => (string) $item->ingredients[0]->strDescription,
                    'type' => (string) $item->ingredients[0]->strType,
                    'alcoholic' => (bool) $item->ingredients[0]->strAlcohol,
                    'abv' => (int) $item->ingredients[0]->strABV,
                ]);
            }
        }
    }
}
