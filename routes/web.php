<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
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
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::get('/announcement', [AnnouncementController::class, 'index']);

Route::get('/announcement/add', [AnnouncementController::class, 'create']);
Route::post('/announcement', [AnnouncementController::class, 'store']);

Route::get('/announcement/{id}/edit', [AnnouncementController::class, 'edit']);
Route::put('/announcement/{id}', [AnnouncementController::class, 'update'])->name('announcement.update');

Route::delete('/announcement/{id}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');

Route::get('/category', [CategoryController::class, 'index']);

Route::get('/category/add', [CategoryController::class, 'create']);
Route::post('/category', [CategoryController::class, 'store']);


// PERSETUJUAN KONTEN OLEH ADMIN
Route::get('/contentApprove', [ContentController::class, 'index']);

// AUTHOR MANAGEMENT
Route::get('/author', [AuthorController::class, 'index']);