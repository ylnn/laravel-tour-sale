<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    
    public function reservation()
    {   
        return $this->BelongsTo('App\Reservation', 'res_id');   
    }
}
