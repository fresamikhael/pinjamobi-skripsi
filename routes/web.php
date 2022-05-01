<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/cars', 'CarController@index')->name('cars');
Route::get('/cars/{id}', 'CarController@detail')->name('car-detail');

Route::get('/rentals', 'RentalController@index')->name('rentals');
Route::get('/rentals/{id}', 'RentalController@details')->name('rental-detail');

Route::get('/faq', 'FAQController@index')->name('faq');

Route::get('/details/{id}', 'DetailController@index')->name('detail');
Route::post('/details/{id}', 'DetailController@add')->name('detail-add');


Route::get('/invoice', 'CartController@invoice')->name('invoice');

Route::get('/success', 'CartController@success')->name('success');

Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');



Route::group(['middleware' => ['auth']], function(){
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::delete('/cart/{id}', 'CartController@delete')->name('cart-delete');

    Route::post('/checkout', 'CheckoutController@process')->name('checkout');
    Route::post('/checkout/callback', 'CheckoutController@callback')->name('midtrans-callback');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/dashboard/myorder', 'DashboardMyOrderController@index')->name('dashboard-myorder');
    Route::get('/dashboard/myorder/{id}', 'DashboardMyOrderController@details')->name('dashboard-myorder-details');
    Route::post('/dashboard/myorder/{id}', 'DashboardMyOrderController@update')->name('dashboard-myorder-update');

    Route::get('/dashboard/account', 'DashboardSettingController@account')->name('dashboard-settings-account');
    Route::post('/dashboard/account/{redirect}', 'DashboardSettingController@update')->name('dashboard-settings-redirect');

});

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->group(function() {
        Route::get('/', 'DashboardController@index')->name('admin-dashboard');
        Route::resource('category', 'CategoryController');
        Route::resource('user', 'UserController');
        Route::resource('car', 'CarController');
        Route::resource('car-gallery', 'CarGalleryController');
        Route::resource('transaction', 'TransactionController');
    });

Route::prefix('owner')
    ->namespace('Owner')
    ->middleware(['auth','owner'])
    ->group(function() {
        Route::get('/', 'DashboardController@index')->name('owner-dashboard');
        Route::get('/mycars', 'MyCarController@index')->name('owner-mycars');
        Route::get('/mycars/add', 'MyCarController@create')->name('owner-mycars-add');
        Route::post('/mycars', 'MyCarController@store')->name('owner-mycars-store');
        Route::get('/mycars/{id}', 'MyCarController@details')->name('owner-mycars-detail');
        Route::post('/mycars/{id}', 'MyCarController@update')->name('owner-mycars-update');
        Route::get('/mycars/delete/{id}', 'MyCarController@destroy')->name('owner-mycars-delete');

        Route::post('/mycars/gallery/upload', 'MyCarController@uploadGallery')->name('owner-mycars-gallery-upload');
        Route::get('/mycars/gallery/delete/{id}', 'MyCarController@deleteGallery')->name('owner-mycars-gallery-delete');

        Route::get('/transaction', 'TransactionController@index')->name('owner-transaction');
        Route::get('/transaction/{id}', 'TransactionController@details')->name('owner-transaction-detail');
        Route::post('/transaction/{id}', 'TransactionController@update')->name('owner-transaction-update');
        Route::get('/transaction/delete/{id}', 'TransactionController@destroy')->name('owner-transaction-delete');

        Route::get('/setting', 'SettingController@setting')->name('owner-setting');
        Route::get('/account', 'SettingController@account')->name('owner-account');
        Route::post('/account/{redirect}', 'SettingController@update')->name('owner-settings-redirect');
        Route::post('/setting/{redirect}', 'SettingController@updateSetting')->name('owner-settings-update-redirect');

    });



Auth::routes();

