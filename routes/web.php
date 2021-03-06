<?php

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
    return view('pages.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//----------------Admin Routes------------------//

Route::get('admin/home', 'AdminController@index')->name('admin.home');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');

    //--------Passwords reset route----//

Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update');

Route::get('admin/logout', 'AdminController@Logout')->name('admin.logout');

    //-------------categories-----------//

Route::resource('admin/categories', 'Admin\Category\CategoryController')->except('show');
Route::resource('admin/brands', 'Admin\Category\BrandController')->except('show');
Route::resource('admin/subcategories', 'Admin\Category\SubcategoryController')->except('show');

    //-------------coupon---------------//
Route::resource('admin/coupons', 'Admin\Coupon\CouponController')->except('show');

    //-----------Newsletter---------//
Route::resource('admin/newsletter','Admin\Newsletter\NewsletterController')->except(['create','show','edit','update']);





