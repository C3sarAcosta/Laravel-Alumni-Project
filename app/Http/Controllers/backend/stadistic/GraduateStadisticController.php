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
        $data['survey_data'] = SurveyTwo::all();
        return view('backend.report.graduate.survey_two', $data);
    }

    public function SurveyThreeStadistic()
    {
        $data['survey_data'] = SurveyThree::all();
        return view('backend.report.graduate.survey_three', $data);
    }

    public function SurveyFourStadistic()
    {
        $data['survey_data'] = SurveyFour::all();
        return view('backend.report.graduate.survey_four', $data);
    }

    public function SurveyFiveStadistic()
    {
        $data['survey_data'] = SurveyFive::all();
        return view('backend.report.graduate.survey_five', $data);
    }

    public function SurveySixStadistic()
    {
        $data['survey_data'] = SurveySix::all();
        return view('backend.report.graduate.survey_six', $data);
    }

    public function SurveySevenStadistic()
    {
        $data['survey_data'] = SurveySeven::all();
        return view('backend.report.graduate.survey_seven', $data);
    }

    public function SurveyEightStadistic()
    {
        $data['survey_data'] = SurveyThree::all();
        return view('backend.report.graduate.survey_three', $data);
    }
}
