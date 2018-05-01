<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Date;

class Contact extends Model
{
    public function date()
    {
        return $this->belongsTo(Date::class);   
    }
}
