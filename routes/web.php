<?php

use Illuminate\Support\Facades\Route;

/*****Controllers*****/
//Actor
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\users\AdminController;
use App\Http\Controllers\users\GraduateController;
use App\Http\Controllers\users\CompanyController;
//Survey
use App\Http\Controllers\backend\survey\graduate\SurveyOneController;
use App\Http\Controllers\backend\survey\graduate\SurveyTwoController;
use App\Http\Controllers\backend\survey\graduate\SurveyThreeController;
use App\Http\Controllers\backend\survey\graduate\SurveyFourController;
use App\Http\Controllers\backend\survey\graduate\SurveyFiveController;
use App\Http\Controllers\backend\survey\graduate\SurveySixController;
use App\Http\Controllers\backend\survey\graduate\SurveySevenController;
//Company Survey
use App\Http\Controllers\backend\survey\company\CompanySurveyOneController;
use App\Http\Controllers\backend\survey\company\CompanySurveyTwoController;
use App\Http\Controllers\backend\survey\company\CompanySurveyThreeController;
//Setup
use App\Http\Controllers\backend\configuration\CareerController;
use App\Http\Controllers\backend\configuration\SpecialtyController;
use App\Http\Controllers\backend\configuration\GraduateConfigurationController;
use App\Http\Controllers\backend\configuration\CompanyConfigurationController;
//Statistic
use App\Http\Controllers\backend\statistic\GraduateStatisticController;
use App\Http\Controllers\backend\statistic\CompanyStatisticController;
//Report
use App\Http\Controllers\backend\report\GraduateReportController;
use App\Http\Controllers\backend\report\CompanyReportController;
//Jobs
use App\Http\Controllers\backend\jobs\JobController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/nuevo', [GeneralController::class, 'password'])->name('new.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\GeneralController@index')->name('dashboard');

