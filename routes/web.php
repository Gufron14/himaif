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

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

// CRUD PENGUMUMAN
Route::get('/announcement', [AnnouncementController::class, 'show']);
Route::get('/announcement/add', [AnnouncementController::class, 'create']);
Route::post('/announcement', [AnnouncementController::class, 'store'])->name('announcement.store');
Route::get('/announcement/{id}/edit', [AnnouncementController::class, 'edit'])->name('announcement.edit');
Route::put('/announcement/{id}', [AnnouncementController::class, 'update'])->name('announcement.update');
Route::delete('/announcement/{id}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');

// 
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/add', [CategoryController::class, 'create']);
Route::post('/category', [CategoryController::class, 'store']);

// CRUD AUTHOR
Route::get('/author', [AuthorController::class, 'index']);
Route::get('/author/add', [authorController::class, 'create']);
Route::post('/author', [authorController::class, 'store']);
Route::get('/author/{id}/edit', [authorController::class, 'edit']);
Route::put('/author/{id}', [authorController::class, 'update'])->name('author.update');
Route::delete('/author/{id}', [authorController::class, 'destroy'])->name('author.destroy');

// PERSETUJUAN KONTEN OLEH ADMIN
Route::get('/contentApprove', [ContentController::class, 'index']);

// AUTHOR MANAGEMENT
Route::get('/author', [AuthorController::class, 'index']);

// CMS AUTHOR
Route::get('/authorDashboard', [DashboardController::class, 'author']);