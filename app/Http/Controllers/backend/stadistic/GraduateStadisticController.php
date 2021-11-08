<?php

namespace App\Http\Controllers\backend\stadistic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SurveyOne;
use App\Models\SurveyTwo;
use App\Models\SurveyThree;
use App\Models\SurveyFour;
use App\Models\SurveyFive;
use App\Models\SurveySix;
use App\Models\SurveySeven;

class GraduateStadisticController extends Controller
{
    public function SurveyOneStadistic()
    {
        $data['sex'] = SurveyOne::groupBy('sex')->selectRaw('count(*) as total, sex')->get();
        $data['marital_status'] = SurveyOne::groupBy('marital_status')->selectRaw('count(*) as total, marital_status')->get();
        $data['state'] = SurveyOne::groupBy('state')->selectRaw('count(*) as total, state')->get();
        $data['career'] = SurveyOne::groupBy('career')->selectRaw('count(*) as total, career')->get();
        $data['specialty'] = SurveyOne::groupBy('specialty')->selectRaw('count(*) as total, specialty')->get();
        $data['qualified'] = SurveyOne::groupBy('qualified')->selectRaw('count(*) as total, qualified')->get();
        $data['month'] = SurveyOne::groupBy('month')->selectRaw('count(*) as total, month')->get();
        $data['year'] = SurveyOne::groupBy('year')->selectRaw('count(*) as total, year')->get();
        $data['percent_english'] = SurveyOne::groupBy('percent_english')->selectRaw('count(*) as total, percent_english')->get();
        $data['another_language'] = SurveyOne::groupBy('another_language')->selectRaw('count(*) as total, another_language')->get();

        return view('backend.stadistics.graduate.survey_one', $data);
    }

    public function SurveyTwoStadistic()
    {
        $data['quality_teachers'] = SurveyTwo::groupBy('quality_teachers')->selectRaw('count(*) as total, quality_teachers')->get();
        $data['syllabus'] = SurveyTwo::groupBy('syllabus')->selectRaw('count(*) as total, syllabus')->get();
        $data['study_condition'] = SurveyTwo::groupBy('study_condition')->selectRaw('count(*) as total, study_condition')->get();
        $data['experience'] = SurveyTwo::groupBy('experience')->selectRaw('count(*) as total, experience')->get();
        $data['study_emphasis'] = SurveyTwo::groupBy('study_emphasis')->selectRaw('count(*) as total, study_emphasis')->get();
        $data['participate_projects'] = SurveyTwo::groupBy('participate_projects')->selectRaw('count(*) as total, participate_projects')->get();
        return view('backend.stadistics.graduate.survey_two', $data);
    }

    public function SurveyThreeStadistic()
    {
        $data['do_for_living'] = SurveyThree::groupBy('do_for_living')->selectRaw('count(*) as total, do_for_living')->get();
        $data['speciality'] = SurveyThree::where('do_for_living', '=', 'ESTUDIA Y TRABAJA')
            ->orWhere('do_for_living', '=', 'ESTUDIA')
            ->groupBy('speciality')->selectRaw('count(*) as total, speciality')->get();
        $data['long_take_job'] = SurveyThree::where('do_for_living', '=', 'ESTUDIA Y TRABAJA')
            ->orWhere('do_for_living', '=', 'TRABAJA')
            ->groupBy('long_take_job')->selectRaw('count(*) as total, long_take_job')->get();
        $data['counts'] = SurveyThree::selectRaw(
            'SUM(competence1) as \'Competencias laborales\', 
            SUM(competence2) as \'Título Profesional\',
            SUM(competence3) as \'Examen de selección\',
            SUM(competence4) as \'Idioma Extranjero\',
            SUM(competence5) as \'Actitudes y habilidades\',
            SUM(competence6) as Ninguno'
        )->where('do_for_living', '=', 'ESTUDIA Y TRABAJA')
            ->orWhere('do_for_living', '=', 'TRABAJA')
            ->get()->toArray()[0];
        $data['language_most_spoken'] = SurveyThree::where('do_for_living', '=', 'ESTUDIA Y TRABAJA')
            ->orWhere('do_for_living', '=', 'TRABAJA')
            ->groupBy('language_most_spoken')->selectRaw('count(*) as total, language_most_spoken')->get();
        $data['seniority'] = SurveyThree::where('do_for_living', '=', 'ESTUDIA Y TRABAJA')
        ->orWhere('do_for_living', '=', 'TRABAJA')
        ->groupBy('seniority')->selectRaw('count(*) as total, seniority')->get();
        $data['year'] = SurveyThree::where('do_for_living', '=', 'ESTUDIA Y TRABAJA')
        ->orWhere('do_for_living', '=', 'TRABAJA')
        ->groupBy('year')->selectRaw('count(*) as total, year')->get();
        $data['salary'] = SurveyThree::where('do_for_living', '=', 'ESTUDIA Y TRABAJA')
        ->orWhere('do_for_living', '=', 'TRABAJA')
        ->groupBy('salary')->selectRaw('count(*) as total, salary')->get();
        $data['management_level'] = SurveyThree::where('do_for_living', '=', 'ESTUDIA Y TRABAJA')
        ->orWhere('do_for_living', '=', 'TRABAJA')
        ->groupBy('management_level')->selectRaw('count(*) as total, management_level')->get();
        $data['job_condition'] = SurveyThree::where('do_for_living', '=', 'ESTUDIA Y TRABAJA')
        ->orWhere('do_for_living', '=', 'TRABAJA')
        ->groupBy('job_condition')->selectRaw('count(*) as total, job_condition')->get();
        $data['job_relationship'] = SurveyThree::where('do_for_living', '=', 'ESTUDIA Y TRABAJA')
        ->orWhere('do_for_living', '=', 'TRABAJA')
        ->groupBy('job_relationship')->selectRaw('count(*) as total, job_relationship')->get();
        $data['business_structure'] = SurveyThree::where('do_for_living', '=', 'ESTUDIA Y TRABAJA')
        ->orWhere('do_for_living', '=', 'TRABAJA')
        ->groupBy('business_structure')->selectRaw('count(*) as total, business_structure')->get();
        $data['company_size'] = SurveyThree::where('do_for_living', '=', 'ESTUDIA Y TRABAJA')
        ->orWhere('do_for_living', '=', 'TRABAJA')
        ->groupBy('company_size')->selectRaw('count(*) as total, company_size')->get();
        $data['business_activity_selector'] = SurveyThree::where('do_for_living', '=', 'ESTUDIA Y TRABAJA')
        ->orWhere('do_for_living', '=', 'TRABAJA')
        ->groupBy('business_activity_selector')->selectRaw('count(*) as total, business_activity_selector')->get();

        return view('backend.stadistics.graduate.survey_three', $data);
    }

