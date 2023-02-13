<?php

use App\Http\Controllers\studentAuth\AuthenticatedSessionController;
use App\Http\Controllers\studentAuth\ConfirmablePasswordController;
use App\Http\Controllers\studentAuth\EmailVerificationNotificationController;
use App\Http\Controllers\studentAuth\EmailVerificationPromptController;
use App\Http\Controllers\studentAuth\NewPasswordController;
use App\Http\Controllers\studentAuth\PasswordResetLinkController;
use App\Http\Controllers\studentAuth\RegisteredUserController;
use App\Http\Controllers\studentAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;




Route::group(['middleware' => ['guest:student','guest'],'prefix'=>'student','as'=>'student.'],function(){

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

Route::group(['middleware' => ['auth:student'],'prefix'=>'student','as'=>'student.'],function(){

    Route::get('ticket', [StudentController::class, 'ticket'])
        ->name('ticket');

    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('dashboard',[\App\Http\Controllers\StudentController::class, 'index'])->name('dashboard');
    Route::get('add',[\App\Http\Controllers\StudentController::class, 'create'])->name('add');
    Route::delete('delete/{id}',[\App\Http\Controllers\StudentController::class, 'destroy'])->name('delete')->whereNumber('id');;

    Route::post('/store',[\App\Http\Controllers\StudentController::class, 'store'])->name('storeSubject');

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



