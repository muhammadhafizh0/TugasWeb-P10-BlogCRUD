<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Tugas Rutin 10 - Blog CRUD Laravel
|--------------------------------------------------------------------------
| Route::resource otomatis membuat 7 named route:
| posts.index, posts.create, posts.store, posts.show,
| posts.edit, posts.update, posts.destroy
*/

Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::resource('posts', PostController::class);
