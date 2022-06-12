<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\FeedbackAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'role.user']], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/update/{user}', [UserController::class, 'update'])->name('user.update');
});

Route::group(['prefix' => 'feedback', 'middleware' => ['auth', 'role.user']], function () {
    Route::get('/', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::get('/create', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/store', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('edit/{feedback}', [FeedbackController::class, 'edit'])->name('feedback.edit');
    Route::patch('update/{feedback}', [FeedbackController::class, 'update'])->name('feedback.update');
    Route::get('delete/{feedback}', [FeedbackController::class, 'delete'])->name('feedback.delete');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'role.admin']], function () {
    Route::get('/', [DashboardAdminController::class, 'index'])->name('admin.dashboard.index');

    Route::get('/feedback', [FeedbackAdminController::class, 'index'])->name('admin.feedback.index');
    Route::get('/feedback/edit/{feedback}', [FeedbackAdminController::class, 'edit'])->name('admin.feedback.edit');
    Route::patch('/feedback/update/{feedback}', [FeedbackAdminController::class, 'update'])->name('admin.feedback.update');

    Route::get('/user', [UserAdminController::class, 'index'])->name('admin.user.index');
    Route::get('/show/{user}', [UserAdminController::class, 'show'])->name('admin.user.show');
});
