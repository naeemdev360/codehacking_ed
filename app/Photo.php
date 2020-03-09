<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $directory="/codehacking/public/images/";
    protected $fillable=['file'];


    //this is accessor
    public function getFileAttribute($photo){
        return $this->directory.$photo;
    }
}
