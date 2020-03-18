<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/post/{id}','AdminPostsController@post')->name('home.post');
Route::post('/comment/reply','CommentRepliesController@createReply')->name('home.comment.reply');
Route::post('/comment/reply','CommentRepliesController@createReply')->name('home.comment.reply');
Route::post('admin/comment/replies','CommentRepliesController@show')->name('admin.comment.replies.show');


Route::resource('admin/users','AdminUsersController');
Route::resource('admin/posts','AdminPostsController');
Route::resource('admin/categories','AdminCategoriesController');
Route::resource('admin/media','AdminMediasController');
Route::get('admin/media/upload','AdminMediasController@store')->name('admin.media.upload');

Route::resource("admin/comments","PostCommentsController");
Route::resource("admin/comment/replies","CommentRepliesController");





Route::get('admin',function (){
    return view('admin.index');
})->name('admin');
//
//
//Route::get('admin/users',function (){
//
//    $users=User::all();
//    return view('admin.users.index',compact('users'));
//
//})->name('users');
