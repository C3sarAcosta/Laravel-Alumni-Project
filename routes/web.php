<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*****Controllers*****/
//Actor
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CompanyController;
//Survey
use App\Http\Controllers\backend\survey\SurveyOneController;
use App\Http\Controllers\backend\survey\SurveyTwoController;
use App\Http\Controllers\backend\survey\SurveyThreeController;
use App\Http\Controllers\backend\survey\SurveyFourController;
use App\Http\Controllers\backend\survey\SurveyFiveController;
use App\Http\Controllers\backend\survey\SurveySixController;
use App\Http\Controllers\backend\survey\SurveySevenController;
//Company Survey
use App\Http\Controllers\backend\survey\CompanySurveyOneController;
use App\Http\Controllers\backend\survey\CompanySurveyTwoController;
use App\Http\Controllers\backend\survey\CompanySurveyThreeController;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\UserController@index')->name('dashboard');

Route::prefix('admin')->group(function () {
    Route::get('/index', [AdminController::class, 'AdminIndexView'])->name('admin.index');
    Route::get('/perfil', [AdminController::class, 'AdminProfileView'])->name('admin.view');
    Route::get('/salir', [AdminController::class, 'AdminLogout'])->name('admin.logout');
});

Route::prefix('egresado')->group(function () {
    Route::get('/index/{user_id}', [StudentController::class, 'StudentIndexView'])->name('student.index');
    Route::get('/perfil', [StudentController::class, 'StudentProfileView'])->name('student.view');
    Route::get('/salir', [StudentController::class, 'StudentLogout'])->name('student.logout');

    //// Survey Start////

    //Survey One
    Route::get('/encuesta/perfil', [SurveyOneController::class, 'SurveyOneView'])->name('survey.one.index');
    Route::post('/encuesta/perfil/guardar', [SurveyOneController::class, 'SurveyOneStore'])->name('survey.one.store');
    Route::get('/encuesta/perfil/editar/{user_id}', [SurveyOneController::class, 'SurveyOneEdit'])->name('survey.one.edit');
    Route::post('/encuesta/perfil/actualizar', [SurveyOneController::class, 'SurveyOneUpdate'])->name('survey.one.update');
    Route::get('/encuesta/perfil/{user_id}', [SurveyOneController::class, 'SurveyOneVerifiedRoute'])->name('survey.one.verified');

    //Survey Two
    Route::get('/encuesta/pertinencia/', [SurveyTwoController::class, 'SurveyTwoView'])->name('survey.two.index');
    Route::post('/encuesta/pertinencia/guardar', [SurveyTwoController::class, 'SurveyTwoStore'])->name('survey.two.store');
    Route::get('/encuesta/pertinencia/editar/{user_id}', [SurveyTwoController::class, 'SurveyTwoEdit'])->name('survey.two.edit');
    Route::post('/encuesta/pertinencia/actualizar', [SurveyTwoController::class, 'SurveyTwoUpdate'])->name('survey.two.update');
    Route::get('/encuesta/pertinencia/{user_id}', [SurveyTwoController::class, 'SurveyTwoVerifiedRoute'])->name('survey.two.verified');

    //Survey Three
    Route::get('/encuesta/ubicacion', [SurveyThreeController::class, 'SurveyThreeView'])->name('survey.three.index');
    Route::post('/encuesta/ubicacion/guardar', [SurveyThreeController::class, 'SurveyThreeStore'])->name('survey.three.store');
    Route::get('/encuesta/ubicacion/editar/{user_id}', [SurveyThreeController::class, 'SurveyThreeEdit'])->name('survey.three.edit');
    Route::post('/encuesta/ubicacion/actualizar', [SurveyThreeController::class, 'SurveyThreeUpdate'])->name('survey.three.update');
    Route::get('/encuesta/ubicacion/{user_id}', [SurveyThreeController::class, 'SurveyThreeVerifiedRoute'])->name('survey.three.verified');

    //Survey Four
    Route::get('/encuesta/desempeno', [SurveyFourController::class, 'SurveyFourView'])->name('survey.four.index');
    Route::post('/encuesta/desempeno/guardar', [SurveyFourController::class, 'SurveyFourStore'])->name('survey.four.store');
    Route::get('/encuesta/desempeno/editar/{user_id}', [SurveyFourController::class, 'SurveyFourEdit'])->name('survey.four.edit');
    Route::post('/encuesta/desempeno/actualizar', [SurveyFourController::class, 'SurveyFourUpdate'])->name('survey.four.update');
    Route::get('/encuesta/desempeno/{user_id}', [SurveyFourController::class, 'SurveyFourVerifiedRoute'])->name('survey.four.verified');

    //Survey Five
    Route::get('/encuesta/expectativas', [SurveyFiveController::class, 'SurveyFiveView'])->name('survey.five.index');
    Route::post('/encuesta/expectativas/guardar', [SurveyFiveController::class, 'SurveyFiveStore'])->name('survey.five.store');
    Route::get('/encuesta/expectativas/editar/{user_id}', [SurveyFiveController::class, 'SurveyFiveEdit'])->name('survey.five.edit');
    Route::post('/encuesta/expectativas/actualizar', [SurveyFiveController::class, 'SurveyFiveUpdate'])->name('survey.five.update');
    Route::get('/encuesta/expectativas/{user_id}', [SurveyFiveController::class, 'SurveyFiveVerifiedRoute'])->name('survey.five.verified');

    //Survey Six
    Route::get('/encuesta/partipacion', [SurveySixController::class, 'SurveySixView'])->name('survey.six.index');
    Route::post('/encuesta/partipacion/guardar', [SurveySixController::class, 'SurveySixStore'])->name('survey.six.store');
    Route::get('/encuesta/partipacion/editar/{user_id}', [SurveySixController::class, 'SurveySixEdit'])->name('survey.six.edit');
    Route::post('/encuesta/partipacion/actualizar', [SurveySixController::class, 'SurveySixUpdate'])->name('survey.six.update');
    Route::get('/encuesta/partipacion/{user_id}', [SurveySixController::class, 'SurveySixVerifiedRoute'])->name('survey.six.verified');

    //Survey Seven
    Route::get('/encuesta/comentarios', [SurveySevenController::class, 'SurveySevenView'])->name('survey.seven.index');
    Route::post('/encuesta/comentarios/guardar', [SurveySevenController::class, 'SurveySevenStore'])->name('survey.seven.store');
    Route::get('/encuesta/comentarios/editar/{user_id}', [SurveySevenController::class, 'SurveySevenEdit'])->name('survey.seven.edit');
    Route::post('/encuesta/comentarios/actualizar', [SurveySevenController::class, 'SurveySevenUpdate'])->name('survey.seven.update');
    Route::get('/encuesta/comentarios/{user_id}', [SurveySevenController::class, 'SurveySevenVerifiedRoute'])->name('survey.seven.verified');

    //Verified Survey Route
    //// Survey End////

    //Jobs
    Route::get('/trabajos/ofertas', [StudentController::class, 'JobsView'])->name('jobs.view');
});

