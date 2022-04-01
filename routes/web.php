<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','App\Http\Controllers\Frontend\FrontenController@index');
Route::get('/about_us','App\Http\Controllers\Frontend\FrontenController@aboutUs')->name('about.us');
Route::get('/contact_us','App\Http\Controllers\Frontend\FrontenController@contactUs')->name('contact.us');
Route::post('/contact/store','App\Http\Controllers\Frontend\FrontenController@store')->name('contact.store');
Route::get('/shopping/cart','App\Http\Controllers\Frontend\FrontenController@shoppingCart')->name('shopping.cart');
Route::get('/product-list','App\Http\Controllers\Frontend\FrontenController@productList')->name('products.list');
Route::get('/product-category/{category_id}','App\Http\Controllers\Frontend\FrontenController@categoryWiseProduct')->name('category.wise.products');
Route::get('/product-brand/{brand_id}','App\Http\Controllers\Frontend\FrontenController@brandWiseProduct')->
name('brand.wise.products');
Route::get('/product-details/{slug}','App\Http\Controllers\Frontend\FrontenController@productDetails')->
name('product.details.info');
Route::post('/find-product','App\Http\Controllers\Frontend\FrontenController@findProduct')->name('find.product');
Route::get('/get-product','App\Http\Controllers\Frontend\FrontenController@getProduct')->name('get.product');



//cart shipping
Route::post('/add-to-cart','App\Http\Controllers\Frontend\CartController@addtoCart')->name('insert.cart');
Route::get('/show-cart','App\Http\Controllers\Frontend\CartController@showCart')->name('show.cart');
Route::post('/update-cart','App\Http\Controllers\Frontend\CartController@updateCart')->name('update.cart');
Route::get('/delete-cart/{rowId}','App\Http\Controllers\Frontend\CartController@deleteCart')->name('delete.cart');

//Customer login
Route::get('/customer-login','App\Http\Controllers\Frontend\CekoutController@cekoutlogin')->name('customer.login');
Route::get('/customer-signup','App\Http\Controllers\Frontend\CekoutController@cekoutsignup')->name('customer.signup');
Route::post('/signup-store','App\Http\Controllers\Frontend\CekoutController@signupStore')->name('signup.store');
Route::get('/mail-verify','App\Http\Controllers\Frontend\CekoutController@emailVerify')->name('mail.verify');
Route::post('/verify-store','App\Http\Controllers\Frontend\CekoutController@verifyStore')->name('verify.store');
Route::get('/checkout','App\Http\Controllers\Frontend\CekoutController@checkOut')->name('customer.checkout');
Route::post('/checkout-store','App\Http\Controllers\Frontend\CekoutController@checkOutstore')->name('customer.checkout.store');


Auth::routes();

//customer-dashbord
Route::group(['Middlewarw'=>['Auth','customer']],function(){
    Route::get('/dashbord','App\Http\Controllers\Frontend\dashbordController@dashbord')->name('dashbord');
    Route::get('/customer-edit-profile','App\Http\Controllers\Frontend\dashbordController@editProfile')->name('customer.edit.profile');
    Route::post('/customer-update-profile','App\Http\Controllers\Frontend\dashbordController@updateProfile')->name('customer.update.profile');
    Route::get('/password-change','App\Http\Controllers\Frontend\dashbordController@changePass')->name('password.change');
    Route::post('/password-update','App\Http\Controllers\Frontend\dashbordController@updatePass')->name('password.update');
    Route::get('/payment','App\Http\Controllers\Frontend\dashbordController@payment')->name('customer.payment');
    Route::post('/payment/store','App\Http\Controllers\Frontend\dashbordController@paymentStore')->name('customer.payment.store');
    Route::get('/order/list','App\Http\Controllers\Frontend\dashbordController@orderList')->name('customer.order.list');
    Route::get('/order-details/{id}','App\Http\Controllers\Frontend\dashbordController@orderDetails')->name('customer.order.details');
    Route::get('/order-print/{id}','App\Http\Controllers\Frontend\dashbordController@orderPrint')->name('customer.order.print');
    });

