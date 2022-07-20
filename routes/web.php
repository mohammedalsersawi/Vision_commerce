<?php

use App\Models\Rate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\blogsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TestimonialController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{

Route::prefix('admin')->middleware('auth' , 'admin')->name('admin.')->group(function(){

    Route::get('/' , [AdminController::class , 'index'])->name('dashboard');

    Route::resource('categories' , CategoriesController::class);

    Route::resource('products' , ProductsController::class);

    Route::resource('blogs' , blogsController::class);


    // Route::resource('blogs' , blogsController::class);

    Route::resource('testimonials' , TestimonialController::class);
  // روابط الصلاحيات
    Route::resource('roles' , RoleController::class);
    Route::get('/admins', [AdminController::class, 'admins'])->name('admins');
    Route::put('/admins/{id}', [AdminController::class, 'admins_edit'])->name('admins_edit');

    //----------------

    Route::get('/users', [AdminController::class, 'users'])->name('users');


});
Route::get(  '/'   , [MainController::class , 'index'])->name('site.home');
Route::get('/category/{slug}' , [MainController::class , 'category_single'])->name('site.category_single');


Route::get('/shop' , [MainController::class , 'shop'])->name('site.shop')->middleware('verified');
Route::get('/shop/{slug}' , [MainController::class , 'shop_details'])->name('site.shop_details');


Route::get('/blog' , [MainController::class , 'blog'])->name('site.blog');
Route::get('/blog/{slug}' , [MainController::class , 'blog_single'])->name('site.blog_single');
Route::post('/add-comment' , [MainController::class , 'add_comment'])
->name('site.add_comment');
Route::delete('/delete_comment/{id}' , [MainController::class , 'delete_comment'])
->name('site.delete_comment');




Route::get('/contact' , [MainController::class , 'contact'])->name('site.contact');
Route::post('/contact' , [MainController::class , 'contactus'])->name('site.contactus');


// تسجيل الدخول
Auth::routes([
    'verify' => true,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// روابط السلة
Route::post('/purchase_product/{id}' , [MainController::class , 'purchase_product'])->name('site.purchase_product');
Route::get('/cart', [MainController::class, 'cart'])->name('site.cart');
Route::delete('/delete_product/{id}' , [MainController::class , 'delete_product'])->name('site.delete_product');
Route::post('update_cart' , [MainController::class , 'update_cart'])->name('site.update_cart');
Route::get('checkout' , [MainController::class , 'checkout'])->name('site.checkout');
Route::get('thanks' , [MainController::class , 'thanks'])->name('site.thanks');



});
