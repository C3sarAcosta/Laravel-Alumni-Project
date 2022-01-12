<?php

namespace App\Http\Controllers\backend\survey\graduate;

use App\Http\Controllers\backend\survey\BaseController;
use App\Models\SurveyTwo;
use App\Models\StudentSurvey;
use Illuminate\Http\Request;
use App\Models\User;
//Constants
use App\Constants\Constants;

class SurveyTwoController extends BaseController
{
    public function surveyView()
    {
        $data['constants'] = Constants::getConstants();
        return view('backend.survey.2.survey_two', $data);
    }

    public function surveyStore(Request $request)
    {
        (new User)->newUser();

        $surveyTwo = new SurveyTwo();
        $this->saveController($surveyTwo, $request);
        $this->updateSurveyStatus(2);

        $this->notification['message'] = 'Encuesta *Pertenencia y Disponibilidad* realizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('graduate.index')->with($this->notification);
    }

    public function surveyEdit()
    {
        $data['userData'] = SurveyTwo::where('user_id', $this->user->id)->first();
        $data['constants'] = Constants::getConstants();
        return view('backend.survey.2.survey_two_edit', $data);
    }

    public function surveyUpdate(Request $request)
    {
        $surveyTwo = SurveyTwo::where('user_id', $this->user->id)->first();
        $this->saveController($surveyTwo, $request);

        $this->notification['message'] = 'Encuesta *Pertenencia y Disponibilidad* actualizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('graduate.index')->with($this->notification);
    }

    public function surveyVerifiedRoute()
    {
        $data = StudentSurvey::where('user_id', $this->user->id)->first();

        return $data['survey_two_done'] == Constants::STATUS['Active']
            ? redirect()->route('survey.two.edit')
            : redirect()->route('survey.two.index');
    }

    function saveController(SurveyTwo $surveyTwo, Request $request)
    {
        $surveyTwo->user_id = $this->user->id;
        $surveyTwo->quality_teachers = $request->quality_teachers;
        $surveyTwo->syllabus = $request->syllabus;
        $surveyTwo->study_condition = $request->study_condition;
        $surveyTwo->experience = $request->experience;
        $surveyTwo->study_emphasis = $request->study_emphasis;
        $surveyTwo->participate_projects = $request->participate_projects;
        $surveyTwo->save();
    }
}
