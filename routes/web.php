<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

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


Route::get('/', [Controller::class, 'index']);
Route::get('/blog-page', [BlogController::class, 'page'])->name('blog-page');
Route::get('/news-page', [NewsController::class, 'page'])->name('news-page');
Route::get('/users-page', [Controller::class, 'users'])->name('users-page');

Route::get('/blog-project', [Controller::class, 'blog'])->name('blog-project');
Route::get('/news-project', [Controller::class, 'news'])->name('news-project');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'log_store']);

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'reg_store']);
});

Route::middleware('auth')->group(function () {
    Route::prefix('/')->controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::prefix('/')->controller(BlogController::class)->group(function () {
        Route::get('/blog', 'index')->name('blog');
        Route::get('/blog/json', 'json')->name('blog.json');
        Route::post('/blog', 'create')->name('blog.create');
        Route::get('/blog/{id}', 'edit')->name('blog.edit');
        Route::put('/blog/{id}', 'update')->name('blog.update');
        Route::delete('/blog/{id}', 'destroy');
    });

    Route::prefix('/')->controller(NewsController::class)->group(function () {
        Route::get('/news', 'index')->name('news');
        Route::get('/news/json', 'json')->name('news.json');
        Route::post('/news', 'create')->name('news.create');
        Route::get('/news/{id}', 'edit')->name('news.edit');
        Route::put('/news/{id}', 'update')->name('news.update');
        Route::delete('/news/{id}', 'destroy');
    });

    Route::get('/movie', [Controller::class, 'movie'])->name('movie');

    Route::get('/movies', [Controller::class, 'movies'])->name('movies');
    // Route::get('/users-page', [Controller::class, 'users'])->name('users-page');

    Route::middleware('role:admin')->group(function () {
        Route::prefix('/')->controller(UsersController::class)->group(function () {
            Route::get('/users', 'index')->name('users');
            Route::get('/users/json', 'json')->name('users.json');
            Route::post('/users', 'create')->name('users.create');
            Route::get('/users/{id}', 'edit')->name('users.edit');
            Route::put('/users/{id}', 'update')->name('users.update');
            Route::delete('/users/{id}', 'destroy');
        });
    });

    Route::prefix('/')->controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile');
        Route::post('/profile-edit/{id}', 'edit')->name('profile.edit');
        Route::post('/change-photo', 'change_photo')->name('profile.change-photo');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});













// Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    // Route::get('/blog/json', [BlogController::class, 'json'])->name('blog.json');
    // Route::post('/blog', [BlogController::class, 'create'])->name('blog.create');
    // Route::get('/blog/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    // Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    // Route::delete('/blog/{id}', [BlogController::class, 'destroy']);

    // Route::get('/news', [NewsController::class, 'index'])->name('news');
    // Route::get('/news/json', [NewsController::class, 'json'])->name('news.json');
    // Route::post('/news', [NewsController::class, 'create'])->name('news.create');
    // Route::get('/news/{id}', [NewsController::class, 'edit'])->name('news.edit');
    // Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');
    // Route::delete('/news/{id}', [NewsController::class, 'destroy']);

    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    // Route::post('/profile-edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::post('/change-photo', [ProfileController::class, 'change_photo'])->name('profile.change-photo');

// Route::get('/welcome', function () {
//     return view('welcome');
// });
