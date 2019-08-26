<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function customer()
    {
        return $this->belongsToMany('App\Customer');
    }
}
