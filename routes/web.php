<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectManagementController;

Route::get('/', function () {
  return view('welcome');
});

Route::controller(ProjectManagementController::class)->prefix('/projects')->group(function () {
  Route::get('/', 'index')->name('projects.index');

});
