<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'price'];
    public function customer()
    {
        return $this->belongsToMany('App\Customer');
    }
}
