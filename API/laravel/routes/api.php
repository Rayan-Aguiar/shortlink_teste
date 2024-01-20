<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;


Route::post('/cadastrar-usuario', [UserController::class, 'cadastrarUsuario']);

Route::post('/encurtar-link', [LinkController::class, 'encurtarLink']);
