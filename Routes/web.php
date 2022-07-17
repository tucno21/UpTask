<?php

use System\Route;
use App\Controller\Auth\AuthController;

/**
 * coneccion con el archivo autoload de la aplicacion
 */
require_once dirname(__DIR__) . '/System/Autoload.php';

// Login
Route::get('/', [AuthController::class, 'login']);
Route::post('/', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// crear cuenta
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'register']);

//formulario olvide mi password
Route::get('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);

//restablecer contraseña
Route::get('/reset-password', [AuthController::class, 'resetPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);

//mensaje de creacion de cuenta revisar su email
Route::get('/confirm-message', [AuthController::class, 'confirmMessage']);
//mensaje de confirmacion de cuenta viene del email
Route::get('/confirm-account', [AuthController::class, 'confirmAccount']);

/**
 * ejecuta la busqueda de rutas para los controladores
 */
Route::run();
