<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome')->with('title', 'Kanban Board');
});

Route::get('/dashboard', function() {
    return view('dashboard.index')->with('title', 'Dashboard');
});

Route::get('/lists', function() {
    return view('kanban.index')->with('title', 'Kanban Lists');
});

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