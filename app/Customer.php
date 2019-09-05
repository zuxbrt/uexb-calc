<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name','surname','email','phone','city','status','notes','fee','coupon','pdf'];

    public $timestamps = true;

    public function course()
    {
        return $this->hasMany('App\Course');
    }
}
