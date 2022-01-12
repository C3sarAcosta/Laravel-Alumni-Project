<?php

namespace App\Http\Controllers\backend\report;

use App\Http\Controllers\backend\report\ReportController;
use App\Models\SurveyOne;
use App\Models\SurveyTwo;
use App\Models\SurveyThree;
use App\Models\SurveyFour;
use App\Models\SurveyFive;
use App\Models\SurveySix;
use App\Models\SurveySeven;

class GraduateReportController extends ReportController
{
    public function surveyOneReport()
    {
        return $this->report((new SurveyOne), 'backend.report.graduate.survey_one');
    }

    public function surveyTwoReport()
    {
        return $this->report((new SurveyTwo), 'backend.report.graduate.survey_two');
    }

    public function surveyThreeReport()
    {
        return $this->report((new SurveyThree), 'backend.report.graduate.survey_three');
    }

    public function surveyFourReport()
    {
        return $this->report((new SurveyFour), 'backend.report.graduate.survey_four');
    }

    public function surveyFiveReport()
    {
        return $this->report((new SurveyFive), 'backend.report.graduate.survey_five');
    }

    public function surveySixReport()
    {
        return $this->report((new SurveySix), 'backend.report.graduate.survey_six');
    }

    public function surveySevenReport()
    {
        return $this->report((new SurveySeven), 'backend.report.graduate.survey_seven');
    }
}
