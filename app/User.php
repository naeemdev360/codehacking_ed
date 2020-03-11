<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $fillable=['name','email','role_id','is_active','password','photo_id'];
    protected $hidden=['password'];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }


    public function posts(){
        return $this->hasMany('App\Post');
    }



    public function isAdmin(){
        if($this->role->name=='Administrator'){
            return true;
        }
        return false;
    }
}
