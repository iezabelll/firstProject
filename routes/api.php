<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// methode get
Route::get('/animals', function() {
    echo "menampilkan data animals";
});

// methode post
Route::post('/animals', function() {
    echo "menampilkan hewan baru";
});

// methode put
Route::put('/animals', function($id) {
    echo "mengupdate data hewan id $id";
});

// methode delete
Route::delete('/animals', function($id) {
    echo "menghapus data hewan id $id";
});

