<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    public function reservation()
    {   
        return $this->BelongsTo('App\Reservation', 'res_id');   
    }
}
