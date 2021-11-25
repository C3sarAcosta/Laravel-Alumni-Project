<?php

namespace App\Http\Controllers\backend\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SurveyOne;
use App\Models\SurveyTwo;
use App\Models\SurveyThree;
use App\Models\SurveyFour;
use App\Models\SurveyFive;
use App\Models\SurveySix;
use App\Models\SurveySeven;

class GraduateReportController extends Controller
{
    public function SurveyOneReport()
    {
        $data['survey_data'] = SurveyOne::all();
        return view('backend.report.graduate.survey_one', $data);
    }

    public function SurveyTwoReport()
    {
        $data['survey_data'] = SurveyTwo::all();
        return view('backend.report.graduate.survey_two', $data);
    }

    public function SurveyThreeReport()
    {
        $data['survey_data'] = SurveyThree::all();
        return view('backend.report.graduate.survey_three', $data);
    }

    public function SurveyFourReport()
    {
        $data['survey_data'] = SurveyFour::all();
        return view('backend.report.graduate.survey_four', $data);
    }

    public function SurveyFiveReport()
    {
        $data['survey_data'] = SurveyFive::all();
        return view('backend.report.graduate.survey_five', $data);
    }

    public function SurveySixReport()
    {
        $data['survey_data'] = SurveySix::all();
        return view('backend.report.graduate.survey_six', $data);
    }

    public function SurveySevenReport()
    {
        $data['survey_data'] = SurveySeven::all();
        return view('backend.report.graduate.survey_seven', $data);
    }
  
}
