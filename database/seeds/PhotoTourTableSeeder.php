<?php

use Illuminate\Database\Seeder;

class PhotoTourTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('photo_tour')->delete();
        
        \DB::table('photo_tour')->insert(array (
            0 => 
            array (
                'id' => 4,
                'photo_id' => 4,
                'tour_id' => 2,
                'order' => NULL,
            ),
            1 => 
            array (
                'id' => 5,
                'photo_id' => 5,
                'tour_id' => 3,
                'order' => NULL,
            ),
            2 => 
            array (
                'id' => 6,
                'photo_id' => 6,
                'tour_id' => 4,
                'order' => NULL,
            ),
            3 => 
            array (
                'id' => 10,
                'photo_id' => 10,
                'tour_id' => 7,
                'order' => NULL,
            ),
            4 => 
            array (
                'id' => 12,
                'photo_id' => 13,
                'tour_id' => 1,
                'order' => NULL,
            ),
            5 => 
            array (
                'id' => 13,
                'photo_id' => 14,
                'tour_id' => 5,
                'order' => NULL,
            ),
            6 => 
            array (
                'id' => 14,
                'photo_id' => 15,
                'tour_id' => 6,
                'order' => NULL,
            ),
        ));
        
        
    }
}