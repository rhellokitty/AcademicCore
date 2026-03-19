<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::apiResource('user', UserController::class);
Route::get('user/all/paginated', [UserController::class, 'getAllPaginated']);

Route::apiResource('student', StudentController::class);
Route::get('student/all/paginated', [StudentController::class, 'getAllPaginated']);

Route::apiResource('teacher', TeacherController::class);
Route::get('teacher/all/paginated', [TeacherController::class, 'getAllPaginated']);