//Admin routes
Route::prefix('administrador')->group(function () {
    Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/perfil', [AdminController::class, 'profileView'])->name('admin.view');
    Route::get('/salir', [AdminController::class, 'logout'])->name('admin.logout');

    /*
    |--------------------------------------------------------------------------
    | Setup
    |--------------------------------------------------------------------------
    */

    //--------Career
    Route::get('/carrera', [CareerController::class, 'view'])->name('career.view');
    Route::get('/carrera/agregar', [CareerController::class, 'add'])->name('career.add');
    Route::post('/carrera/guardar', [CareerController::class, 'store'])->name('career.store');
    Route::get('/carrera/editar/{id}', [CareerController::class, 'edit'])->name('career.edit');
    Route::post('/carrera/actualizar', [CareerController::class, 'update'])->name('career.update');

    //--------Specialty
    Route::get('/especialidad', [SpecialtyController::class, 'view'])->name('specialty.view');
    Route::get('/especialidad/agregar', [SpecialtyController::class, 'add'])->name('specialty.add');
    Route::post('/especialidad/guardar', [SpecialtyController::class, 'store'])->name('specialty.store');
    Route::get('/especialidad/editar/{id}', [SpecialtyController::class, 'edit'])->name('specialty.edit');
    Route::post('/especialidad/actualizar', [SpecialtyController::class, 'update'])->name('specialty.update');

    //--------Gradute
    Route::get('/egresado/configuracion', [GraduateConfigurationController::class, 'view'])->name('graduate.configuration.view');
    Route::get('/egresado/configuracion/encuesta', [GraduateConfigurationController::class, 'graduateSurveyView'])->name('graduate.survey.view');
    Route::get('/egresado/configuracion/agregar', [GraduateConfigurationController::class, 'add'])->name('graduate.configuration.add');
    Route::post('/egresado/configuracion/guardar', [GraduateConfigurationController::class, 'store'])->name('graduate.configuration.store');
    Route::get('/egresado/configuracion/editar/{id}', [GraduateConfigurationController::class, 'edit'])->name('graduate.configuration.edit');
    Route::post('/egresado/configuracion/actualizar', [GraduateConfigurationController::class, 'update'])->name('graduate.configuration.update');

    //--------Company
    Route::get('/empresa', [CompanyConfigurationController::class, 'view'])->name('company.config.view');
    Route::get('/empresa/agregar', [CompanyConfigurationController::class, 'add'])->name('company.config.add');
    Route::post('/empresa/guardar', [CompanyConfigurationController::class, 'store'])->name('company.config.store');
    Route::get('/empresa/editar/{id}', [CompanyConfigurationController::class, 'edit'])->name('company.config.edit');
    Route::post('/empresa/actualizar', [CompanyConfigurationController::class, 'update'])->name('company.config.update');

    /*
    |--------------------------------------------------------------------------
    | Statistics
    |--------------------------------------------------------------------------
    */

    //--------Graduate
    Route::get('/estadistica/egresados/perfil', [GraduateStatisticController::class, 'surveyOneStatistic'])->name('survey.one.statistic.view');
    Route::get('/estadistica/egresados/pertinencia', [GraduateStatisticController::class, 'surveyTwoStatistic'])->name('survey.two.statistic.view');
    Route::get('/estadistica/egresados/ubicacion', [GraduateStatisticController::class, 'surveyThreeStatistic'])->name('survey.three.statistic.view');
    Route::get('/estadistica/egresados/desempeno', [GraduateStatisticController::class, 'surveyFourStatistic'])->name('survey.four.statistic.view');
    Route::get('/estadistica/egresados/expectativas', [GraduateStatisticController::class, 'surveyFiveStatistic'])->name('survey.five.statistic.view');
    Route::get('/estadistica/egresados/participacion', [GraduateStatisticController::class, 'surveySixStatistic'])->name('survey.six.statistic.view');

    //--------Company
    Route::get('/estadistica/empresa/datos', [CompanyStatisticController::class, 'companySurveyOneStatistic'])->name('company.survey.one.statistic.view');
    Route::get('/estadistica/empresa/ubicacion', [CompanyStatisticController::class, 'companySurveyTwoStatistic'])->name('company.survey.two.statistic.view');
    Route::get('/estadistica/empresa/competencias', [CompanyStatisticController::class, 'companySurveyThreeStatistic'])->name('company.survey.three.statistic.view');

    /*
    |--------------------------------------------------------------------------
    | Reports
    |--------------------------------------------------------------------------
    */

    //--------Graduate
    Route::get('/reporte/egresados/perfil', [GraduateReportController::class, 'surveyOneReport'])->name('survey.one.report.view');
    Route::get('/reporte/egresados/pertinencia', [GraduateReportController::class, 'surveyTwoReport'])->name('survey.two.report.view');
    Route::get('/reporte/egresados/ubicacion', [GraduateReportController::class, 'surveyThreeReport'])->name('survey.three.report.view');
    Route::get('/reporte/egresados/desempeno', [GraduateReportController::class, 'surveyFourReport'])->name('survey.four.report.view');
    Route::get('/reporte/egresados/expectativas', [GraduateReportController::class, 'surveyFiveReport'])->name('survey.five.report.view');
    Route::get('/reporte/egresados/participacion', [GraduateReportController::class, 'surveySixReport'])->name('survey.six.report.view');
    Route::get('/reporte/egresados/comentarios', [GraduateReportController::class, 'surveySevenReport'])->name('survey.seven.report.view');

    //--------Company
    Route::get('/reporte/empresa/datos', [CompanyReportController::class, 'surveyOneReport'])->name('company.survey.one.report.view');
    Route::get('/reporte/empresa/ubicacion', [CompanyReportController::class, 'surveyTwoReport'])->name('company.survey.two.report.view');
    Route::get('/reporte/empresa/competencias', [CompanyReportController::class, 'surveyThreeReport'])->name('company.survey.three.report.view');
});


