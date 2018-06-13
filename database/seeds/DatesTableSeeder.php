<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dates')->delete();
        
        \DB::table('dates')->insert(array (
            0 => 
            array (
                'id' => 1,
                'status' => 1,
                'tour_id' => 1,
                'user_id' => 1,
                'start_date' => Carbon::now()->addDays(10),
                'end_date' => Carbon::now()->addDays(13),
                'min_pax' => 10,
                'max_pax' => 20,
                'price' => 450,
                'currency' => 'USD',
                'created_at' => '2018-04-27 18:42:38',
                'updated_at' => '2018-04-27 18:42:38',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'status' => 1,
                'tour_id' => 2,
                'user_id' => 1,
                'start_date' => Carbon::now()->addDays(10),
                'end_date' => Carbon::now()->addDays(13),
                'min_pax' => 3,
                'max_pax' => 10,
                'price' => 1590,
                'currency' => 'TRY',
                'created_at' => '2018-04-30 10:40:16',
                'updated_at' => '2018-04-30 10:40:16',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'status' => 1,
                'tour_id' => 1,
                'user_id' => 1,
                'start_date' => Carbon::now()->addDays(20),
                'end_date' => Carbon::now()->addDays(23),
                'min_pax' => 5,
                'max_pax' => 10,
                'price' => 340,
                'currency' => 'EUR',
                'created_at' => '2018-04-30 17:35:11',
                'updated_at' => '2018-04-30 17:35:11',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'status' => 1,
                'tour_id' => 1,
                'user_id' => 1,
                'start_date' => Carbon::now()->addDays(30),
                'end_date' => Carbon::now()->addDays(33),
                'min_pax' => 10,
                'max_pax' => 15,
                'price' => 1680,
                'currency' => 'TRY',
                'created_at' => '2018-04-30 18:15:24',
                'updated_at' => '2018-04-30 18:15:24',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}