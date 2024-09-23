<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalDataController;
use App\Http\Controllers\ProfessionalProfileController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ComplementaryEducationController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\AwardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

Route::get('education/{id}/edit', [EducationController::class, 'edit'])->name('education.edit');


// Rutas para datos personales
Route::resource('personal_data', PersonalDataController::class);

// Rutas para perfil profesional
Route::resource('professional_profile', ProfessionalProfileController::class);

// Rutas para educación
Route::resource('education', EducationController::class);

// Rutas para idiomas
Route::resource('languages', LanguageController::class);

// Rutas para educación complementaria
Route::resource('complementary_education', ComplementaryEducationController::class);

// Rutas para investigaciones
Route::resource('research', ResearchController::class);

// Rutas para experiencia laboral
Route::resource('work_experience', WorkExperienceController::class);

// Rutas para premios y distinciones
Route::resource('awards', AwardController::class);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
