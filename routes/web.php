
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
   // admin ecoles routes 
   
    Route::get('/admin-ecole/profs', function () {
    return view('Admin.Admin ecole.profs');})->name('admin.ecole.profs');

    Route::get('/admin-ecole/filiers', function () {
     return view('Admin.Admin ecole.filiers');})->name('admin.ecole.filiers');

     Route::get('/admin-ecole/etudiants', function () {
     return view('Admin.Admin ecole.etudiants');})->name('admin.ecole.etudiants');

      Route::get('/admin-ecole/emplois_profs', function () {
     return view('Admin.Admin ecole.emplois_profs');})->name('admin.ecole.emplois_profs');

       Route::get('/admin-ecole/emplois_classes', function () {
     return view('Admin.Admin ecole.emplois_classes');})->name('admin.ecole.emplois_classes');
     
      Route::get('/admin-ecole/classes', function () {
     return view('Admin.Admin ecole.classes');})->name('admin.ecole.classes');

      Route::get('/admin-ecole/absences', function () {
     return view('Admin.Admin ecole.absences');})->name('admin.ecole.absences');

      
      Route::get('/admin-ecole/abonnements', function () {
     return view('Admin.Admin ecole.absences');})->name('admin.ecole.abonnements');