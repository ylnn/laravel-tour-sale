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
        
        
        
    }
}