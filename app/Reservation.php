<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Reservation extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string)Str::uuid();
        });
    }

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    public function tour()
    {
        return $this->belongsTo('App\Tour');
    }
    public function date()
    {
        return $this->belongsTo('App\Date');
    }
}
