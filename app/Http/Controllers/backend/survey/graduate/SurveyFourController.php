<?php

namespace App\Http\Controllers\backend\survey\graduate;

use App\Http\Controllers\backend\survey\BaseController;
use Illuminate\Http\Request;
use App\Models\SurveyFour;
use App\Models\StudentSurvey;
use App\Models\User;
//Constants
use App\Constants\Constants;

class SurveyFourController extends BaseController
{
    public function surveyView()
    {
        return view('backend.survey.4.survey_four');
    }

    public function surveyStore(Request $request)
    {
        (new User)->newUser();

        $surveyFour = new SurveyFour();
        $this->saveController($surveyFour, $request);
        $this->updateSurveyStatus(4);

        $this->notification['message'] = 'Encuesta *Desempeño Profesional* realizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('graduate.index')->with($this->notification);
    }

    public function surveyEdit()
    {
        $data['userData'] = SurveyFour::where('user_id', $this->user->id)->first();
        return view('backend.survey.4.survey_four_edit', $data);
    }

    public function surveyUpdate(Request $request)
    {
        $surveyFour = SurveyFour::where('user_id', $this->user->id)->first();
        $this->saveController($surveyFour, $request);

        $this->notification['message'] = 'Encuesta *Desempeño Profesional* actualizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('graduate.index')->with($this->notification);
    }

    public function surveyVerifiedRoute()
    {
        $data = StudentSurvey::where('user_id', $this->user->id)->first();

        return $data['survey_four_done'] == Constants::STATUS['Active']
            ? redirect()->route('survey.four.edit')
            : redirect()->route('survey.four.index');
    }

    function saveController(SurveyFour $surveyFour, Request $request)
    {
        $surveyFour->user_id = $this->user->id;
        $surveyFour->efficiency_work_activities = $request->efficiency_work_activities;
        $surveyFour->academic_training = $request->academic_training;
        $surveyFour->usefulness_professional_residence = $request->usefulness_professional_residence;
        $surveyFour->study_area = $request->study_area;
        $surveyFour->title = $request->title;
        $surveyFour->experience = $request->experience;
        $surveyFour->job_competence = $request->job_competence;
        $surveyFour->positioning = $request->positioning;
        $surveyFour->languages = $request->languages;
        $surveyFour->recommendations = $request->recommendations;
        $surveyFour->personality = $request->personality;
        $surveyFour->leadership = $request->leadership;
        $surveyFour->others = $request->others;
        $surveyFour->save();
    }
}
