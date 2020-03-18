<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminMediasController extends Controller
{
    //
    public function index(){
        $photos=Photo::all();
        return view('admin.media.index',compact('photos'));
    }

    public function show(){
        return view('admin.media.upload');
    }
    public function store(Request $request){
        $file=$request->file('file');
        $name=time().$file->getClientOriginalName();
        $file->move('images',$name);
        Photo::create(['file'=>$name]);
    }
}
