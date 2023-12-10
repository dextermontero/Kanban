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
use App\Http\Controllers\ColleagueController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\WorkstationController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function() {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register.account');
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});


Route::middleware(['auth','nocache', 'verified'])->group(function () {

    Route::controller(DashboardController::class)->group(function() {
        Route::get('/dashboard', 'index')->name('auth.dashboard');
    });

    Route::controller(ProjectController::class)->group(function() {
        Route::get('/projects', 'listProjects')->name('auth.projects');
        Route::get('/projects/{id}', 'viewProject')->name('auth.project.view');
        Route::post('/projects', 'create')->name('create.project');

        Route::post('/projects/remove/{id}', 'removeProject')->name('project.remove');
    });

    Route::controller(WorkstationController::class)->group(function() {
        Route::get('/workstation', 'listWorkstation')->name('auth.listWorkstation');
        Route::get('/workstation/{id}', 'viewWorkstation')->name('auth.workstation');
        Route::post('/workstation/add', 'addTask')->name('add.task');
        Route::post('/workstation/update', 'updateTask')->name('update.task');
    });
    
    Route::controller(ColleagueController::class)->group(function() {
        Route::get('/organization', 'indexMember')->name('auth.organization');
        Route::get('/manage/{id}', 'manageMember')->name('auth.organization.view');
        Route::post('/manage/invite', 'invite')->name('invite.member');
        //Search Member
        Route::post('/member/search', 'searchMember')->name('search.member');
        Route::post('/member/add', 'addMember')->name('add.member');
        Route::post('/manage/delete', 'removeMember')->name('remove.member');
    });

    Route::controller(ReportController::class)->group(function() {
        Route::get('/reports', 'indexReport')->name('auth.report');
        Route::get('/reports/{id}', 'viewReport')->name('auth.report.view');
        Route::get('/reports/item/{id}', 'viewReportItem')->name('auth.report.item');

        Route::post('/reports/add', 'addReport')->name('add.report');
    });

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});