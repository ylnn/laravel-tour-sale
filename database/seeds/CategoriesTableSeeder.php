<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Tour;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Category::class, 10)
            ->create()
            ->each(function($c){
                for ($i=0; $i < 10; $i++) { 
                    $c->tours()->save(factory(Tour::class)->make());
                }
            });
            ;
    }
}
