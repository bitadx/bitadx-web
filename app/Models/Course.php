<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id' ,
        'course_title',
        'course_image' ,
        'price',
        'ratings',
        'availability',
        'course_description',
        'seo_title',
        'summary',
        'keywords',
        'slug',
        'extra_seo',
        'course_details',
        'active_step',
        'status',
        'is_home'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }



    public function relatedClasses(){
        return $this->hasMany('App\Models\RelatedClass','course_id','id')->where('type','=','related');
    }

    public function popularClasses(){
        return $this->hasMany('App\Models\RelatedClass','course_id','id')->where('type','=','popular');
    }

    public function reviews(){
        return $this->hasMany('App\Models\CourseReview','course_id','id');
    }

    public function course_sliders(){
        return $this->hasMany('App\Models\SliderImages','course_id','id')->where('type','=','product_slider');
    }

}
