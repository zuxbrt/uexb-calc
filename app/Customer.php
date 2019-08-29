<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    public function course()
    {
        return $this->hasMany('App\Course');
    }
}
