<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepositionController;
use App\Http\Controllers\CaroulselController;
use App\Http\Controllers\SendMailController;

Route::get('/', HomeController::class);
Route::post('/sendMailUser',SendMailController::class);

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',function(){
        return view('dash.dashboard');
    })->name('dashboard');

    //Depositions 
    Route::get('/depositions',[DepositionController::class,'index'])->name('depositions');
    Route::get('/depositions/delete/{id}',[DepositionController::class,'delete'])->name('depositionsDelete');
    Route::get('/depositions/add',[DepositionController::class,'add'])->name('depositionsAdd');
    Route::post('/depositions/store',[DepositionController::class,'store'])->name('depositionsStore');
    Route::get('/depositions/show/{id}',[DepositionController::class,'show'])->name('depositionsShow');
    Route::post('/depositions/edit/{id}',[DepositionController::class,'edit'])->name('depositionsEdit');

    //Caroulsels
    Route::get('/caroulsels',[CaroulselController::class,'index'])->name('caroulsels');
    Route::get('/caroulsel/add',[CaroulselController::class,'add'])->name('caroulselAdd');
    Route::post('/caroulsel/store',[CaroulselController::class,'store'])->name('caroulselStore');
    Route::get('/caroulsel/delete/{id}',[CaroulselController::class,'delete'])->name('caroulselDelete');
    Route::get('/caroulsel/status/{id}',[CaroulselController::class,'changeStatus'])->name('caroulselStatus');
});

require __DIR__.'/auth.php';
