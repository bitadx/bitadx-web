<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedClass extends Model
{
    use HasFactory;

    protected $fillable = ['course_id','related_course_id','type' ];

    public function course(){
        return $this->belongsTo('App\Models\Course','related_course_id','id');
    }
}
