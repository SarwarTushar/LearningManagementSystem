<?php

namespace App\Model;
use App\Model\Course;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['title','course_id','thumbnail','video','addtional','status'];

    public function course()
    {
        return $this->belongsTo('App\Model\Course');
    }

}


