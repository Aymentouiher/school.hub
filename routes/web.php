
<?php

use Illuminate\Support\Facades\Route;


// Welcome page
    Route::get('/', function () {
    return view('welcome');})->name('welcome');

    Route::get('/admin', function () {
    return view('Admin.Admin super.Dashboard');})->name('admin.dashboard');
    
    Route::get('/Admin/statistiques', function () {
    return view('Admin.Admin super.statistiques');})->name('admin.statistiques');

     Route::get('/Admin/abonnements', function () {
    return view('Admin.Admin super.abonnements');})->name('admin.abonnements');
    
     Route::get('/login', function () {
    return view('login');})->name('login.auth');
