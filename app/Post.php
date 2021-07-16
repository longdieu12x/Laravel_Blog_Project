<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=['title','content','post_id','category_id','created_by'];
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }
}
