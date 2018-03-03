<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'status', 'slug', 'description'];

    protected $dates = ['deleted_at'];

    /* slug belirleme */
    public function setSlug($slug = null)
    {
        if($this->name != null){
            $this->slug = str_slug($this->name);
        }
    }
}
