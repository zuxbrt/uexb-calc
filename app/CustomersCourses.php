<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomersCourses extends Model
{
    protected $fillable = ['customer_id', 'course_id','course_participants'];
}
