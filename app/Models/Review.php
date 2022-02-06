<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['title','category_id','description','rating','designation','image'];

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
}
