<?php

use Illuminate\Database\Seeder;
use App\Tour;
use App\Photo;

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

        $tours = Tour::all();

        foreach ($tours as $tour) {
           $photos = Photo::query()->take(3)->get();
           if(count($photos) == 3){
               $tour->photos()->attach($photos);
           }
        }
        
    }
}