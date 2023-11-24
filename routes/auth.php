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
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function() {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});


Route::middleware(['auth','nocache'])->group(function () {

    Route::get('/dashboard', function() {
        return view('dashboard.index')->with('title', 'Dashboard');
    })->name('auth.dashboard');

    Route::get('/projects', function() {
        return view('projects.index')->with('title', 'Project Lists');
    })->name('auth.projects');

    Route::get('/projects/{id}', function() {
        return view('projects.view')->with('title', '');
    })->name('auth.projects.id');






    Route::get('/lists', function() {
        return view('kanban.index')->with('title', 'Kanban Lists');
    })->name('kb.lists');
    
    Route::get('/view', function() {
        return view('kanban.view')->with('title', 'Kanban View');
    });
    
    Route::get('/users', function() {
        return view('users.index')->with('title', 'Organization Members');
    });
    
    Route::get('/reports', function() {
        return view('reports.index')->with('title', 'Reports');
    })->name('reports.list');
    
    Route::get('/reports/{id}', function() {
        return view('reports.view')->with('title', 'Reports');
    });

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});