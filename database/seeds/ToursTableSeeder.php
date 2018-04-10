<?php

use Illuminate\Database\Seeder;
use App\Tour;
use Carbon\Carbon;

class ToursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Tour::class, 50)->create();
         DB::table('tours')->insert([
            'status' => 1,
            'category_id' => 1,
            'name' => '3 Günlük karadeniz turu',
            'slug' => '3-gun-karadeniz',
            'description' => 'Karadeniz Tour Açıklama',
            'summary' => 'Karadeniz Tour Açıklama Kısa',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

