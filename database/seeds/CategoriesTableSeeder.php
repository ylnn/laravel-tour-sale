<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Tour;
use Illuminate\Support\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

         DB::table('categories')->insert([
            'status' => 1,
            'name' => 'Cultural Tours',
            'slug' => 'cultural-tours',
            'description' => 'Discover great cultures with us!',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
         DB::table('categories')->insert([
            'status' => 1,
            'name' => 'Abroad Tours',
            'slug' => 'abroad-tours',
            'description' => 'Open abroad with us!',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
         DB::table('categories')->insert([
            'status' => 1,
            'name' => 'Blacksea Tours',
            'slug' => 'blacksea-tours',
            'description' => 'Take advantage of the greenery of the Black Sea with us',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
