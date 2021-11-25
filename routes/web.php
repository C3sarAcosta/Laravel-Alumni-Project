<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*****Controllers*****/
//Actor
use App\Http\Controllers\UserController;
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
//Setup
use App\Http\Controllers\backend\configuration\CareerController;
use App\Http\Controllers\backend\configuration\SpecialtyController;
use App\Http\Controllers\backend\configuration\GraduateController;
use App\Http\Controllers\backend\configuration\CompanyConfigurationController;
//Statistic
use App\Http\Controllers\backend\statistic\GraduateStatisticController;
use App\Http\Controllers\backend\statistic\CompanyStatisticController;
//Report
use App\Http\Controllers\backend\report\GraduateReportController;
use App\Http\Controllers\backend\report\CompanyReportController;
//Jobs
use App\Http\Controllers\backend\jobs\JobController;

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


Route::get('/nuevo', [UserController::class, 'password'])->name('new.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\UserController@index')->name('dashboard');

//Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/index', [AdminController::class, 'AdminIndexView'])->name('admin.index');
    Route::get('/perfil', [AdminController::class, 'AdminProfileView'])->name('admin.view');
    Route::get('/salir', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    /*
    |--------------------------------------------------------------------------
    | Setup
    |--------------------------------------------------------------------------
    */

    //--------Career
    Route::get('/carrera', [CareerController::class, 'CareerView'])->name('career.view');
    Route::get('/carrera/agregar', [CareerController::class, 'CareerAdd'])->name('career.add');
    Route::post('/carrera/guardar', [CareerController::class, 'CareerStore'])->name('career.store');
    Route::get('/carrera/editar/{id}', [CareerController::class, 'CareerEdit'])->name('career.edit');
    Route::post('/carrera/actualizar/{id}', [CareerController::class, 'CareerUpdate'])->name('career.update');

    //--------Specialty
    Route::get('/especialidad', [SpecialtyController::class, 'SpecialtyView'])->name('specialty.view');
    Route::get('/especialidad/agregar', [SpecialtyController::class, 'SpecialtyAdd'])->name('specialty.add');
    Route::post('/especialidad/guardar', [SpecialtyController::class, 'SpecialtyStore'])->name('specialty.store');
    Route::get('/especialidad/editar/{id}', [SpecialtyController::class, 'SpecialtyEdit'])->name('specialty.edit');
    Route::post('/especialidad/actualizar/{id}', [SpecialtyController::class, 'SpecialtyUpdate'])->name('specialty.update');

    //--------Gradute
    Route::get('/egresado', [GraduateController::class, 'GraduateView'])->name('graduate.view');
    Route::get('/egresado/encuesta', [GraduateController::class, 'GraduateSurveyView'])->name('graduate.survey.view');
    Route::get('/egresado/agregar', [GraduateController::class, 'GraduateAdd'])->name('graduate.add');
    Route::post('/egresado/guardar', [GraduateController::class, 'GraduateStore'])->name('graduate.store');
    Route::get('/egresado/editar/{id}', [GraduateController::class, 'GraduateEdit'])->name('graduate.edit');
    Route::post('/egresado/actualizar/{id}', [GraduateController::class, 'GraduateUpdate'])->name('graduate.update');

    //--------Company
    Route::get('/empresa', [CompanyConfigurationController::class, 'CompanyView'])->name('company.config.view');
    Route::get('/empresa/agregar', [CompanyConfigurationController::class, 'CompanyAdd'])->name('company.config.add');
    Route::post('/empresa/guardar', [CompanyConfigurationController::class, 'CompanyStore'])->name('company.config.store');
    Route::get('/empresa/editar/{id}', [CompanyConfigurationController::class, 'CompanyEdit'])->name('company.config.edit');
    Route::post('/empresa/actualizar/{id}', [CompanyConfigurationController::class, 'CompanyUpdate'])->name('company.config.update');

    /*
    |--------------------------------------------------------------------------
    | Statistics
    |--------------------------------------------------------------------------
    */

    //--------Graduate
    Route::get('/estadistica/egresados/perfil', [GraduateStatisticController::class, 'SurveyOneStatistic'])->name('survey.one.statistic.view');
    Route::get('/estadistica/egresados/pertinencia', [GraduateStatisticController::class, 'SurveyTwoStatistic'])->name('survey.two.statistic.view');
    Route::get('/estadistica/egresados/ubicacion', [GraduateStatisticController::class, 'SurveyThreeStatistic'])->name('survey.three.statistic.view');
    Route::get('/estadistica/egresados/desempeno', [GraduateStatisticController::class, 'SurveyFourStatistic'])->name('survey.four.statistic.view');
    Route::get('/estadistica/egresados/expectativas', [GraduateStatisticController::class, 'SurveyFiveStatistic'])->name('survey.five.statistic.view');
    Route::get('/estadistica/egresados/participacion', [GraduateStatisticController::class, 'SurveySixStatistic'])->name('survey.six.statistic.view');

    //--------Company
    Route::get('/estadistica/empresa/datos', [CompanyStatisticController::class, 'CompanySurveyOneStatistic'])->name('company.survey.one.statistic.view');
    Route::get('/estadistica/empresa/ubicacion', [CompanyStatisticController::class, 'CompanySurveyTwoStatistic'])->name('company.survey.two.statistic.view');
    Route::get('/estadistica/empresa/competencias', [CompanyStatisticController::class, 'CompanySurveyThreeStatistic'])->name('company.survey.three.statistic.view');

    /*
    |--------------------------------------------------------------------------
    | Reports
    |--------------------------------------------------------------------------
    */

    //--------Graduate
    Route::get('/reporte/egresados/perfil', [GraduateReportController::class, 'SurveyOneReport'])->name('survey.one.report.view');
    Route::get('/reporte/egresados/pertinencia', [GraduateReportController::class, 'SurveyTwoReport'])->name('survey.two.report.view');
    Route::get('/reporte/egresados/ubicacion', [GraduateReportController::class, 'SurveyThreeReport'])->name('survey.three.report.view');
    Route::get('/reporte/egresados/desempeno', [GraduateReportController::class, 'SurveyFourReport'])->name('survey.four.report.view');
    Route::get('/reporte/egresados/expectativas', [GraduateReportController::class, 'SurveyFiveReport'])->name('survey.five.report.view');
    Route::get('/reporte/egresados/participacion', [GraduateReportController::class, 'SurveySixReport'])->name('survey.six.report.view');
    Route::get('/reporte/egresados/comentarios', [GraduateReportController::class, 'SurveySevenReport'])->name('survey.seven.report.view');

    //--------Company
    Route::get('/reporte/empresa/datos', [CompanyReportController::class, 'SurveyOneReport'])->name('company.survey.one.report.view');
    Route::get('/reporte/empresa/ubicacion', [CompanyReportController::class, 'SurveyTwoReport'])->name('company.survey.two.report.view');
    Route::get('/reporte/empresa/competencias', [CompanyReportController::class, 'SurveyThreeReport'])->name('company.survey.three.report.view');
});