//Graduates Routes
Route::prefix('egresado')->group(function () {
    Route::get('/registrar', [GeneralController::class, 'graduateRegister'])->name('graduate.register');
    Route::get('/index', [GraduateController::class, 'index'])->name('graduate.index');
    Route::get('/perfil', [GraduateController::class, 'profileView'])->name('graduate.view');
    Route::get('/pdf', [GraduateController::class, 'graduateProfilePdf'])->name('graduate.pdf');
    Route::post('/pdf/guardar', [GraduateController::class, 'graduateProfilePdfStore'])->name('graduate.pdf.store');
    Route::get('/salir', [GraduateController::class, 'logout'])->name('graduate.logout');

    /*
    |--------------------------------------------------------------------------
    | Survey
    |--------------------------------------------------------------------------
    */

    //--------Survey One
    Route::get('/encuesta/perfil', [SurveyOneController::class, 'surveyView'])->name('survey.one.index');
    Route::post('/encuesta/perfil/guardar', [SurveyOneController::class, 'surveyStore'])->name('survey.one.store');
    Route::get('/encuesta/perfil/editar', [SurveyOneController::class, 'surveyEdit'])->name('survey.one.edit');
    Route::post('/encuesta/perfil/actualizar', [SurveyOneController::class, 'surveyUpdate'])->name('survey.one.update');
    Route::get('/encuesta/perfil/verificar', [SurveyOneController::class, 'surveyVerifiedRoute'])->name('survey.one.verified');

    //--------Survey Two
    Route::get('/encuesta/pertinencia/', [SurveyTwoController::class, 'surveyView'])->name('survey.two.index');
    Route::post('/encuesta/pertinencia/guardar', [SurveyTwoController::class, 'surveyStore'])->name('survey.two.store');
    Route::get('/encuesta/pertinencia/editar', [SurveyTwoController::class, 'surveyEdit'])->name('survey.two.edit');
    Route::post('/encuesta/pertinencia/actualizar', [SurveyTwoController::class, 'surveyUpdate'])->name('survey.two.update');
    Route::get('/encuesta/pertinencia/verificar', [SurveyTwoController::class, 'surveyVerifiedRoute'])->name('survey.two.verified');

    //--------Survey Three
    Route::get('/encuesta/ubicacion', [SurveyThreeController::class, 'surveyView'])->name('survey.three.index');
    Route::post('/encuesta/ubicacion/guardar', [SurveyThreeController::class, 'surveyStore'])->name('survey.three.store');
    Route::get('/encuesta/ubicacion/editar', [SurveyThreeController::class, 'surveyEdit'])->name('survey.three.edit');
    Route::post('/encuesta/ubicacion/actualizar', [SurveyThreeController::class, 'surveyUpdate'])->name('survey.three.update');
    Route::get('/encuesta/ubicacion/verificar', [SurveyThreeController::class, 'surveyVerifiedRoute'])->name('survey.three.verified');

    //--------Survey Four
    Route::get('/encuesta/desempeno', [SurveyFourController::class, 'surveyView'])->name('survey.four.index');
    Route::post('/encuesta/desempeno/guardar', [SurveyFourController::class, 'surveyStore'])->name('survey.four.store');
    Route::get('/encuesta/desempeno/editar', [SurveyFourController::class, 'surveyEdit'])->name('survey.four.edit');
    Route::post('/encuesta/desempeno/actualizar', [SurveyFourController::class, 'surveyUpdate'])->name('survey.four.update');
    Route::get('/encuesta/desempeno/verificar', [SurveyFourController::class, 'surveyVerifiedRoute'])->name('survey.four.verified');

    //--------Survey Five
    Route::get('/encuesta/expectativas', [SurveyFiveController::class, 'surveyView'])->name('survey.five.index');
    Route::post('/encuesta/expectativas/guardar', [SurveyFiveController::class, 'surveyStore'])->name('survey.five.store');
    Route::get('/encuesta/expectativas/editar', [SurveyFiveController::class, 'surveyEdit'])->name('survey.five.edit');
    Route::post('/encuesta/expectativas/actualizar', [SurveyFiveController::class, 'surveyUpdate'])->name('survey.five.update');
    Route::get('/encuesta/expectativas/verificar', [SurveyFiveController::class, 'surveyVerifiedRoute'])->name('survey.five.verified');

    //--------Survey Six
    Route::get('/encuesta/partipacion', [SurveySixController::class, 'surveyView'])->name('survey.six.index');
    Route::post('/encuesta/partipacion/guardar', [SurveySixController::class, 'surveyStore'])->name('survey.six.store');
    Route::get('/encuesta/partipacion/editar', [SurveySixController::class, 'surveyEdit'])->name('survey.six.edit');
    Route::post('/encuesta/partipacion/actualizar', [SurveySixController::class, 'surveyUpdate'])->name('survey.six.update');
    Route::get('/encuesta/partipacion/verificar', [SurveySixController::class, 'surveyVerifiedRoute'])->name('survey.six.verified');

    //--------Survey Seven
    Route::get('/encuesta/comentarios', [SurveySevenController::class, 'surveyView'])->name('survey.seven.index');
    Route::post('/encuesta/comentarios/guardar', [SurveySevenController::class, 'surveyStore'])->name('survey.seven.store');
    Route::get('/encuesta/comentarios/editar', [SurveySevenController::class, 'surveyEdit'])->name('survey.seven.edit');
    Route::post('/encuesta/comentarios/actualizar', [SurveySevenController::class, 'surveyUpdate'])->name('survey.seven.update');
    Route::get('/encuesta/comentarios/verificar', [SurveySevenController::class, 'surveyVerifiedRoute'])->name('survey.seven.verified');

    /*
    |--------------------------------------------------------------------------
    | Job
    |--------------------------------------------------------------------------
    */

    //--------Job view
    Route::get('/trabajos/ofertas', [JobController::class, 'jobsList'])->name('jobs.view');
    Route::get('/trabajos/ofertas/postular/{id}', [JobController::class, 'jobPostulate'])->name('jobs.postulate');
});


