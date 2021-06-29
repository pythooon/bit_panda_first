<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get(
    '/user',
    function (Request $request) {
        return $request->user();
    }
);

Route::get(
    '/users',
    [UserController::class, 'findByActiveStatusAndAustrianCitizenshipUsers']
)->name('users.list');

Route::put(
    '/users/{id}/user-detail',
    [UserController::class, 'editUserDetailIfExist']
)->name('users.user-detail.edit');

Route::delete(
    '/users/{id}',
    [UserController::class, 'deleteUserIfUserDetailNotExist']
)->name('users.delete');