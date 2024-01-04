<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    ProfileController,
    MailSettingController,
    FrontUserController,
    generalSettingController,
    CategoryController,
    BrowserhistoryController,
};

use App\Http\Controllers\Front\{
    FrontDashboardController,
};

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
    notify()->error('Laravel Notify is awesome!', 'My custom title');
    return view('welcome');    
});


Route::get('/test-mail',function(){

    $message = "Testing mail";

    \Mail::raw('Hi, welcome!', function ($message) {
      $message->to('ajayydavex@gmail.com')
        ->subject('Testing mail');
    });

    dd('sent');

});


//Front User Dashbaord Routes 
Route::middleware(['front'])->group(function () {
    //Dashboard Routes
    Route::get('/dashboard', [FrontDashboardController::class,'index'])->name('dashboard');
    
});


require __DIR__.'/front_auth.php';




// Admin routes
Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('admin.dashboard');

require __DIR__.'/auth.php';


Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('admin')
    ->group(function(){


        Route::resource('roles','RoleController');
        Route::resource('permissions','PermissionController');
        Route::resource('users','UserController');
        Route::resource('posts','PostController');
        
        //Front User Routes
        Route::resource('front-users','FrontUserController');
        Route::get('user-browser-history/{id}', [FrontUserController::class,'get_user_bowser_history'])->name('userBrowserHistory');

        //Category Routes
        Route::resource('categories','CategoryController');
        Route::get('category/edit/{id}/{sid?}', [CategoryController::class,'edit']);
        Route::get('category/delete/{sid}', [CategoryController::class,'sub_category_destroy']);

        //Store Route
        Route::resource('stores','StoreController');

        Route::get('/profile',[ProfileController::class,'index'])->name('profile');
        Route::put('/profile-update',[ProfileController::class,'update'])->name('profile.update');
        Route::get('/mail',[MailSettingController::class,'index'])->name('mail.index');
        Route::put('/mail-update/{mailsetting}',[MailSettingController::class,'update'])->name('mail.update');
        //General Routes
        Route::get('/clear-cache-all', [generalSettingController::class, 'clearCache'])->name('clearCache');
});
