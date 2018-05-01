<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('dates')->insert([
            'status' => 1,
            'tour_id' => 1,
            'user_id' => 1,
            'start_date' => Carbon::now()->addDays(10),
            'end_date' => Carbon::now()->addDays(20),
            'min_pax' => 10,
            'max_pax' => 20,
            'price' => 1950,
            'currency' => 'USD',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
