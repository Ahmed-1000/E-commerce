<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\admincontroller;
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
    return view('dashboard.user.home');
})->name('landhome');




Route::prefix('user')->name('user.')->group(function(){
   Route::middleware(['guest:web','preventbackhistory'])->group(function(){
       Route::view('/login','dashboard.user.login')->name('login');
       Route::view('/register','dashboard.user.register')->name('register');
        Route::post('/create',[usercontroller::class,'create'])->name('create');
       Route::post('/check',[usercontroller::class,'check'])->name('check');
       
   });
    Route::middleware(['auth:web','preventbackhistory'])->group(function(){
       Route::view('/home','dashboard.user.home')->name('home'); 
       Route::post('/logout',[usercontroller::class,'logout'])->name('logout');
        Route::get('/product',[usercontroller::class,'displayproduct'])->name('displayproduct');   
        Route::post('/addcard/{id}',[usercontroller::class,'addcard'])->name('addcard'); 
         Route::get('/showcart',[usercontroller::class,'showcard'])->name('showcard');  
         Route::get('/search',[usercontroller::class,'search'])->name('search');  
         Route::get('delete/{id}',[usercontroller::class,'delete'])->name('delete');
    });
    
    
});
Route::prefix('admin')->name('admin.')->group(function(){
      Route::middleware(['guest:admin','preventbackhistory'])->group(function(){
          Route::view('/login','dashboard.admin.login')->name('login');
          Route::post('/check',[admincontroller::class,'check'])->name('check');
          
      });     
      Route::middleware(['auth:admin','preventbackhistory'])->group(function(){
          Route::view('/Home','dashboard.admin.Home')->name('Home'); 
          Route::post('/logout',[admincontroller::class,'logout'])->name('logout');
          Route::post('/productupload',[admincontroller::class,'productupload'])->name('productupload');
           Route::get('/products',[admincontroller::class,'products'])->name('products');
           Route::get('edit/{id}',[Admincontroller::class,'edit'])->name('edit');
          Route::put('update/{id}',[Admincontroller::class,'update'])->name('update');
           Route::get('delete/{id}',[Admincontroller::class,'delete'])->name('delete');
          
       });
  });          
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
