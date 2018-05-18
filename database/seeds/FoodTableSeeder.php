<?php

use App\Food;
use Illuminate\Database\Seeder;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $food = array(
            array("caesar salad", 7),
            array("Meat", 8),
            array("Lemon juice", 9)
        );
        for ($i=0; $i < count($food); $i++) { 
            $newFood = new Food();
            $newFood->name = $food[$i][0];
            $newFood->category_id = $food[$i][1];
            $newFood->save();
        }
    }
}
