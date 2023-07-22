<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BuilderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EloquentController;
use App\Http\Controllers\Front\WebsiteController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SoftController;
use App\Http\Controllers\UserAuthController;
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
/*
Kind of route methodes:

Create => post
Read => get/view
Update => put
Delete => delete

*/

Route::prefix('cms/')->middleware('guest:admin,author')->group(function () {
    Route::get('{guard}/login', [UserAuthController::class, 'showLogin'])->name('view.login');
    Route::post('{guard}/login', [UserAuthController::class, 'login']);
});

Route::prefix('cms/admin/')->middleware('auth:admin,author')->group(function () {
    Route::get('logout', [UserAuthController::class, 'logout'])->name('view.test');
});

Route::get('',[WebsiteController::class, 'home'])->name('website.index');
Route::get('/news-detailes/{id}',[WebsiteController::class, 'details'])->name('website.newsdetailes');
Route::get('/all-news/{id}',[WebsiteController::class, 'all'])->name('website.all');
Route::view('/news-detailes', 'website.newsdetailes')->name('website.newsdetail');
Route::view('/contact', 'website.contact')->name('website.contact');
Route::view('/login', 'cms.button_users')->name('button_users');

Route::resource('builders', BuilderController::class);
Route::resource('eloquents', EloquentController::class);
Route::resource('softs', SoftController::class);
Route::get('softs-restore/{id}', [SoftController::class, 'restore']);
Route::get('softs-forceDelete/{id}', [SoftController::class, 'forceDelete']);

Route::prefix('dashboard/')->middleware('auth:admin,author')->group(function () {
    Route::view('', 'cms.parent')->name('cms.parent');
    Route::resource('countries', CountryController::class);
    Route::post('update-countries/{id}', [CountryController::class, 'update'])->name('update-countries');
    Route::resource('cities', CityController::class);
    Route::post('update-cities/{id}', [CityController::class, 'update'])->name('update-cities');
    Route::resource('admins', AdminController::class);
    Route::post('update-admins/{id}', [AdminController::class, 'update'])->name('update-admins');
    Route::resource('authors', AuthorController::class);
    Route::post('update-authors/{id}', [AuthorController::class, 'update'])->name('update-authors');
    Route::resource('categories', CategoryController::class);
    Route::post('update-categories/{id}', [CategoryController::class, 'update'])->name('update-categories');
    Route::resource('articles', ArticleController::class);
    Route::post('update-articles/{id}', [ArticleController::class, 'update'])->name('update-articles');
    Route::resource('sliders', SliderController::class);
    Route::post('update-sliders/{id}', [SliderController::class, 'update'])->name('update-sliders');
    Route::resource('contacts', ContactController::class);

    Route::get('/create/articles/{id}', [ArticleController::class, 'createArticle'])->name('createArticle');
    Route::get('/index/articles/{id}', [ArticleController::class, 'indexArticle'])->name('indexArticle');
});