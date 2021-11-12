<?php

namespace App\Http\Controllers\backend\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanySurveyOne;
use App\Models\CompanySurveyTwo;
use App\Models\CompanySurveyThree;
use App\Models\CompanyGraduatesWorking;

class CompanyReportController extends Controller
{
    public function SurveyOneReport()
    {
        $data['survey_data'] = CompanySurveyOne::all();
        return view('backend.report.company.survey_one', $data);
    }

    public function SurveyTwoReport()
    {
        $data['survey_data'] = CompanySurveyTwo::all();
        $data['graduates'] = CompanyGraduatesWorking::all();
        return view('backend.report.company.survey_two', $data);
    }

    public function SurveyThreeReport()
    {
        $data['survey_data'] = CompanySurveyThree::all();
        return view('backend.report.company.survey_three', $data);
    }
}
