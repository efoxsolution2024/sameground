<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SopGeneratorController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\GraphController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']) ->middleware(['auth', 'verified']) ->name('dashboard');
    Route::resource('/all_business', BusinessController::class)->except(['show']);
    Route::delete('all_business/{id}/delete', [BusinessController::class, 'destroy'])->name('all_business.delete');
    Route::get('/all_business/{id}/show', [BusinessController::class, 'show']);
    Route::get('/sop_generator', [SopGeneratorController::class, 'show'])->name('sop_generator');
    Route::get('/test', [TestController::class, 'index'])->name('test');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('/task', TasksController::class);
});


Route::group(['middleware' => ['role:admin']], function()
{
    // Permission
    Route::resource('/permission', PermissionController::class);
    Route::delete('/permission/{id}/delete', [PermissionController::class, 'destroy'])->name('permission.delete');
    // Role
    Route::resource('/role', RoleController::class);
    Route::delete('/role/{id}/delete', [RoleController::class, 'destroy'])->name('role.delete');
    Route::get('/role/{id}/give-permissions', [RoleController::class, 'addPermissionToRole'])->name('role.give-permissions');
    Route::put('/role/{id}/give-permissions', [RoleController::class, 'givePermissionToRole'])->name('permission.give-role');
    // User
    Route::resource('/user', UserController::class);
    Route::delete('user/{id}/delete', [UserController::class, 'destroy'])->name('user.delete');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
