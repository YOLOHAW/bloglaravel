<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminBlogController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\App;

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
Route::get('/',[BlogController::class,'index']);

Route::get('/blogs/{blog:slug}',[BlogController::class,'show'])->where('blog','[A-z\d\-_]+');
Route::post('/blogs/{blog:slug}/subscription',[BlogController::class,'subscriptionHandler']);

Route::get('/register',[AuthController::class,'create'])->middleware('guest'); 
Route::post('/register',[AuthController::class,'store'])->middleware('guest');

Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::get('/login',[AuthController::class,'login'])->middleware('guest');
Route::post('/login',[AuthController::class,'post_login'])->middleware('guest');

Route::post('/blogs/{blog:slug}/comments',[CommentController::class,'store'])->middleware('auth');

Route::middleware('can:admin')->group(function() {
    Route::get('/admin/blogs/create',[AdminBlogController::class,'create']);
    Route::post('/admin/blogs/store',[AdminBlogController::class,'store']);
    Route::get('/admin/blogs',[AdminBlogController::class,'index']);
    Route::delete('/admin/blogs/{blog:slug}/delete',[AdminBlogController::class,'destory']);
    Route::get('/admin/blogs/{blog:slug}/edit',[AdminBlogController::class,'edit']);
    Route::patch('/admin/blogs/{blog:slug}/update',[AdminBlogController::class,'update']);
});

// Route::get('/admin/blogs/create',[AdminBlogController::class,'create'])->middleware('admin');
// Route::post('/admin/blogs/store',[AdminBlogController::class,'store'])->middleware('admin');
// Route::get('/admin/blogs',[AdminBlogController::class,'index'])->middleware('admin');
// Route::delete('/admin/blogs/{blog:slug}/delete',[AdminBlogController::class,'destory'])->middleware('admin');
// Route::get('/admin/blogs/{blog:slug}/edit',[AdminBlogController::class,'edit'])->middleware('admin');
// Route::patch('/admin/blogs/{blog:slug}/update',[AdminBlogController::class,'update'])->middleware('admin');

// Route::get('/categories/{category:slug}',function (Category $category){
//     //dd($category->blogs);
//     return view('blogs',[
//         'blogs'=>$category->blogs->load('author','category'),
//         'categories'=>Category::all(),
//         'currentCategory'=>$category
//     ]);
// });
// Route::get('/users/{user:username}',function (User $user){
//     return view('blogs',[
//         'blogs'=>$user->blogs->load('author','category'),
//         // 'categories'=>Category::all()
//     ]);
// });

