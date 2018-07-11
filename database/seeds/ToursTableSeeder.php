<?php

use Illuminate\Database\Seeder;
use App\Category;

class ToursTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('tours')->delete();
        \DB::table('dates')->delete();

        for ($i=0; $i < 10; $i++) { 
            $category = Category::first();
            $tour = factory('App\Tour')->create(['category_id' => $category->id]);
            $tour->dates()->saveMany(factory('App\Date', 10)->make());
        }
        
    }
}