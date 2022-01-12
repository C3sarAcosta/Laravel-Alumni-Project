<?php

namespace App\Http\Controllers\backend\survey\company;

use App\Http\Controllers\backend\survey\BaseController;
use Illuminate\Http\Request;
use App\Models\CompanySurveyThree;
use App\Models\CompanySurvey;
use App\Models\User;
//Constants
use App\Constants\Constants;

class CompanySurveyThreeController extends BaseController
{
    public function SurveyView()
    {
        $data['constants'] = Constants::getConstants();
        return view('backend.survey.company_3.survey_three_company', $data);
    }

    public function SurveyStore(Request $request)
    {
        (new User)->newUser();

        $data = new CompanySurveyThree();
        $data->user_id = $this->user->id;
        $data->resolve_conflicts = $request->resolve_conflicts;
        $data->orthography = $request->orthography;
        $data->process_improvement = $request->process_improvement;
        $data->teamwork = $request->teamwork;
        $data->time_management = $request->time_management;
        $data->security = $request->security;
        $data->ease_speech = $request->ease_speech;
        $data->project_management = $request->project_management;
        $data->puntuality = $request->puntuality;
        $data->rules = $request->rules;
        $data->integration_work = $request->integration_work;
        $data->creativity = $request->creativity;
        $data->bargaining = $request->bargaining;
        $data->abstraction = $request->abstraction;
        $data->leadership = $request->leadership;
        $data->changes = $request->changes;
        $data->job_performance = $request->job_performance;
        $data->requirement = trim($request->requirement);
        $data->comments = trim($request->comments);

        $data->save();

        $this->updateSurveyStatus(3);
        
        $this->notification['message'] = 'Encuesta *Competencias Laborales* realizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('company.index')->with($this->notification);
    }

    public function SurveyEdit()
    {
        $data['userData'] = CompanySurveyThree::where('user_id', $this->user->id)->first();
        $data['constants'] = Constants::getConstants();
        return view('backend.survey.company_3.survey_three_company_edit', $data);
    }

    public function SurveyUpdate(Request $request)
    {
        $editData = CompanySurveyThree::where('user_id', $this->user->id)->first();

        $editData->resolve_conflicts = $request->resolve_conflicts;
        $editData->orthography = $request->orthography;
        $editData->process_improvement = $request->process_improvement;
        $editData->teamwork = $request->teamwork;
        $editData->time_management = $request->time_management;
        $editData->security = $request->security;
        $editData->ease_speech = $request->ease_speech;
        $editData->project_management = $request->project_management;
        $editData->puntuality = $request->puntuality;
        $editData->rules = $request->rules;
        $editData->integration_work = $request->integration_work;
        $editData->creativity = $request->creativity;
        $editData->bargaining = $request->bargaining;
        $editData->abstraction = $request->abstraction;
        $editData->leadership = $request->leadership;
        $editData->changes = $request->changes;
        $editData->job_performance = $request->job_performance;
        if (!(trim($request->requirement) == "" || $request->requirement == null)) {
            $editData->requirement = trim($request->requirement);
        }
        $editData->comments = trim($request->comments);

        $editData->save();

        $this->notification['message'] = 'Encuesta *Competencias Laborales* actualizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('company.index')->with($this->notification);
    }

    public function SurveyVerifiedRoute()
    {
        $data = CompanySurvey::where('user_id', $this->user->id)->first();

        return $data['survey_three_company_done'] == Constants::STATUS['Active']
            ? redirect()->route('survey.three.company.edit')
            : redirect()->route('survey.three.company.index');
    }
}
