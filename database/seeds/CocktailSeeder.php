<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CocktailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datum = json_decode(Storage::disk('public')->get('manifest-cocktails.json'));

        foreach ($datum as $item) {
            if ($item->drinks !== null) {
                DB::table('cocktails')->insert([
                    'id' => (int) $item->drinks[0]->idDrink,
                    'name' => (string) $item->drinks[0]->strDrink,
                    'tags' => (string) $item->drinks[0]->strTags,
                    'category' => (string) $this->parseCategory($item->drinks[0]->strCategory ?? ''),
                    'iba' => (string) $this->parseCategory($item->drinks[0]->strIBA ?? ''),
                    'video' => $item->drinks[0]->strVideo ?? '',
                    'alcoholic' => (string) $item->drinks[0]->strAlcoholic,
                    'glass' => (string) $item->drinks[0]->strGlass,
                    'instructions' => $item->drinks[0]->strInstructions ?? '',
                    'image' => $item->drinks[0]->strDrinkThumb ?? '',

                    'ingredients' => (string) (function() use ($item) {
                        $ingredients = [];

                        if (!is_null($item->drinks[0]->strIngredient1)) {
                            $ingredients[] = $this->parseIngredient($item->drinks[0]->strIngredient1 ?? '');
                        }
                        if (!is_null($item->drinks[0]->strIngredient2)) {
                            $ingredients[] = $this->parseIngredient($item->drinks[0]->strIngredient2 ?? '');
                        }
                        if (!is_null($item->drinks[0]->strIngredient3)) {
                            $ingredients[] = $this->parseIngredient($item->drinks[0]->strIngredient3 ?? '');
                        }
                        if (!is_null($item->drinks[0]->strIngredient4)) {
                            $ingredients[] = $this->parseIngredient($item->drinks[0]->strIngredient4 ?? '');
                        }
                        if (!is_null($item->drinks[0]->strIngredient5)) {
                            $ingredients[] = $this->parseIngredient($item->drinks[0]->strIngredient5 ?? '');
                        }
                        if (!is_null($item->drinks[0]->strIngredient6)) {
                            $ingredients[] = $this->parseIngredient($item->drinks[0]->strIngredient6 ?? '');
                        }
                        if (!is_null($item->drinks[0]->strIngredient7)) {
                            $ingredients[] = $this->parseIngredient($item->drinks[0]->strIngredient7 ?? '');
                        }
                        if (!is_null($item->drinks[0]->strIngredient8)) {
                            $ingredients[] = $this->parseIngredient($item->drinks[0]->strIngredient8 ?? '');
                        }
                        if (!is_null($item->drinks[0]->strIngredient9)) {
                            $ingredients[] = $this->parseIngredient($item->drinks[0]->strIngredient9 ?? '');
                        }
                        if (!is_null($item->drinks[0]->strIngredient10)) {
                            $ingredients[] = $this->parseIngredient($item->drinks[0]->strIngredient10 ?? '');
                        }
                        if (!is_null($item->drinks[0]->strIngredient11)) {
                            $ingredients[] = $this->parseIngredient($item->drinks[0]->strIngredient11 ?? '');
                        }
                        if (!is_null($item->drinks[0]->strIngredient12)) {
                            $ingredients[] = $this->parseIngredient($item->drinks[0]->strIngredient12 ?? '');
                        }
                        if (!is_null($item->drinks[0]->strIngredient13)) {
                            $ingredients[] = $this->parseIngredient($item->drinks[0]->strIngredient13 ?? '');
                        }
                        if (!is_null($item->drinks[0]->strIngredient14)) {
                            $ingredients[] = $this->parseIngredient($item->drinks[0]->strIngredient14 ?? '');
                        }
                        if (!is_null($item->drinks[0]->strIngredient15)) {
                            $ingredients[] = $this->parseIngredient($item->drinks[0]->strIngredient15 ?? '');
                        }

                        return implode(',', $ingredients);
                    })(),

                    'ingredient1' => $this->parseIngredient($item->drinks[0]->strIngredient1 ?? ''),
                    'ingredient2' => $this->parseIngredient($item->drinks[0]->strIngredient2 ?? ''),
                    'ingredient3' => $this->parseIngredient($item->drinks[0]->strIngredient3 ?? ''),
                    'ingredient4' => $this->parseIngredient($item->drinks[0]->strIngredient4 ?? ''),
                    'ingredient5' => $this->parseIngredient($item->drinks[0]->strIngredient5 ?? ''),
                    'ingredient6' => $this->parseIngredient($item->drinks[0]->strIngredient6 ?? ''),
                    'ingredient7' => $this->parseIngredient($item->drinks[0]->strIngredient7 ?? ''),
                    'ingredient8' => $this->parseIngredient($item->drinks[0]->strIngredient8 ?? ''),
                    'ingredient9' => $this->parseIngredient($item->drinks[0]->strIngredient9 ?? ''),
                    'ingredient10' => $this->parseIngredient($item->drinks[0]->strIngredient10 ?? ''),
                    'ingredient11' => $this->parseIngredient($item->drinks[0]->strIngredient11 ?? ''),
                    'ingredient12' => $this->parseIngredient($item->drinks[0]->strIngredient12 ?? ''),
                    'ingredient13' => $this->parseIngredient($item->drinks[0]->strIngredient13 ?? ''),
                    'ingredient14' => $this->parseIngredient($item->drinks[0]->strIngredient14 ?? ''),
                    'ingredient15' => $this->parseIngredient($item->drinks[0]->strIngredient15 ?? ''),
                    'measure1' => $item->drinks[0]->strMeasure1 ?? '',
                    'measure2' => $item->drinks[0]->strMeasure2 ?? '',
                    'measure3' => $item->drinks[0]->strMeasure3 ?? '',
                    'measure4' => $item->drinks[0]->strMeasure4 ?? '',
                    'measure5' => $item->drinks[0]->strMeasure5 ?? '',
                    'measure6' => $item->drinks[0]->strMeasure6 ?? '',
                    'measure7' => $item->drinks[0]->strMeasure7 ?? '',
                    'measure8' => $item->drinks[0]->strMeasure8 ?? '',
                    'measure9' => $item->drinks[0]->strMeasure9 ?? '',
                    'measure10' => $item->drinks[0]->strMeasure10 ?? '',
                    'measure11' => $item->drinks[0]->strMeasure11 ?? '',
                    'measure12' => $item->drinks[0]->strMeasure12 ?? '',
                    'measure13' => $item->drinks[0]->strMeasure13 ?? '',
                    'measure14' => $item->drinks[0]->strMeasure14 ?? '',
                    'measure15' => $item->drinks[0]->strMeasure15 ?? '',

                    'user_id' => isset($item->drinks[0]->user) ? $item->drinks[0]->user : 1,
                ]);
            }
        }
    }

    private function parseIngredient(string $ingredient) {
        $ingredient = str_replace('7-up', '7-Up', $ingredient);

        return ucwords($ingredient);
    }

    private function parseCategory(string $category) {
        $category = str_replace('  or  ', ' or ', str_replace(' / ', '/', str_replace('/', ' or ', $category)));

        return ucwords($category);
    }
}
