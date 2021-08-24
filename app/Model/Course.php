<?php

namespace App\Model;

use App\Model\Category;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name','short_description','category_id','details','level','status'];

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }

}