//Company routes
Route::prefix('empresas')->group(function () {
    Route::get('/registrar', [GeneralController::class, 'companyRegister'])->name('company.register');
    Route::get('/index', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/perfil', [CompanyController::class, 'profileView'])->name('company.view');
    Route::get('/salir', [CompanyController::class, 'logout'])->name('company.logout');

    /*
    |--------------------------------------------------------------------------
    | Survey
    |--------------------------------------------------------------------------
    */

    //--------Survey One
    Route::get('/encuesta/datos', [CompanySurveyOneController::class, 'surveyView'])->name('survey.one.company.index');
    Route::post('/encuesta/datos/guardar', [CompanySurveyOneController::class, 'surveyStore'])->name('survey.one.company.store');
    Route::get('/encuesta/datos/editar', [CompanySurveyOneController::class, 'surveyEdit'])->name('survey.one.company.edit');
    Route::post('/encuesta/datos/actualizar', [CompanySurveyOneController::class, 'surveyUpdate'])->name('survey.one.company.update');
    Route::get('/encuesta/datos/verificar', [CompanySurveyOneController::class, 'surveyVerifiedRoute'])->name('survey.one.company.verified');

    //--------Survey Two
    Route::get('/encuesta/ubicacion', [CompanySurveyTwoController::class, 'surveyView'])->name('survey.two.company.index');
    Route::post('/encuesta/ubicacion/guardar', [CompanySurveyTwoController::class, 'surveyStore'])->name('survey.two.company.store');
    Route::get('/encuesta/ubicacion/editar', [CompanySurveyTwoController::class, 'surveyEdit'])->name('survey.two.company.edit');
    Route::post('/encuesta/ubicacion/actualizar', [CompanySurveyTwoController::class, 'surveyUpdate'])->name('survey.two.company.update');
    Route::get('/encuesta/ubicacion/verificar', [CompanySurveyTwoController::class, 'surveyVerifiedRoute'])->name('survey.two.company.verified');

    //--------Survey Three
    Route::get('/encuesta/competencias', [CompanySurveyThreeController::class, 'surveyView'])->name('survey.three.company.index');
    Route::post('/encuesta/competencias/guardar', [CompanySurveyThreeController::class, 'surveyStore'])->name('survey.three.company.store');
    Route::get('/encuesta/competencias/editar', [CompanySurveyThreeController::class, 'surveyEdit'])->name('survey.three.company.edit');
    Route::post('/encuesta/competencias/actualizar', [CompanySurveyThreeController::class, 'surveyUpdate'])->name('survey.three.company.update');
    Route::get('/encuesta/competencias/verificar', [CompanySurveyThreeController::class, 'surveyVerifiedRoute'])->name('survey.three.company.verified');


    /*
    |--------------------------------------------------------------------------
    | Job
    |--------------------------------------------------------------------------
    */

    //--------Job view
    Route::get('/trabajos', [JobController::class, 'jobsView'])->name('company.jobs.view');
    Route::get('/trabajos/agregar', [JobController::class, 'jobsAdd'])->name('company.jobs.add');
    Route::post('/trabajos/guardar', [JobController::class, 'jobsStore'])->name('company.jobs.store');
    Route::get('/trabajos/editar/{id}', [JobController::class, 'jobsEdit'])->name('company.jobs.edit');
    Route::post('/trabajos/actualizar/{id}', [JobController::class, 'jobsUpdate'])->name('company.jobs.update');
    Route::get('/trabajos/eliminar/{id}', [JobController::class, 'jobDelete'])->name('company.jobs.delete');
    Route::get('/trabajos/postulados', [JobController::class, 'postulateView'])->name('company.jobs.postulate');
});
