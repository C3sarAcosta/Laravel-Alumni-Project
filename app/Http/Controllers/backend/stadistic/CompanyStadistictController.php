<?php

namespace App\Http\Controllers\backend\stadistic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanySurveyOne;
use App\Models\CompanySurveyTwo;
use App\Models\CompanySurveyThree;

class CompanyStadistictController extends Controller
{
    public function CompanySurveyOneStadistic()
    {
        $data['business_name'] = SurveyOne::groupBy('business_name')->selectRaw('count(*) as total, business_name')->get();
        $data['address'] = SurveyOne::groupBy('address')->selectRaw('count(*) as total, address')->get();
        $data['zip'] = SurveyOne::groupBy('zip')->selectRaw('count(*) as total, zip')->get();
        $data['suburb'] = SurveyOne::groupBy('suburb')->selectRaw('count(*) as total, suburb')->get();
        $data['state'] = SurveyOne::groupBy('state')->selectRaw('count(*) as total, state')->get();
        $data['city'] = SurveyOne::groupBy('city')->selectRaw('count(*) as total, city')->get();
        $data['municipality'] = SurveyOne::groupBy('municipality')->selectRaw('count(*) as total, municipality')->get();
        $data['phone'] = SurveyOne::groupBy('phone')->selectRaw('count(*) as total, phone')->get();
        $data['email'] = SurveyOne::groupBy('email')->selectRaw('count(*) as total, email')->get();
        $data['business_structure'] = SurveyOne::groupBy('business_structure')->selectRaw('count(*) as total, business_structure')->get();
        $data['company_size'] = SurveyOne::groupBy('company_size')->selectRaw('count(*) as total, company_size')->get();
        $data['business_activity_selector'] = SurveyOne::groupBy('business_activity_selector')->selectRaw('count(*) as total, business_activity_selector')->get();

        return view('backend.stadistics.company.survey_one', $data);
    }

    public function CompanySurveyThreeStadistic()
    {
        $data['resolve_conflicts'] = SurveyOne::groupBy('resolve_conflicts')->selectRaw('count(*) as total, resolve_conflicts')->get();
        $data['orthography'] = SurveyOne::groupBy('orthography')->selectRaw('count(*) as total, orthography')->get();
        $data['process_improvement'] = SurveyOne::groupBy('process_improvement')->selectRaw('count(*) as total, process_improvement')->get();
        $data['teamwork'] = SurveyOne::groupBy('teamwork')->selectRaw('count(*) as total, teamwork')->get();
        $data['time_management'] = SurveyOne::groupBy('time_management')->selectRaw('count(*) as total, time_management')->get();
        $data['security'] = SurveyOne::groupBy('security')->selectRaw('count(*) as total, security')->get();
        $data['ease_speech	'] = SurveyOne::groupBy('ease_speech	')->selectRaw('count(*) as total, ease_speech	')->get();
        $data['project_management'] = SurveyOne::groupBy('project_management')->selectRaw('count(*) as total, project_management')->get();
        $data['puntuality'] = SurveyOne::groupBy('puntuality')->selectRaw('count(*) as total, puntuality')->get();
        $data['rules'] = SurveyOne::groupBy('rules')->selectRaw('count(*) as total, rules')->get();
        $data['integration_work'] = SurveyOne::groupBy('integration_work')->selectRaw('count(*) as total, integration_work')->get();
        $data['creativity'] = SurveyOne::groupBy('creativity')->selectRaw('count(*) as total, creativity')->get();
        $data['bargaining'] = SurveyOne::groupBy('bargaining')->selectRaw('count(*) as total, bargaining')->get();
        $data['abstraction'] = SurveyOne::groupBy('abstraction')->selectRaw('count(*) as total, abstraction')->get();
        $data['leadership'] = SurveyOne::groupBy('leadership')->selectRaw('count(*) as total, leadership')->get();
        $data['change'] = SurveyOne::groupBy('change')->selectRaw('count(*) as total, change')->get();
        $data['job_performance'] = SurveyOne::groupBy('job_performance')->selectRaw('count(*) as total, job_performance')->get();
        $data['requirement'] = SurveyOne::groupBy('requirement')->selectRaw('count(*) as total, requirement')->get();
        $data['comments'] = SurveyOne::groupBy('comments')->selectRaw('count(*) as total, comments')->get();

        return view('backend.stadistics.company.survey_three', $data);
    }
}
