<?php

namespace App\Http\Controllers\backend\survey\graduate;

use App\Http\Controllers\backend\survey\BaseController;
use Illuminate\Http\Request;
use App\Models\SurveySeven;
use App\Models\StudentSurvey;
use App\Models\User;
//Constants
use App\Constants\Constants;

class SurveySevenController extends BaseController
{
    public function surveyView()
    {
        return view('backend.survey.7.survey_seven');
    }

    public function surveyStore(Request $request)
    {
        (new User)->newUser();
        
        if (empty(trim($request->comments))) {
            $this->notification['message'] = 'Si vas a opinar te pedimos que no sea un texto en blanco.';
            $this->notification['alert-type'] = Constants::ALERT_TYPE['Error'];
            return redirect()->back()->with($this->notification);
        }

        $surveySeven = new SurveySeven();
        $this->saveController($surveySeven, $request);
        $this->updateSurveyStatus(7);

        $this->notification['message'] = 'Encuesta *Comentarios y Sugerencias* realizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('graduate.index')->with($this->notification);
    }

    public function surveyEdit()
    {
        $data['userData'] = SurveySeven::where('user_id', $this->user->id)->first();
        return view('backend.survey.7.survey_seven_edit', $data);
    }

    public function surveyUpdate(Request $request)
    {
        if (empty(trim($request->comments))) {
            $this->notification['message'] = 'Si vas a opinar te pedimos que no sea un texto en blanco.';
            $this->notification['alert-type'] = Constants::ALERT_TYPE['Error'];
            return redirect()->back()->with($this->notification);
        }

        $surveySeven = SurveySeven::where('user_id', $this->user->id)->first();
        $this->saveController($surveySeven, $request);

        $this->notification['message'] = 'Encuesta *Comentarios y Sugerencias* actualizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('graduate.index')->with($this->notification);
    }

    public function surveyVerifiedRoute()
    {
        $data = StudentSurvey::where('user_id', $this->user->id)->first();

        return $data['survey_seven_done'] == Constants::STATUS['Active'] 
            ? redirect()->route('survey.seven.edit') 
            : redirect()->route('survey.seven.index');
    }

    public function saveController(SurveySeven $surveySeven, Request $request){
        $surveySeven->user_id = $this->user->id;
        $surveySeven->comments = trim($request->comments);
        $surveySeven->save();
    }
}
