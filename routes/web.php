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
//Catalogue
use App\Http\Controllers\backend\catalogue\CareerController;
use App\Http\Controllers\backend\catalogue\SpecialtyController;
use App\Http\Controllers\backend\catalogue\LanguageController;
use App\Http\Controllers\backend\catalogue\BusinessController;
//Setup
use App\Http\Controllers\backend\configuration\GraduateConfigurationController;
use App\Http\Controllers\backend\configuration\CompanyConfigurationController;
use App\Http\Controllers\backend\configuration\UsersConfigurationController;
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
    | Catalogue
    |--------------------------------------------------------------------------
    */

    Route::prefix('catalogo')->group(function () {
        //--------Career
        Route::prefix('carrera')->group(function () {
            Route::get('/', [CareerController::class, 'view'])->name('career.view');
            Route::get('/agregar', [CareerController::class, 'add'])->name('career.add');
            Route::post('/guardar', [CareerController::class, 'store'])->name('career.store');
            Route::get('/editar/{id}', [CareerController::class, 'edit'])->name('career.edit');
            Route::get('/eliminar/{id}', [CareerController::class, 'delete'])->name('career.delete');
            Route::post('/actualizar', [CareerController::class, 'update'])->name('career.update');
        });

        //--------Specialty
        Route::prefix('especialidad')->group(function () {
            Route::get('/', [SpecialtyController::class, 'view'])->name('specialty.view');
            Route::get('/agregar', [SpecialtyController::class, 'add'])->name('specialty.add');
            Route::post('/guardar', [SpecialtyController::class, 'store'])->name('specialty.store');
            Route::get('/editar/{id}', [SpecialtyController::class, 'edit'])->name('specialty.edit');
            Route::get('/eliminar/{id}', [SpecialtyController::class, 'delete'])->name('specialty.delete');
            Route::post('/actualizar', [SpecialtyController::class, 'update'])->name('specialty.update');
        });

        //--------Language
        Route::prefix('lenguaje')->group(function () {
            Route::get('/', [LanguageController::class, 'view'])->name('language.view');
            Route::get('/agregar', [LanguageController::class, 'add'])->name('language.add');
            Route::post('/guardar', [LanguageController::class, 'store'])->name('language.store');
            Route::get('/editar/{id}', [LanguageController::class, 'edit'])->name('language.edit');
            Route::get('/eliminar/{id}', [LanguageController::class, 'delete'])->name('language.delete');
            Route::post('/actualizar', [LanguageController::class, 'update'])->name('language.update');
        });

        //--------Business Activity
        Route::prefix('actividad')->group(function () {
            Route::get('/', [BusinessController::class, 'view'])->name('business.view');
            Route::get('/agregar', [BusinessController::class, 'add'])->name('business.add');
            Route::post('/guardar', [BusinessController::class, 'store'])->name('business.store');
            Route::get('/editar/{id}', [BusinessController::class, 'edit'])->name('business.edit');
            Route::get('/eliminar/{id}', [BusinessController::class, 'delete'])->name('business.delete');
            Route::post('/actualizar', [BusinessController::class, 'update'])->name('business.update');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Setup
    |--------------------------------------------------------------------------
    */

    Route::prefix('configuracion')->group(function () {
        //--------Gradute
        Route::prefix('egresado')->group(function () {
            Route::get('/', [GraduateConfigurationController::class, 'view'])->name('graduate.configuration.view');
            Route::get('/encuesta', [GraduateConfigurationController::class, 'graduateSurveyView'])->name('graduate.survey.view');
            Route::get('/agregar', [GraduateConfigurationController::class, 'add'])->name('graduate.configuration.add');
            Route::post('/guardar', [GraduateConfigurationController::class, 'store'])->name('graduate.configuration.store');
            Route::get('/editar/{id}', [GraduateConfigurationController::class, 'edit'])->name('graduate.configuration.edit');
            Route::get('/eliminar/{id}', [GraduateConfigurationController::class, 'delete'])->name('graduate.configuration.delete');
            Route::post('/actualizar', [GraduateConfigurationController::class, 'update'])->name('graduate.configuration.update');
        });

        //--------Company
        Route::prefix('empresa')->group(function () {
            Route::get('/', [CompanyConfigurationController::class, 'view'])->name('company.config.view');
            Route::get('/agregar', [CompanyConfigurationController::class, 'add'])->name('company.config.add');
            Route::post('/guardar', [CompanyConfigurationController::class, 'store'])->name('company.config.store');
            Route::get('/editar/{id}', [CompanyConfigurationController::class, 'edit'])->name('company.config.edit');
            Route::get('/eliminar/{id}', [CompanyConfigurationController::class, 'delete'])->name('company.config.delete');
            Route::post('/actualizar', [CompanyConfigurationController::class, 'update'])->name('company.config.update');
        });

        //--------Users
        Route::prefix('usuario')->group(function () {
            Route::get('/', [UsersConfigurationController::class, 'view'])->name('users.configuration.view');
            Route::get('/agregar', [UsersConfigurationController::class, 'add'])->name('users.configuration.add');
            Route::post('/guardar', [UsersConfigurationController::class, 'store'])->name('users.configuration.store');
            Route::get('/editar/{id}', [UsersConfigurationController::class, 'edit'])->name('users.configuration.edit');
            Route::get('/eliminar/{id}', [UsersConfigurationController::class, 'delete'])->name('users.configuration.delete');
            Route::post('/actualizar', [UsersConfigurationController::class, 'update'])->name('users.configuration.update');
        });        
    });

    /*
    |--------------------------------------------------------------------------
    | Statistics
    |--------------------------------------------------------------------------
    */

    Route::prefix('estadistica')->group(function () {
        //--------Graduate
        Route::prefix('egresado')->group(function () {
            Route::get('/perfil', [GraduateStatisticController::class, 'surveyOneStatistic'])->name('survey.one.statistic.view');
            Route::get('/pertinencia', [GraduateStatisticController::class, 'surveyTwoStatistic'])->name('survey.two.statistic.view');
            Route::get('/ubicacion', [GraduateStatisticController::class, 'surveyThreeStatistic'])->name('survey.three.statistic.view');
            Route::get('/desempeno', [GraduateStatisticController::class, 'surveyFourStatistic'])->name('survey.four.statistic.view');
            Route::get('/expectativas', [GraduateStatisticController::class, 'surveyFiveStatistic'])->name('survey.five.statistic.view');
            Route::get('/participacion', [GraduateStatisticController::class, 'surveySixStatistic'])->name('survey.six.statistic.view');
        });

        //--------Company
        Route::prefix('empresa')->group(function () {
            Route::get('/datos', [CompanyStatisticController::class, 'companySurveyOneStatistic'])->name('company.survey.one.statistic.view');
            Route::get('/ubicacion', [CompanyStatisticController::class, 'companySurveyTwoStatistic'])->name('company.survey.two.statistic.view');
            Route::get('/competencias', [CompanyStatisticController::class, 'companySurveyThreeStatistic'])->name('company.survey.three.statistic.view');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Reports
    |--------------------------------------------------------------------------
    */

    Route::prefix('reporte')->group(function () {
        //--------Graduate
        Route::prefix('egresado')->group(function () {
            Route::get('/perfil', [GraduateReportController::class, 'surveyOneReport'])->name('survey.one.report.view');
            Route::get('/pertinencia', [GraduateReportController::class, 'surveyTwoReport'])->name('survey.two.report.view');
            Route::get('/ubicacion', [GraduateReportController::class, 'surveyThreeReport'])->name('survey.three.report.view');
            Route::get('/desempeno', [GraduateReportController::class, 'surveyFourReport'])->name('survey.four.report.view');
            Route::get('/expectativas', [GraduateReportController::class, 'surveyFiveReport'])->name('survey.five.report.view');
            Route::get('/participacion', [GraduateReportController::class, 'surveySixReport'])->name('survey.six.report.view');
            Route::get('/comentarios', [GraduateReportController::class, 'surveySevenReport'])->name('survey.seven.report.view');
        });

        //--------Company
        Route::prefix('empresa')->group(function () {
            Route::get('/datos', [CompanyReportController::class, 'surveyOneReport'])->name('company.survey.one.report.view');
            Route::get('/ubicacion', [CompanyReportController::class, 'surveyTwoReport'])->name('company.survey.two.report.view');
            Route::get('/egresados_trabajando', [CompanyReportController::class, 'surveyTwoReportGraduate'])->name('company.survey.two.graduates.report.view');
            Route::get('/competencias', [CompanyReportController::class, 'surveyThreeReport'])->name('company.survey.three.report.view');
        });
    });
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

    Route::prefix('encuesta')->group(function () {
        //--------Survey One
        Route::prefix('perfil')->group(function () {
            Route::get('/', [SurveyOneController::class, 'surveyView'])->name('survey.one.index');
            Route::post('/guardar', [SurveyOneController::class, 'surveyStore'])->name('survey.one.store');
            Route::get('/editar', [SurveyOneController::class, 'surveyEdit'])->name('survey.one.edit');
            Route::post('/actualizar', [SurveyOneController::class, 'surveyUpdate'])->name('survey.one.update');
            Route::get('/verificar', [SurveyOneController::class, 'surveyVerifiedRoute'])->name('survey.one.verified');
        });

        //--------Survey Two
        Route::prefix('pertinencia')->group(function () {
            Route::get('/', [SurveyTwoController::class, 'surveyView'])->name('survey.two.index');
            Route::post('/guardar', [SurveyTwoController::class, 'surveyStore'])->name('survey.two.store');
            Route::get('/editar', [SurveyTwoController::class, 'surveyEdit'])->name('survey.two.edit');
            Route::post('/actualizar', [SurveyTwoController::class, 'surveyUpdate'])->name('survey.two.update');
            Route::get('/verificar', [SurveyTwoController::class, 'surveyVerifiedRoute'])->name('survey.two.verified');
        });

        //--------Survey Three
        Route::prefix('ubicacion')->group(function () {
            Route::get('/', [SurveyThreeController::class, 'surveyView'])->name('survey.three.index');
            Route::post('/guardar', [SurveyThreeController::class, 'surveyStore'])->name('survey.three.store');
            Route::get('/editar', [SurveyThreeController::class, 'surveyEdit'])->name('survey.three.edit');
            Route::post('/actualizar', [SurveyThreeController::class, 'surveyUpdate'])->name('survey.three.update');
            Route::get('/verificar', [SurveyThreeController::class, 'surveyVerifiedRoute'])->name('survey.three.verified');
        });

        //--------Survey Four
        Route::prefix('desempeno')->group(function () {
            Route::get('/', [SurveyFourController::class, 'surveyView'])->name('survey.four.index');
            Route::post('/guardar', [SurveyFourController::class, 'surveyStore'])->name('survey.four.store');
            Route::get('/editar', [SurveyFourController::class, 'surveyEdit'])->name('survey.four.edit');
            Route::post('/actualizar', [SurveyFourController::class, 'surveyUpdate'])->name('survey.four.update');
            Route::get('/verificar', [SurveyFourController::class, 'surveyVerifiedRoute'])->name('survey.four.verified');
        });

        //--------Survey Five
        Route::prefix('expectativas')->group(function () {
            Route::get('/', [SurveyFiveController::class, 'surveyView'])->name('survey.five.index');
            Route::post('/guardar', [SurveyFiveController::class, 'surveyStore'])->name('survey.five.store');
            Route::get('/editar', [SurveyFiveController::class, 'surveyEdit'])->name('survey.five.edit');
            Route::post('/actualizar', [SurveyFiveController::class, 'surveyUpdate'])->name('survey.five.update');
            Route::get('/encuesta/expectativas/verificar', [SurveyFiveController::class, 'surveyVerifiedRoute'])->name('survey.five.verified');
        });

        //--------Survey Six
        Route::prefix('partipacion')->group(function () {
            Route::get('/', [SurveySixController::class, 'surveyView'])->name('survey.six.index');
            Route::post('/guardar', [SurveySixController::class, 'surveyStore'])->name('survey.six.store');
            Route::get('/editar', [SurveySixController::class, 'surveyEdit'])->name('survey.six.edit');
            Route::post('/actualizar', [SurveySixController::class, 'surveyUpdate'])->name('survey.six.update');
            Route::get('/verificar', [SurveySixController::class, 'surveyVerifiedRoute'])->name('survey.six.verified');
        });

        //--------Survey Seven
        Route::prefix('comentarios')->group(function () {
            Route::get('/', [SurveySevenController::class, 'surveyView'])->name('survey.seven.index');
            Route::post('/guardar', [SurveySevenController::class, 'surveyStore'])->name('survey.seven.store');
            Route::get('/editar', [SurveySevenController::class, 'surveyEdit'])->name('survey.seven.edit');
            Route::post('/actualizar', [SurveySevenController::class, 'surveyUpdate'])->name('survey.seven.update');
            Route::get('/verificar', [SurveySevenController::class, 'surveyVerifiedRoute'])->name('survey.seven.verified');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Job
    |--------------------------------------------------------------------------
    */

    //--------Job view
    Route::prefix('trabajo')->group(function () {
        Route::get('/ofertas', [JobController::class, 'jobsList'])->name('jobs.view');
        Route::get('/ofertas/postular/{id}', [JobController::class, 'jobPostulate'])->name('jobs.postulate');
    });
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

    Route::prefix('encuesta')->group(function () {
        //--------Survey One
        Route::prefix('datos')->group(function () {
            Route::get('/', [CompanySurveyOneController::class, 'surveyView'])->name('survey.one.company.index');
            Route::post('/guardar', [CompanySurveyOneController::class, 'surveyStore'])->name('survey.one.company.store');
            Route::get('/editar', [CompanySurveyOneController::class, 'surveyEdit'])->name('survey.one.company.edit');
            Route::post('/actualizar', [CompanySurveyOneController::class, 'surveyUpdate'])->name('survey.one.company.update');
            Route::get('/verificar', [CompanySurveyOneController::class, 'surveyVerifiedRoute'])->name('survey.one.company.verified');
        });

        //--------Survey Two
        Route::prefix('ubicacion')->group(function () {
            Route::get('/', [CompanySurveyTwoController::class, 'surveyView'])->name('survey.two.company.index');
            Route::post('/guardar', [CompanySurveyTwoController::class, 'surveyStore'])->name('survey.two.company.store');
            Route::get('/editar', [CompanySurveyTwoController::class, 'surveyEdit'])->name('survey.two.company.edit');
            Route::post('/actualizar', [CompanySurveyTwoController::class, 'surveyUpdate'])->name('survey.two.company.update');
            Route::get('/verificar', [CompanySurveyTwoController::class, 'surveyVerifiedRoute'])->name('survey.two.company.verified');
        });

        //--------Survey Three
        Route::prefix('competencias')->group(function () {
            Route::get('/', [CompanySurveyThreeController::class, 'surveyView'])->name('survey.three.company.index');
            Route::post('/guardar', [CompanySurveyThreeController::class, 'surveyStore'])->name('survey.three.company.store');
            Route::get('/editar', [CompanySurveyThreeController::class, 'surveyEdit'])->name('survey.three.company.edit');
            Route::post('/actualizar', [CompanySurveyThreeController::class, 'surveyUpdate'])->name('survey.three.company.update');
            Route::get('/verificar', [CompanySurveyThreeController::class, 'surveyVerifiedRoute'])->name('survey.three.company.verified');
        });
    });



    /*
    |--------------------------------------------------------------------------
    | Job
    |--------------------------------------------------------------------------
    */

    //--------Job view
    Route::prefix('trabajo')->group(function () {
        Route::get('/', [JobController::class, 'jobsView'])->name('company.jobs.view');
        Route::get('/agregar', [JobController::class, 'jobsAdd'])->name('company.jobs.add');
        Route::post('/guardar', [JobController::class, 'jobsStore'])->name('company.jobs.store');
        Route::get('/editar/{id}', [JobController::class, 'jobsEdit'])->name('company.jobs.edit');
        Route::post('/actualizar/{id}', [JobController::class, 'jobsUpdate'])->name('company.jobs.update');
        Route::get('/eliminar/{id}', [JobController::class, 'jobDelete'])->name('company.jobs.delete');
        Route::get('/postulados', [JobController::class, 'postulateView'])->name('company.jobs.postulate');
    });
});