    public function SurveyFourStadistic()
    {
        $data['efficiency_work_activities'] = SurveyFour::groupBy('efficiency_work_activities')->selectRaw('count(*) as total, efficiency_work_activities')->get();
        $data['academic_training'] = SurveyFour::groupBy('academic_training')->selectRaw('count(*) as total, academic_training')->get();
        $data['usefulness_professional_residence'] = SurveyFour::groupBy('usefulness_professional_residence')->selectRaw('count(*) as total, usefulness_professional_residence')->get();
        $data['averages'] = SurveyFour::selectRaw(
            'ROUND(avg(study_area),2) as \'Área de estudio\', 
            ROUND(avg(title),2) as Titulación,
            ROUND(avg(experience),2) as \'Experiencia Laboral\',
            ROUND(avg(job_competence),2) as \'Competencia Laboral\',
            ROUND(avg(positioning),2) as Posicionamiento,
            ROUND(avg(languages),2) as \'Idiomas Extranjeros\',
            ROUND(avg(recommendations),2) as Recomendaciones,
            ROUND(avg(personality),2) as Personalidad,
            ROUND(avg(leadership),2) as \'Capacidad de liderazgo\',
            ROUND(avg(others),2) as Otros'
        )
            ->get()->toArray()[0];
        $data['study_area'] = SurveyFour::groupBy('study_area')->selectRaw('count(*) as total, study_area')->get();
        $data['title'] = SurveyFour::groupBy('title')->selectRaw('count(*) as total, title')->get();
        $data['experience'] = SurveyFour::groupBy('experience')->selectRaw('count(*) as total, experience')->get();
        $data['job_competence'] = SurveyFour::groupBy('job_competence')->selectRaw('count(*) as total, job_competence')->get();
        $data['positioning'] = SurveyFour::groupBy('positioning')->selectRaw('count(*) as total, positioning')->get();
        $data['languages'] = SurveyFour::groupBy('languages')->selectRaw('count(*) as total, languages')->get();
        $data['recommendations'] = SurveyFour::groupBy('recommendations')->selectRaw('count(*) as total, recommendations')->get();
        $data['personality'] = SurveyFour::groupBy('personality')->selectRaw('count(*) as total, personality')->get();
        $data['leadership'] = SurveyFour::groupBy('leadership')->selectRaw('count(*) as total, leadership')->get();
        $data['others'] = SurveyFour::groupBy('others')->selectRaw('count(*) as total, others')->get();

        return view('backend.stadistics.graduate.survey_four', $data);
    }

    public function SurveyFiveStadistic()
    {
        $data['courses_yes_no'] = SurveyFive::groupBy('courses_yes_no')->selectRaw('count(*) as total, courses_yes_no')->get();
        $data['courses'] = SurveyFive::selectRaw('id, courses')->get();
        $data['master_yes_no'] = SurveyFive::groupBy('master_yes_no')->selectRaw('count(*) as total, master_yes_no')->get();
        $data['master'] = SurveyFive::selectRaw('id, master')->get();
        return view('backend.stadistics.graduate.survey_five', $data);
    }

    public function SurveySixStadistic()
    {
        $data['organization_yes_no'] = SurveySix::groupBy('organization_yes_no')->selectRaw('count(*) as total, organization_yes_no')->get();
        $data['organization'] = SurveySix::selectRaw('id, organization')->get();
        $data['agency_yes_no'] = SurveySix::groupBy('agency_yes_no')->selectRaw('count(*) as total, agency_yes_no')->get();
        $data['agency'] = SurveySix::selectRaw('id, agency')->get();
        $data['association_yes_no'] = SurveySix::groupBy('association_yes_no')->selectRaw('count(*) as total, association_yes_no')->get();
        $data['association'] = SurveySix::selectRaw('id, association')->get();
        return view('backend.stadistics.graduate.survey_six', $data);
    }

    public function SurveyEightStadistic()
    {
        $data['survey_data'] = SurveyThree::all();
        return view('backend.report.graduate.survey_three', $data);
    }
}
