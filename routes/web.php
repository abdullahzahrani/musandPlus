<?php

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
Route::get("/storage", function () {
    $targetFolder = storage_path("app/public");
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($targetFolder, $linkFolder);
    dd();
});

Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware(['guest:student','guest']);

//admin
require __DIR__.'/auth.php';

//student
require __DIR__.'/studentAuth.php';

Route::group(['prefix' => 'x'], function () {
    Voyager::routes();
});
