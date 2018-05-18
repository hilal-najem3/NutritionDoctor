<?php

use App\FoodCategory;
use Illuminate\Database\Seeder;

class FoodCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foodCategories =  array("Salads", "Meat", "Juice");
        for ($i=0; $i < count($foodCategories); $i++) {
            $foodCategry = new FoodCategory();
            $foodCategry::create([
                'name' => $foodCategories[$i],
            ]);
        }
    }
}
