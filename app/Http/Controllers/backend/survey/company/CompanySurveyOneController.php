<?php

namespace App\Http\Controllers\backend\survey\company;

use App\Http\Controllers\backend\survey\BaseController;
use App\Models\CompanySurveyOne;
use App\Models\CompanySurvey;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Business;
//Constants
use App\Constants\Constants;

class CompanySurveyOneController extends BaseController
{
    public function surveyView()
    {
        $data['constants'] = Constants::getConstants();
        $data['business_activity'] = Business::all();
        return view('backend.survey.company_1.survey_one_company', $data);
    }

    public function surveyStore(Request $request)
    {
        (new User)->newUser();

        $companySurveyOne = new CompanySurveyOne();
        $this->SaveController($companySurveyOne, $request);
        $this->updateSurveyStatus(1);

        $this->notification['message'] = 'Encuesta *Datos generales de la empresa* realizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('company.index')->with($this->notification);
    }

    public function surveyEdit()
    {
        $data['constants'] = Constants::getConstants();
        $data['userData'] = CompanySurveyOne::where('user_id', $this->user->id)->first();
        $data['business_activity'] = Business::all();
        return view('backend.survey.company_1.survey_one_company_edit', $data);
    }

    public function surveyUpdate(Request $request)
    {
        $companySurveyOne = CompanySurveyOne::where('user_id', $this->user->id)->first();
        $this->SaveController($companySurveyOne, $request);

        $this->notification['message'] = 'Encuesta *Datos generales de la empresa* actualizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('company.index')->with($this->notification);
    }

    public function surveyVerifiedRoute()
    {
        $data = CompanySurvey::where('user_id', $this->user->id)->first();

        return $data['survey_one_company_done'] == Constants::STATUS['Active']
            ? redirect()->route('survey.one.company.edit')
            : redirect()->route('survey.one.company.index');
    }

    function saveController(CompanySurveyOne $companySurveyOne, Request $request)
    {
        $companySurveyOne->user_id = $this->user->id;
        $companySurveyOne->business_name = trim(mb_strtoupper($request->business_name, 'UTF-8'));
        $companySurveyOne->address = trim(mb_strtoupper($request->address, 'UTF-8'));
        $companySurveyOne->zip = trim($request->zip);
        $companySurveyOne->suburb = trim(mb_strtoupper($request->suburb, 'UTF-8'));
        $companySurveyOne->state = trim(mb_strtoupper($request->state, 'UTF-8'));
        $companySurveyOne->city = trim(mb_strtoupper($request->city, 'UTF-8'));
        $companySurveyOne->municipality = trim(mb_strtoupper($request->municipality, 'UTF-8'));
        $companySurveyOne->phone = trim($request->phone);
        $companySurveyOne->email = $this->user->email;
        $companySurveyOne->business_structure = $request->business_structure;
        $companySurveyOne->company_size = $request->company_size;
        $companySurveyOne->business_activity_selector = $request->business_activity_selector;
        $companySurveyOne->save();
    }
}
