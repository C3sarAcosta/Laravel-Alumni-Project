<?php

namespace App\Http\Controllers\backend\survey\graduate;

use App\Http\Controllers\backend\survey\BaseController;
use Illuminate\Http\Request;
use App\Models\SurveyFive;
use App\Models\StudentSurvey;
use App\Models\User;
//Constants
use App\Constants\Constants;

class SurveyFiveController extends BaseController
{
    public function surveyView()
    {
        $data['constants'] = Constants::getConstants();
        return view('backend.survey.5.survey_five', $data);
    }

    public function surveyStore(Request $request)
    {
        (new User)->newUser();

        $checkCourses = $request->courses_selector == Constants::YES_NO['Yes'] && empty(trim($request->courses));
        $checkMaster = $request->master_selector == Constants::YES_NO['Yes'] && empty(trim($request->master));

        if ($checkCourses || $checkMaster) return $this->messageError($checkCourses, $checkMaster);

        $surveyFive = new SurveyFive();
        $this->saveController($surveyFive, $request);
        $this->updateSurveyStatus(5);

        $this->notification['message'] = 'Encuesta *Expéctativas y Actualización* realizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('graduate.index')->with($this->notification);
    }

    public function surveyEdit()
    {
        $data['userData'] = SurveyFive::where('user_id', $this->user->id)->first();
        $data['constants'] = Constants::getConstants();
        return view('backend.survey.5.survey_five_edit', $data);
    }

    public function surveyUpdate(Request $request)
    {
        $checkCourses = $request->courses_selector == Constants::YES_NO['Yes'] && empty(trim($request->courses));
        $checkMaster = $request->master_selector == Constants::YES_NO['Yes'] && empty(trim($request->master));

        if ($checkCourses || $checkMaster) return $this->messageError($checkCourses, $checkMaster);

        $surveyFive = SurveyFive::where('user_id', $this->user->id)->first();
        $this->saveController($surveyFive, $request);

        $this->notification['message'] = 'Expéctativas y Actualización* actualizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('graduate.index')->with($this->notification);
    }

    public function surveyVerifiedRoute()
    {
        $data = StudentSurvey::where('user_id', $this->user->id)->first();

        return $data['survey_five_done'] == Constants::STATUS['Active']
            ? redirect()->route('survey.five.edit')
            : redirect()->route('survey.five.index');
    }

    function saveController(SurveyFive $surveyFive, Request $request)
    {
        $surveyFive->user_id = $this->user->id;
        $surveyFive->courses_yes_no = $request->courses_selector;
        $surveyFive->courses = $request->courses_selector == Constants::YES_NO['Yes']
            ? trim($request->courses)
            : null;
        $surveyFive->master_yes_no = $request->master_selector;
        $surveyFive->master = $request->master_selector == Constants::YES_NO['Yes']
            ? trim($request->master)
            : null;
        $surveyFive->save();
    }

    public function messageError($checkCourses, $checkMaster ){
        $this->notification['message'] = $checkCourses
            ? 'Por favor mencione los cursos, es obligatorio si selecciona sí.'
            : ($checkMaster
                ? 'Por favor mencione los posgrados, es obligatorio si selecciona sí.'
                : '');
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Error'];
        return redirect()->back()->withInput()->with($this->notification);
    }
}
