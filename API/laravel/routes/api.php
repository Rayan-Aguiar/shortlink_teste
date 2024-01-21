<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;



//Rotas Posts

Route::post('/login', [AuthController::class, 'login']);
Route::post('/cadastrar-usuario', [UserController::class, 'cadastrarUsuario']);


//Rotas Gets
Route::get('/links', [LinkController::class, 'listarLinks']);

//Rotas Authorization
Route::middleware(['auth'])->group(function () {
    Route::post('/encurtar-link', [LinkController::class, 'encurtarLink']);
});
