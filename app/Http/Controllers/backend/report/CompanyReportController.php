<?php

namespace App\Http\Controllers\backend\report;

use App\Http\Controllers\backend\report\ReportController;
use App\Models\CompanySurveyOne;
use App\Models\CompanySurveyTwo;
use App\Models\CompanySurveyThree;
use App\Models\CompanyGraduatesWorking;

class CompanyReportController extends ReportController
{
    public function surveyOneReport()
    {
        return $this->report((new CompanySurveyOne), 'backend.report.company.survey_one');
    }

    public function surveyTwoReport()
    {
        $data['survey_data'] = CompanySurveyTwo::all();
        $data['graduates'] = CompanyGraduatesWorking::all();
        return view('backend.report.company.survey_two', $data);
    }

    public function surveyThreeReport()
    {
        return $this->report((new CompanySurveyThree), 'backend.report.company.survey_three');
    }
}
