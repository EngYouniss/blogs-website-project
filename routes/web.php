<?php

use App\Http\Controllers\admin\AppSettingsController;
use App\Http\Controllers\admin\ArticlesController;
use App\Http\Controllers\admin\authController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\CommentsManagmentController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\user\CommentsController;
use App\Http\Controllers\user\HomeController as UserHomeController;
use App\Http\Controllers\user\NewsController;
use App\Models\admin\Article;
use App\Models\admin\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
    return view('admin.login');
});
// Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('AdminHomePage');
Route::get('/master',[HomeController::class,'viewmaster'])->middleware('auth');

Route::get('/auth/login',[authController::class,'login'])->name('login');
Route::post('/auth/checklogin/',[authController::class,'HandleLogin'])->name('HandleLogin');
Route::get('/logout',[authController::class,'logout'])->name('logout');
Route::get('/auth/regiser',[authController::class,'register'])->name('register');
Route::post('auth/create/',[authController::class,'HandleRegister'])->name('HandleRegister');

Route::get('/roles',[AppSettingsController::class,'generateRoles']);
Route::get('/updateUserRole',[UsersController::class,'updateRoles']);

Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){


Route::group(['middleware'=>['auth','role:super_admin']],function(){
    Route::get('/add_user',[UsersController::class,'create'])->name('add_user');
    Route::post('/store_user',[UsersController::class,'store'])->name('store_user');
    Route::get('/view_users',[UsersController::class,'index'])->name('view_users');
    Route::get('/delete_user/{id}',[UsersController::class,'destroy'])->name('delete_user');
})->name('administrator');

Route::group(['middleware'=>['auth','role:super_admin|content_manager']],function(){
    Route::get('/admin/home/',[HomeController::class,'index'])->name('AdminHomePage');
    Route::get('/add_article',[ArticlesController::class,'create'])->name('add_article');
    Route::post('store_article',[ArticlesController::class,'store']);
    Route::get('/show_articles',[ArticlesController::class,'index'])->name('view_articles');
    Route::delete('/deleteArticle/{id}', [ArticlesController::class, 'destroy'])->name('delete_article');

    Route::get('/addCategory',[CategoriesController::class,'create'])->name('add_category');
    Route::get('/viewCategories',[CategoriesController::class,'index'])->name('view_categories');
    Route::get('/deleteCategory/{id}',[CategoriesController::class,'destroy'])->name('delete_category');
    Route::get('/editCategory/{id}',[CategoriesController::class,'edit'])->name('edit_category');
    Route::post('/storeCategory',[CategoriesController::class,'store'])->name('store_category');
    Route::get('/profile',[UsersController::class,'profile'])->name('profile');
    Route::get('/viewComments',[CommentsManagmentController::class,'index'])->name('viewComments');
    Route::get('/approveComment/{id}',[CommentsManagmentController::class,'approveComment'])->name('approveComment');
    Route::get('/disapproveComment/{id}',[CommentsManagmentController::class,'disapproveComment'])->name('disapproveComment');
    Route::get('/deleteComment/{id}',[CommentsManagmentController::class,'deleteComment'])->name('deleteComment');

})->name('content_manager && super_admin');
});

Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
    Route::get('/user/home',[UserHomeController::class,'index'])->name('UserHomePage');
    Route::get('/news/{name}',[NewsController::class,'show'])->name('news');
    Route::get('/yemen_news',[NewsController::class,'showYemenNews'])->name('yemen_news');
    Route::get('/categories/{name}',[UserHomeController::class,'showArticlesCategories'])->name('categories');
    Route::get('/details/{id}',[UserHomeController::class,'showArticleDetails'])->name('details');
    Route::get('/lastarticles/{id}',[UserHomeController::class,'showLastArticleDetails'])->name('lastarticles');
    Route::Post('/storecomment/{id}',[CommentsController::class,'store'])->name('storeComment');
    Route::get('/searcharticles', [ArticlesController::class, 'search'])->name('searchd');
})->name('user views');

