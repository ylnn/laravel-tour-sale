<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Tour;
use App\Contact;

class Date extends Model
{
    use SoftDeletes;

    protected $dates = ['start_date','end_date','deleted_at'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