//Student Routes
Route::prefix('egresado')->group(function () {
    Route::get('/registrar', [UserController::class, 'GradutateRegister'])->name('graduate.register');
    Route::get('/index/{user_id}', [StudentController::class, 'StudentIndexView'])->name('student.index');
    Route::get('/perfil', [StudentController::class, 'StudentProfileView'])->name('student.view');
    Route::get('/pdf', [StudentController::class, 'StudentProfilePdf'])->name('student.pdf');
    Route::post('/pdf/guardar', [StudentController::class, 'StudentProfilePdfStore'])->name('student.pdf.store');
    Route::get('/salir', [StudentController::class, 'StudentLogout'])->name('student.logout');

    /*
    |--------------------------------------------------------------------------
    | Survey
    |--------------------------------------------------------------------------
    */

    //--------Survey One
    Route::get('/encuesta/perfil', [SurveyOneController::class, 'SurveyOneView'])->name('survey.one.index');
    Route::post('/encuesta/perfil/guardar', [SurveyOneController::class, 'SurveyOneStore'])->name('survey.one.store');
    Route::get('/encuesta/perfil/editar/{user_id}', [SurveyOneController::class, 'SurveyOneEdit'])->name('survey.one.edit');
    Route::post('/encuesta/perfil/actualizar', [SurveyOneController::class, 'SurveyOneUpdate'])->name('survey.one.update');
    Route::get('/encuesta/perfil/{user_id}', [SurveyOneController::class, 'SurveyOneVerifiedRoute'])->name('survey.one.verified');

    //--------Survey Two
    Route::get('/encuesta/pertinencia/', [SurveyTwoController::class, 'SurveyTwoView'])->name('survey.two.index');
    Route::post('/encuesta/pertinencia/guardar', [SurveyTwoController::class, 'SurveyTwoStore'])->name('survey.two.store');
    Route::get('/encuesta/pertinencia/editar/{user_id}', [SurveyTwoController::class, 'SurveyTwoEdit'])->name('survey.two.edit');
    Route::post('/encuesta/pertinencia/actualizar', [SurveyTwoController::class, 'SurveyTwoUpdate'])->name('survey.two.update');
    Route::get('/encuesta/pertinencia/{user_id}', [SurveyTwoController::class, 'SurveyTwoVerifiedRoute'])->name('survey.two.verified');

    //--------Survey Three
    Route::get('/encuesta/ubicacion', [SurveyThreeController::class, 'SurveyThreeView'])->name('survey.three.index');
    Route::post('/encuesta/ubicacion/guardar', [SurveyThreeController::class, 'SurveyThreeStore'])->name('survey.three.store');
    Route::get('/encuesta/ubicacion/editar/{user_id}', [SurveyThreeController::class, 'SurveyThreeEdit'])->name('survey.three.edit');
    Route::post('/encuesta/ubicacion/actualizar', [SurveyThreeController::class, 'SurveyThreeUpdate'])->name('survey.three.update');
    Route::get('/encuesta/ubicacion/{user_id}', [SurveyThreeController::class, 'SurveyThreeVerifiedRoute'])->name('survey.three.verified');

    //--------Survey Four
    Route::get('/encuesta/desempeno', [SurveyFourController::class, 'SurveyFourView'])->name('survey.four.index');
    Route::post('/encuesta/desempeno/guardar', [SurveyFourController::class, 'SurveyFourStore'])->name('survey.four.store');
    Route::get('/encuesta/desempeno/editar/{user_id}', [SurveyFourController::class, 'SurveyFourEdit'])->name('survey.four.edit');
    Route::post('/encuesta/desempeno/actualizar', [SurveyFourController::class, 'SurveyFourUpdate'])->name('survey.four.update');
    Route::get('/encuesta/desempeno/{user_id}', [SurveyFourController::class, 'SurveyFourVerifiedRoute'])->name('survey.four.verified');

    //--------Survey Five
    Route::get('/encuesta/expectativas', [SurveyFiveController::class, 'SurveyFiveView'])->name('survey.five.index');
    Route::post('/encuesta/expectativas/guardar', [SurveyFiveController::class, 'SurveyFiveStore'])->name('survey.five.store');
    Route::get('/encuesta/expectativas/editar/{user_id}', [SurveyFiveController::class, 'SurveyFiveEdit'])->name('survey.five.edit');
    Route::post('/encuesta/expectativas/actualizar', [SurveyFiveController::class, 'SurveyFiveUpdate'])->name('survey.five.update');
    Route::get('/encuesta/expectativas/{user_id}', [SurveyFiveController::class, 'SurveyFiveVerifiedRoute'])->name('survey.five.verified');

    //--------Survey Six
    Route::get('/encuesta/partipacion', [SurveySixController::class, 'SurveySixView'])->name('survey.six.index');
    Route::post('/encuesta/partipacion/guardar', [SurveySixController::class, 'SurveySixStore'])->name('survey.six.store');
    Route::get('/encuesta/partipacion/editar/{user_id}', [SurveySixController::class, 'SurveySixEdit'])->name('survey.six.edit');
    Route::post('/encuesta/partipacion/actualizar', [SurveySixController::class, 'SurveySixUpdate'])->name('survey.six.update');
    Route::get('/encuesta/partipacion/{user_id}', [SurveySixController::class, 'SurveySixVerifiedRoute'])->name('survey.six.verified');

    //--------Survey Seven
    Route::get('/encuesta/comentarios', [SurveySevenController::class, 'SurveySevenView'])->name('survey.seven.index');
    Route::post('/encuesta/comentarios/guardar', [SurveySevenController::class, 'SurveySevenStore'])->name('survey.seven.store');
    Route::get('/encuesta/comentarios/editar/{user_id}', [SurveySevenController::class, 'SurveySevenEdit'])->name('survey.seven.edit');
    Route::post('/encuesta/comentarios/actualizar', [SurveySevenController::class, 'SurveySevenUpdate'])->name('survey.seven.update');
    Route::get('/encuesta/comentarios/{user_id}', [SurveySevenController::class, 'SurveySevenVerifiedRoute'])->name('survey.seven.verified');

    /*
    |--------------------------------------------------------------------------
    | Job
    |--------------------------------------------------------------------------
    */

    //--------Job view
    Route::get('/trabajos/ofertas', [JobController::class, 'JobsList'])->name('jobs.view');
    Route::get('/trabajos/ofertas/postular/{id}', [JobController::class, 'JobPostulate'])->name('jobs.postulate');
});


