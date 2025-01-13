<?php

use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', HomeController::class)->name("home");

// User Routes
Route::prefix('/blog')->group(function () {
    // Blog List (accessible to all users)
    Route::get('/', [HomeController::class, "index"])->name("blog.index");
    Route::post('/{id}/comment', [HomeController::class, 'storeComment'])->name('blog.comment')->middleware('auth');
    // Blog Details (protected with auth middleware)
    Route::get('/blogDetails/{id}', [HomeController::class, "showBlog"])->name("blog.showBlog")->middleware('auth');
});

// Admin Routes
Route::prefix('/blogAdmin')->middleware('auth', 'admin')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [HomeController::class, "adminDashboard"])->name("admin.front");
    Route::get('/', [HomeController::class, "adminIndex"])->name("admin.index");

    // Admin CRUD operations
    Route::get('/create', [HomeController::class, "createBlog"])->name("blog.createBlog");
    Route::post('/', [HomeController::class, "storeBlog"])->name("blog.storeBlog");
    Route::get('/{id}/edit', [HomeController::class, "editBlog"])->name("editBlog");
    Route::patch('/{id}', [HomeController::class, "updateBlog"])->name("blog.update");
    Route::delete('/delete/{id}', [HomeController::class, "deleteBlog"])->name("deleteBlog");
});

// Authentication Routes
Route::get('/login', [HomeController::class, "login"])->name("login");
Route::get('/logout', [HomeController::class, "logout"])->name("logout");
Route::post('/successfull', [HomeController::class, "loginSuccess"])->name("loginSuccess");
Route::get('/signup', [HomeController::class, "signup"])->name("blog.signup");
Route::post('/create', [HomeController::class, "storeUser"])->name("storeUser");

// Fallback Routes
// Custom 404 Error Page
// Route::fallback(FallbackController::class);
