<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductControllerResource;
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about', function () {
//     return view('about');
// });

Route::get('/about',[AboutController::class,'index']);

Route::get('/user',[UsersController::class,'index']);

Route::get('/profile/{id}',[UsersController::class,'profile']);

Route::get('/users', [UsersController::class, 'all_users']);

///////////////////////////////////////////////////////////////////////////////////
//Route::get('/home',function (){
//    return view('welcome');
//});

//Route::match(['get','post'],'/home',function (){
//    return view('welcome');
//});

//Route::any('/home',function (){
//    return view('welcome');
//});

Route::view('/home','welcome');




Route::prefix('/dashboard')->group(function(){
    Route::get('/',function (){
        echo 'dashboard home';
    });
    Route::get('/orders',function (){
        echo 'dashboard orders';
    });
});

//Route::middleware(['checkuser'])->group(function(){
//    Route::prefix('/profile')->group(function(){
//        Route::get('/',function (){
//            echo 'profile';
//        });
//        Route::get('/settings',function (){
//            echo 'settings';
//        });
//    });
//});

Route::group(['middleware' => ['checkuser'], 'prefix' => 'dashboard'], function () {
    Route::get('/',function (){
        echo 'profile';
    });
    Route::get('/settings',function (){
        echo 'settings';
    });
});

Route::get('/layout',[HomeController::class,'index']);


Route::prefix('/contact')->group(function(){
    Route::get('/',[ContactController::class,'index']);
    Route::get('/data',[ContactController::class,'get_data']);
    Route::post('/submit',[ContactController::class,'submit']) -> name('contact.submit');
});

Route::group(['prefix'=>'/auth'],function () {

    Route::get('/register', [RegisterController::class, 'index'])->name('auth.register'); // For the registration form
    Route::post('/register-post', [RegisterController::class, 'save'])->name('auth.register.post'); // For form submission

    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('/login-post',[LoginController::class,'save'])->name('auth.login');

});
Route::get('/logout',[LogoutController::class,'logout_system'])->middleware('auth');

Route::group(['prefix'=>'/dashboard'],function () {
    Route::get('/users',[DashboardController::class,'users']);

});



Route::get('/delete', [DeleteController::class, 'delete'])->name('delete');

Route::group(['prefix'=>'/dashboard', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/users', [DashboardController::class, 'users'])->name('dashboard.users');
    Route::get('/users/{id}/edit', [DashboardController::class, 'edit'])->name('dashboard.users.edit');
    Route::post('/users/{id}/update', [DashboardController::class, 'update'])->name('dashboard.users.update');

});

Route::get('/products', [ProductControllerResource::class, 'index'])->name('products.index');

Route::middleware(['auth', 'seller'])->group(function () {
    Route::get('/products/create', [ProductControllerResource::class, 'create'])->name('products.create');
    Route::post('/products', [ProductControllerResource::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductControllerResource::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductControllerResource::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductControllerResource::class, 'destroy'])->name('products.destroy');
});


// Cart routes
// Cart routes


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');




