<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CustomAuthController;


Route::get('/', function () {
    return view('welcome');
});
Route::post('save',[MemberController::class,'saveData'])->name('saveUser');
Route::get('display',[MemberController::class,'displayD'])->name('display');
Route::get('delete/{id}',[MemberController::class,'deleteEntry'])->name('delete');
Route::get('edit/{id}',[MemberController::class,'showData'])->name('edit');
Route::post('edit',[MemberController::class,'edit'])->name('edit');
Route::get('form',function(){
    return view('form');
})->name('form');
Route::get('home',function(){
       return view('home');
})->name('home');
Route::get('view-file/{id}',[MemberController::class,'viewFile'])->name('view-file');
Route::get('download-file/{id}',[MemberController::class,'downloadFile'])->name('download-file');
Route::get('fileView',function(){
    return view('fileView');
})->name('fileView');
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard'); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Auth::routes(['verify' => true]);


