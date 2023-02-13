<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest','guest:student'],'prefix'=>'admin','as'=>'admin.'],function(){

    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::get('login', function () {
        return redirect()->route('home');
    })->name('login')->middleware('throttle:5,100');

    Route::post('register', [RegisteredUserController::class, 'store']);

//    Route::get('login', [AuthenticatedSessionController::class, 'create'])
//        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

//    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
//        ->name('password.request');
//
//    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
//        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');
});

Route::group(['middleware' => ['auth'],'prefix'=>'admin','as'=>'admin.'],function(){
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');
    Route::get('/trs/{id}/{sub?}', [App\Http\Controllers\AdminController::class, 'student'])->name('trs')->whereNumber('id');
    Route::get('/st/{id}/{sub?}', [App\Http\Controllers\AdminController::class, 'stud'])->name('st')->whereNumber('id');
    Route::get('/sb/', [App\Http\Controllers\AdminController::class, 'stub'])->name('sb');

    Route::get('/hours/{id}', [App\Http\Controllers\AdminController::class, 'hours'])->name('hours')->whereNumber('id');
    Route::post('/softDell/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('destroy')->whereNumber('id');
    Route::post('/destroy/{id}', [App\Http\Controllers\AdminController::class, 'delete'])->name('delete')->whereNumber('id');
    Route::post('/accept/{id}', [App\Http\Controllers\AdminController::class, 'accept'])->name('accept')->whereNumber('id');
    Route::post('/restore/{id}', [App\Http\Controllers\AdminController::class, 'restore'])->name('restore')->whereNumber('id');
    Route::get('/ticket/{id}', [App\Http\Controllers\AdminController::class, 'ticket'])->name('ticket')->where('id','[1-7]');

    Route::get('dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});






