<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable=[
        'post_id',
        'author',
        'is_active',
        'body',
        'email',
        'photo_id'
    ];
    public function replies(){
        return $this->hasMany('App\CommentReply');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    public function post(){
        return $this->belongsTo('App\Post');
    }
}
