<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Projects;
use App\Http\Controllers\AbsenseController;
use App\Http\Controllers\TaskController;


// Route::middleware([Cors::class])->group(function () {
//     // Define your routes here

// });

Route::get('/', function () {
    return view('welcome');
});
Route::post('/login', [UserController::class,'Login']);
Route::get('/test', [UserController::class,'getter']);
Route::get('/Members', [UserController::class,'Members']);
Route::post('/CreateUser', [UserController::class,'CreateUser']);
Route::post('/UpdateUser', [UserController::class,'UpdateUser']);
Route::post('/DeleteUser', [UserController::class,'DeleteUser']);

Route::get('/ProjectDashboard', [Projects::class,'ProjectDashboard']);
Route::get('/ProjectTableDash', [Projects::class,'ProjectTableDash']);
Route::get('/DsiDashboard', [Projects::class,'DsiDashboard']);
Route::post('/AbscentDashboard', [AbsenseController::class,'AbscentDashboard']);
Route::get('/Team', [UserController::class,'Team']);

Route::get('/ProjectTable', [Projects::class,'ProjectTable']);
Route::post('/SubmitProject', [Projects::class,'SubmitProject']);
Route::post('/UpdateProject', [Projects::class,'UpdateProject']);
Route::post('/DelProject', [Projects::class,'DelProject']);

Route::post('/AbscentMan', [AbsenseController::class,'AbscentMan']);
Route::post('/AbscentInput', [AbsenseController::class,'AbscentInput']);
Route::post('/AbscentUpdate', [AbsenseController::class,'AbscentUpdate']);
Route::post('/AbscentDel', [AbsenseController::class,'AbscentDel']);
Route::get('/AbscentAdminView', [AbsenseController::class,'AbscentAdminView']);
Route::post('/AbscentAdminValidate', [AbsenseController::class,'AbscentAdminValidate']);

Route::get('/TaskSend', [TaskController::class,'TaskSend']);
Route::post('/TaskCreate', [TaskController::class,'TaskCreate']);
Route::post('/TaskUpdate', [TaskController::class,'TaskUpdate']);
Route::post('/TaskDelete', [TaskController::class,'TaskDelete']);