Route::prefix('empresas')->group(function () {
    Route::get('/ingresar', [CompanyController::class, 'CompanyLogin'])->name('company.login');
    Route::get('/registrar', [CompanyController::class, 'CompanyRegister'])->name('company.register');
    Route::get('/index/{user_id}', [CompanyController::class, 'CompanyIndexView'])->name('company.index');
    Route::get('/perfil', [CompanyController::class, 'CompanyProfileView'])->name('company.view');
    Route::get('/salir', [CompanyController::class, 'CompanyLogout'])->name('company.logout');

    //Survey

    //Survey One
    Route::get('/encuesta/datos', [CompanySurveyOneController::class, 'CompanySurveyOneView'])->name('survey.one.company.index');
    Route::post('/encuesta/datos/guardar', [CompanySurveyOneController::class, 'CompanySurveyOneStore'])->name('survey.one.company.store');
    Route::get('/encuesta/datos/editar/{user_id}', [CompanySurveyOneController::class, 'CompanySurveyOneEdit'])->name('survey.one.company.edit');
    Route::post('/encuesta/datos/actualizar', [CompanySurveyOneController::class, 'CompanySurveyOneUpdate'])->name('survey.one.company.update');
    Route::get('/encuesta/datos/{user_id}', [CompanySurveyOneController::class, 'CompanySurveyOneVerifiedRoute'])->name('survey.one.company.verified');

    //Survey Two
    Route::get('/encuesta/ubicacion', [CompanySurveyTwoController::class, 'CompanySurveyTwoView'])->name('survey.two.company.index');
    Route::post('/encuesta/ubicacion/guardar', [CompanySurveyTwoController::class, 'CompanySurveyTwoStore'])->name('survey.two.company.store');
    Route::get('/encuesta/ubicacion/editar/{user_id}', [CompanySurveyTwoController::class, 'CompanySurveyTwoEdit'])->name('survey.two.company.edit');
    Route::post('/encuesta/ubicacion/actualizar', [CompanySurveyTwoController::class, 'CompanySurveyTwoUpdate'])->name('survey.two.company.update');
    Route::get('/encuesta/ubicacion/{user_id}', [CompanySurveyTwoController::class, 'CompanySurveyTwoVerifiedRoute'])->name('survey.two.company.verified');

    //Survey three
    Route::get('/encuesta/competencias', [CompanySurveyThreeController::class, 'CompanySurveyThreeView'])->name('survey.three.company.index');
    Route::post('/encuesta/competencias/guardar', [CompanySurveyThreeController::class, 'CompanySurveyThreeStore'])->name('survey.three.company.store');
    Route::get('/encuesta/competencias/editar/{user_id}', [CompanySurveyThreeController::class, 'CompanySurveyThreeEdit'])->name('survey.three.company.edit');
    Route::post('/encuesta/competencias/actualizar', [CompanySurveyThreeController::class, 'CompanySurveyThreeUpdate'])->name('survey.three.company.update');
    Route::get('/encuesta/competencias/{user_id}', [CompanySurveyThreeController::class, 'CompanySurveyThreeVerifiedRoute'])->name('survey.three.company.verified');
});