Route::group(['Middlewarw'=>['Auth','admin']],function(){
//Admin-dashbord
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('users')->group(function(){
    Route::get('/view','App\Http\Controllers\backend\userController@view')->name('user.view');
    Route::get('/add','App\Http\Controllers\backend\userController@add')->name('user.add');
    Route::post('/store','App\Http\Controllers\backend\userController@store')->name('user.store');
    Route::get('/edit/{id}','App\Http\Controllers\backend\userController@edit')->name('user.edit');
    Route::post('/update/{id}','App\Http\Controllers\backend\userController@update')->name('user.update');
    Route::get('/delete/{id}','App\Http\Controllers\backend\userController@delete')->name('user.delete');
    });
    Route::prefix('profiles')->group(function(){
    Route::get('/view','App\Http\Controllers\backend\ProfileController@view')->name('profiles.view');
    Route::get('/edit','App\Http\Controllers\backend\ProfileController@edit')->name('profiles.edit');
    Route::post('/store','App\Http\Controllers\backend\ProfileController@update')->name('profiles.update');
    Route::get('/passowrd/view','App\Http\Controllers\backend\ProfileController@passwordView')->name('profiles.passowrd.view');
    Route::post('/passowrd/update','App\Http\Controllers\backend\ProfileController@passwordUpdate')->name('profiles.passowrd.update');
    });
    Route::prefix('logos')->group(function(){
    Route::get('/view','App\Http\Controllers\backend\LogoController@view')->name('logos.view');
    Route::get('/add','App\Http\Controllers\backend\LogoController@add')->name('logos.add');
    Route::post('/store','App\Http\Controllers\backend\LogoController@store')->name('logos.store');
    Route::get('/edit/{id}','App\Http\Controllers\backend\LogoController@edit')->name('logos.edit');
    Route::post('/update/{id}','App\Http\Controllers\backend\logoController@update')->name('logos.update');
    Route::get('/delete/{id}','App\Http\Controllers\backend\LogoController@delete')->name('logos.delete');
    });
    Route::prefix('sliders')->group(function(){ 
    Route::get('/view','App\Http\Controllers\backend\sliderController@view')->name('sliders.view');
    Route::get('/add','App\Http\Controllers\backend\sliderController@add')->name('sliders.add');
    Route::post('/store','App\Http\Controllers\backend\sliderController@store')->name('sliders.store');
    Route::get('/edit/{id}','App\Http\Controllers\backend\sliderController@edit')->name('sliders.edit');
    Route::post('/update/{id}','App\Http\Controllers\backend\sliderController@update')->name('sliders.update');
    Route::get('/delete/{id}','App\Http\Controllers\backend\sliderController@delete')->name('sliders.delete');
    });
    
    Route::prefix('contacts')->group(function(){
    Route::get('/view','App\Http\Controllers\backend\ContactController@view')->name('contacts.view');
    Route::get('/add','App\Http\Controllers\backend\ContactController@add')->name('contacts.add');
    Route::post('/store','App\Http\Controllers\backend\ContactController@store')->name('contacts.store');
    Route::get('/edit/{id}','App\Http\Controllers\backend\ContactController@edit')->name('contacts.edit');
    Route::post('/update/{id}','App\Http\Controllers\backend\ContactController@update')->name('contacts.update');
    Route::get('/delete/{id}','App\Http\Controllers\backend\ContactController@delete')->name('contacts.delete');
    Route::get('/communicate','App\Http\Controllers\backend\ContactController@communicate')->name('communicate');
    Route::get('/communicate/delete/{id}','App\Http\Controllers\backend\ContactController@deletCommunicate')->name('contacts.communicate.delete');
    
    });
    
    Route::prefix('abouts')->group(function(){
    Route::get('/view','App\Http\Controllers\backend\AboutController@view')->name('abouts.view');
    Route::get('/add','App\Http\Controllers\backend\AboutController@add')->name('abouts.add');
    Route::post('/store','App\Http\Controllers\backend\AboutController@store')->name('abouts.store');
    Route::get('/edit/{id}','App\Http\Controllers\backend\AboutController@edit')->name('abouts.edit');
    Route::post('/update/{id}','App\Http\Controllers\backend\AboutController@update')->name('abouts.update');
    Route::get('/delete/{id}','App\Http\Controllers\backend\AboutController@delete')->name('abouts.delete');
    });
    
    
    Route::prefix('categorys')->group(function(){
        Route::get('/view','App\Http\Controllers\backend\CategoryController@view')->name('categorys.view');
        Route::get('/add','App\Http\Controllers\backend\CategoryController@add')->name('categorys.add');
        Route::post('/store','App\Http\Controllers\backend\CategoryController@store')->name('categorys.store');
        Route::get('/edit/{id}','App\Http\Controllers\backend\CategoryController@edit')->name('categorys.edit');
        Route::post('/update/{id}','App\Http\Controllers\backend\CategoryController@update')->name('categorys.update');
        Route::get('/delete/{id}','App\Http\Controllers\backend\CategoryController@delete')->name('categorys.delete');
        });
    
    
    Route::prefix('brands')->group(function(){
        Route::get('/view','App\Http\Controllers\backend\BrandController@view')->name('brands.view');
        Route::get('/add','App\Http\Controllers\backend\BrandController@add')->name('brands.add');
        Route::post('/store','App\Http\Controllers\backend\BrandController@store')->name('brands.store');
        Route::get('/edit/{id}','App\Http\Controllers\backend\BrandController@edit')->name('brands.edit');
        Route::post('/update/{id}','App\Http\Controllers\backend\BrandController@update')->name('brands.update');
        Route::get('/delete/{id}','App\Http\Controllers\backend\BrandController@delete')->name('brands.delete');
        });
    
    Route::prefix('colors')->group(function(){
        Route::get('/view','App\Http\Controllers\backend\ColorController@view')->name('colors.view');
        Route::get('/add','App\Http\Controllers\backend\ColorController@add')->name('colors.add');
        Route::post('/store','App\Http\Controllers\backend\ColorController@store')->name('colors.store');
        Route::get('/edit/{id}','App\Http\Controllers\backend\ColorController@edit')->name('colors.edit');
        Route::post('/update/{id}','App\Http\Controllers\backend\ColorController@update')->name('colors.update');
        Route::get('/delete/{id}','App\Http\Controllers\backend\ColorController@delete')->name('colors.delete');
        });
    
    
    Route::prefix('sizes')->group(function(){
        Route::get('/view','App\Http\Controllers\backend\SizeController@view')->name('sizes.view');
        Route::get('/add','App\Http\Controllers\backend\SizeController@add')->name('sizes.add');
        Route::post('/store','App\Http\Controllers\backend\SizeController@store')->name('sizes.store');
        Route::get('/edit/{id}','App\Http\Controllers\backend\SizeController@edit')->name('sizes.edit');
        Route::post('/update/{id}','App\Http\Controllers\backend\SizeController@update')->name('sizes.update');
        Route::get('/delete/{id}','App\Http\Controllers\backend\SizeController@delete')->name('sizes.delete');
        });
        
    
    Route::prefix('products')->group(function(){
        Route::get('/view','App\Http\Controllers\backend\ProductController@view')->name('products.view');
        Route::get('/add','App\Http\Controllers\backend\ProductController@add')->name('products.add');
        Route::post('/store','App\Http\Controllers\backend\ProductController@store')->name('products.store');
        Route::get('/edit/{id}','App\Http\Controllers\backend\ProductController@edit')->name('products.edit');
        Route::post('/update/{id}','App\Http\Controllers\backend\ProductController@update')->name('products.update');
        Route::get('/delete/{id}','App\Http\Controllers\backend\ProductController@delete')->name('products.delete');
        Route::get('/details/{id}','App\Http\Controllers\backend\ProductController@details')->name('products.details');
        });
    
    
    Route::prefix('customers')->group(function(){
            Route::get('/view','App\Http\Controllers\backend\customerController@view')->name('customers.view');
            Route::get('/draft/view','App\Http\Controllers\backend\customerController@draft')->name('customers.draft.view');
            Route::get('/delete/{id}','App\Http\Controllers\backend\customerController@delete')->name('customers.delete');
    
            });

    Route::prefix('orders')->group(function(){
        Route::get('/pending/list','App\Http\Controllers\backend\orderController@pendingList')->name('orders.pending.list');
        Route::get('/approved/list','App\Http\Controllers\backend\orderController@approvedList')->name('orders.appdoved.list');
        Route::get('/details/{id}','App\Http\Controllers\backend\orderController@details')->name('orders.details.list');
        Route::post('/approved/{order}','App\Http\Controllers\backend\orderController@approved')->name('orders.approved');
      

        });
    
    
    Route::get('/password_recover','App\Http\Controllers\backend\userController@view_sent_mail_page');
    Route::post('/sent_mail','App\Http\Controllers\backend\userController@sent_mail');
    Route::post('/reset_pass','App\Http\Controllers\backend\userController@reset_pass');
    Route::post('/update_pass','App\Http\Controllers\backend\userController@update_pass');
    Auth::routes();
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    

});
