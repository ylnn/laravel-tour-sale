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
/*         factory(Category::class, 10)
            ->create()
            ->each(function($c){
                for ($i=0; $i < 10; $i++) { 
                    $c->tours()->save(factory(Tour::class)->make());
                }
            }); */
            
         DB::table('categories')->insert([
            'status' => 1,
            'name' => 'Kültür Turları',
            'slug' => 'kultur-turlari',
            'description' => 'Muhteşem kültürleri bizimle keşfedin!',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
         DB::table('categories')->insert([
            'status' => 1,
            'name' => 'Yurtdışı Turları',
            'slug' => 'yurtdisi-turlari',
            'description' => 'Yurtdışına bizimle açılın!',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
         DB::table('categories')->insert([
            'status' => 1,
            'name' => 'Karadeniz Turları',
            'slug' => 'karadeniz-turlari',
            'description' => 'Karadeniz yeşilliklerinin keyfini bizimle çıkarın.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
