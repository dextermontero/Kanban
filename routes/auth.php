<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\WorkstationController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function() {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});


Route::middleware(['auth','nocache', 'verified'])->group(function () {

    Route::get('/dashboard', function() {
        return view('dashboard.index')->with('title', 'Dashboard');
    })->name('auth.dashboard');

    Route::controller(ProjectController::class)->group(function() {
        Route::get('/projects', 'listProjects')->name('auth.projects');
        Route::get('/projects/{id}', 'viewProject')->name('auth.project.view');
        Route::post('/projects', 'create')->name('create.project');
    });

    Route::controller(WorkstationController::class)->group(function() {
        Route::get('/workstation', 'listWorkstation')->name('auth.listWorkstation');
        Route::get('/workstation/{id}', 'viewWorkstation')->name('auth.workstation');
    });
    
    Route::get('/users', function() {
        return view('users.index')->with('title', 'Organization Members');
    });
    
    Route::controller(ReportController::class)->group(function() {
        Route::get('/reports', 'indexReport')->name('auth.report');
        Route::get('/reports/{id}', 'viewReport')->name('auth.report.view');
    });

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});