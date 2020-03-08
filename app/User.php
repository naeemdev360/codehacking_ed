<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $fillable=['name','email','role_id','is_active','password'];
    protected $hidden=['password'];

    public function role(){
        return $this->belongsTo('App\Role');
    }
}
