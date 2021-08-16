<?php

use App\Http\Controllers\UplaodimageController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $images_upload = DB::select('select * from uplaodimages');

    return view('welcome', compact('images_upload'));
});


Route::get('/back-office', function () {

    $images_upload = DB::select('select * from uplaodimages');

    return view('b-o.backoffice', compact('images_upload'));
})->name('back-office');

Route::get('/back-office/upload/create', [UplaodimageController::class,'create']);
Route::post('/back-office/upload/store', [UplaodimageController::class,'store']);
Route::get('/back-office/upload/{id}/show', [UplaodimageController::class,'show']);
Route::get('/back-office/upload/{id}/edit', [UplaodimageController::class,'edit']);
Route::put('/back-office/upload/{id}/update', [UplaodimageController::class,'update']);
Route::delete('/back-office/upload/{id}/destroy', [UplaodimageController::class,'destroy']);

