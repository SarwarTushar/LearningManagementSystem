<?php

namespace App\Model;
use App\Model\Course;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','status'];

    public function course()
    {
        return $this->hasMany('App\Model\Course');
    }
}