//Company routes
Route::prefix('empresas')->group(function () {
    Route::get('/registrar', [CompanyController::class, 'CompanyRegister'])->name('company.register');
    Route::get('/index/{user_id}', [CompanyController::class, 'CompanyIndexView'])->name('company.index');
    Route::get('/perfil', [CompanyController::class, 'CompanyProfileView'])->name('company.view');
    Route::get('/salir', [CompanyController::class, 'CompanyLogout'])->name('company.logout');

    /*
    |--------------------------------------------------------------------------
    | Survey
    |--------------------------------------------------------------------------
    */

    //--------Survey One
    Route::get('/encuesta/datos', [CompanySurveyOneController::class, 'CompanySurveyOneView'])->name('survey.one.company.index');
    Route::post('/encuesta/datos/guardar', [CompanySurveyOneController::class, 'CompanySurveyOneStore'])->name('survey.one.company.store');
    Route::get('/encuesta/datos/editar/{user_id}', [CompanySurveyOneController::class, 'CompanySurveyOneEdit'])->name('survey.one.company.edit');
    Route::post('/encuesta/datos/actualizar', [CompanySurveyOneController::class, 'CompanySurveyOneUpdate'])->name('survey.one.company.update');
    Route::get('/encuesta/datos/{user_id}', [CompanySurveyOneController::class, 'CompanySurveyOneVerifiedRoute'])->name('survey.one.company.verified');

    //--------Survey Two
    Route::get('/encuesta/ubicacion', [CompanySurveyTwoController::class, 'CompanySurveyTwoView'])->name('survey.two.company.index');
    Route::post('/encuesta/ubicacion/guardar', [CompanySurveyTwoController::class, 'CompanySurveyTwoStore'])->name('survey.two.company.store');
    Route::get('/encuesta/ubicacion/editar/{user_id}', [CompanySurveyTwoController::class, 'CompanySurveyTwoEdit'])->name('survey.two.company.edit');
    Route::post('/encuesta/ubicacion/actualizar', [CompanySurveyTwoController::class, 'CompanySurveyTwoUpdate'])->name('survey.two.company.update');
    Route::get('/encuesta/ubicacion/{user_id}', [CompanySurveyTwoController::class, 'CompanySurveyTwoVerifiedRoute'])->name('survey.two.company.verified');

    //--------Survey Three
    Route::get('/encuesta/competencias', [CompanySurveyThreeController::class, 'CompanySurveyThreeView'])->name('survey.three.company.index');
    Route::post('/encuesta/competencias/guardar', [CompanySurveyThreeController::class, 'CompanySurveyThreeStore'])->name('survey.three.company.store');
    Route::get('/encuesta/competencias/editar/{user_id}', [CompanySurveyThreeController::class, 'CompanySurveyThreeEdit'])->name('survey.three.company.edit');
    Route::post('/encuesta/competencias/actualizar', [CompanySurveyThreeController::class, 'CompanySurveyThreeUpdate'])->name('survey.three.company.update');
    Route::get('/encuesta/competencias/{user_id}', [CompanySurveyThreeController::class, 'CompanySurveyThreeVerifiedRoute'])->name('survey.three.company.verified');


    /*
    |--------------------------------------------------------------------------
    | Job
    |--------------------------------------------------------------------------
    */

    //--------Job view
    Route::get('/trabajos', [JobController::class, 'JobsView'])->name('company.jobs.view');
    Route::get('/trabajos/agregar', [JobController::class, 'JobsAdd'])->name('company.jobs.add');
    Route::post('/trabajos/guardar', [JobController::class, 'JobsStore'])->name('company.jobs.store');
    Route::get('/trabajos/editar/{id}', [JobController::class, 'JobsEdit'])->name('company.jobs.edit');
    Route::post('/trabajos/actualizar/{id}', [JobController::class, 'JobsUpdate'])->name('company.jobs.update');
    Route::get('/trabajos/eliminar/{id}', [JobController::class, 'JobDelete'])->name('company.jobs.delete');
    Route::get('/trabajos/postulados', [JobController::class, 'PostulateView'])->name('company.jobs.postulate');
});
