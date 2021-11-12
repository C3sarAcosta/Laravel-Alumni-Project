<?php

namespace App\Http\Controllers\backend\statistic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanySurveyOne;
use App\Models\CompanySurveyTwo;
use App\Models\CompanySurveyThree;
use App\Models\CompanyGraduatesWorking;

class CompanyStatisticController extends Controller
{
    public function CompanySurveyOneStatistic()
    {
        $data['state'] = CompanySurveyOne::groupBy('state')->selectRaw('count(*) as total, state')->get();
        $data['business_structure'] = CompanySurveyOne::groupBy('business_structure')->selectRaw('count(*) as total, business_structure')->get();
        $data['company_size'] = CompanySurveyOne::groupBy('company_size')->selectRaw('count(*) as total, company_size')->get();
        $data['business_activity_selector'] = CompanySurveyOne::groupBy('business_activity_selector')->selectRaw('count(*) as total, business_activity_selector')->get();

        return view('backend.statistics.company.company_survey_one', $data);
    }

    public function CompanySurveyTwoStatistic()
    {
        $data['counts'] = CompanySurveyTwo::selectRaw(
            'SUM(competence1) as \'Área de estudio\', 
            SUM(competence2) as \'Títulación\',
            SUM(competence3) as \'Experiencia Laboral\',
            SUM(competence4) as \'Posicionamiento institución egreso\',
            SUM(competence5) as \'Conocimiento de idiomas\',
            SUM(competence6) as \'Recomendaciones/Referencias\',
            SUM(competence7) as \'Personalidad/Actitudes\',
            SUM(competence8) as \'Liderazgo\''
        )
            ->get()->toArray()[0];
        $data['careers'] = CompanyGraduatesWorking::groupBy('career')->selectRaw('sum(amount) as total, career')->get();
        $data['number_graduates'] = CompanySurveyTwo::groupBy('number_graduates')->selectRaw('count(*) as total, number_graduates')->get();
        $data['congruence'] = CompanySurveyTwo::groupBy('congruence')->selectRaw('count(*) as total, congruence')->get();
        $data['most_demanded_career'] = CompanySurveyTwo::groupBy('most_demanded_career')->selectRaw('count(*) as total, most_demanded_career')->get();

        return view('backend.statistics.company.company_survey_two', $data);
    }

    public function CompanySurveyThreeStatistic()
    {
        $data['averages'] = CompanySurveyThree::selectRaw(
            'ROUND(avg(resolve_conflicts),2) as \'Resolver conflictos\', 
            ROUND(avg(orthography),2) as \'Ortografía y redacción\',
            ROUND(avg(process_improvement),2) as \'Mejora de procesos\',
            ROUND(avg(teamwork),2) as \'Trabajo en equipo\',
            ROUND(avg(time_management),2) as \'Administrar tiempo\',
            ROUND(avg(security),2) as \'Seguridad personal\',
            ROUND(avg(ease_speech),2) as \'Facilidad de palabra\',
            ROUND(avg(project_management),2) as \'Gestión de proyectos\',
            ROUND(avg(puntuality),2) as \'Puntualidad y asistencia\',
            ROUND(avg(rules),2) as \'Cumplimiento de normas\',
            ROUND(avg(integration_work),2) as \'Integración al trabajo\',
            ROUND(avg(creativity),2) as \'Creatividad e innovación\',
            ROUND(avg(bargaining),2) as \'Capacidad de negociación\',
            ROUND(avg(abstraction),2) as \'Abstracción, análisis\',
            ROUND(avg(leadership),2) as \'Liderazgo\',
            ROUND(avg(changes),2) as \'Adaptar al cambio\''
        )
            ->get()->toArray()[0];

        $data['resolve_conflicts'] = CompanySurveyThree::groupBy('resolve_conflicts')->selectRaw('count(*) as total, resolve_conflicts')->get();
        $data['orthography'] = CompanySurveyThree::groupBy('orthography')->selectRaw('count(*) as total, orthography')->get();
        $data['process_improvement'] = CompanySurveyThree::groupBy('process_improvement')->selectRaw('count(*) as total, process_improvement')->get();
        $data['teamwork'] = CompanySurveyThree::groupBy('teamwork')->selectRaw('count(*) as total, teamwork')->get();
        $data['time_management'] = CompanySurveyThree::groupBy('time_management')->selectRaw('count(*) as total, time_management')->get();
        $data['security'] = CompanySurveyThree::groupBy('security')->selectRaw('count(*) as total, security')->get();
        $data['ease_speech'] = CompanySurveyThree::groupBy('ease_speech')->selectRaw('count(*) as total, ease_speech')->get();
        $data['project_management'] = CompanySurveyThree::groupBy('project_management')->selectRaw('count(*) as total, project_management')->get();
        $data['puntuality'] = CompanySurveyThree::groupBy('puntuality')->selectRaw('count(*) as total, puntuality')->get();
        $data['rules'] = CompanySurveyThree::groupBy('rules')->selectRaw('count(*) as total, rules')->get();
        $data['integration_work'] = CompanySurveyThree::groupBy('integration_work')->selectRaw('count(*) as total, integration_work')->get();
        $data['creativity'] = CompanySurveyThree::groupBy('creativity')->selectRaw('count(*) as total, creativity')->get();
        $data['bargaining'] = CompanySurveyThree::groupBy('bargaining')->selectRaw('count(*) as total, bargaining')->get();
        $data['abstraction'] = CompanySurveyThree::groupBy('abstraction')->selectRaw('count(*) as total, abstraction')->get();
        $data['leadership'] = CompanySurveyThree::groupBy('leadership')->selectRaw('count(*) as total, leadership')->get();
        $data['changes'] = CompanySurveyThree::groupBy('changes')->selectRaw('count(*) as total, changes')->get();
        $data['job_performance'] = CompanySurveyThree::groupBy('job_performance')->selectRaw('count(*) as total, job_performance')->get();

        return view('backend.statistics.company.company_survey_three', $data);
    }
}
