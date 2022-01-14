<?php

namespace App\Http\Controllers\backend\survey\company;

use App\Http\Controllers\backend\survey\BaseController;
use Illuminate\Http\Request;
use App\Models\CompanySurveyTwo;
use App\Models\CompanySurvey;
use App\Models\Career;
use App\Models\User;
use App\Models\CompanyGraduatesWorking;
//Constants
use App\Constants\Constants;

class CompanySurveyTwoController extends BaseController
{
    public function surveyView()
    {
        $data['constants'] = Constants::getConstants();
        $data['careers'] = Career::pluck('name');
        return view('backend.survey.company_2.survey_two_company', $data);
    }

    public function surveyStore(Request $request)
    {
        (new User)->newUser();

        $data = new CompanySurveyTwo();
        $data->user_id = $this->user->id;
        $data->number_graduates = $request->number_graduates;
        $data->congruence = $request->congruence;
        $data->competence1 = $request->competence1 ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
        $data->competence2 = $request->competence2 ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
        $data->competence3 = $request->competence3 ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
        $data->competence4 = $request->competence4 ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
        $data->competence5 = $request->competence5 ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
        $data->competence6 = $request->competence6 ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
        $data->competence7 = $request->competence7 ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
        $data->competence8 = $request->competence8 ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
        $data->most_demanded_career = $request->most_demanded_career;
        $data->save();

        $id = $data->id;

        if ($request->career != null) {
            $countCareer = count($request->career);
            if ($countCareer != null) {
                for ($i = 0; $i < $countCareer; $i++) {
                    $dataStudent = new CompanyGraduatesWorking();
                    $dataStudent->company_survey_id = $id;
                    $dataStudent->career = $request->career[$i];
                    $dataStudent->level =  $request->level[$i];
                    $dataStudent->total =  trim($request->total[$i]);
                    $dataStudent->save();
                }
            }
        }

        $this->updateSurveyStatus(2);

        $this->notification['message'] = 'Encuesta *Ubicación Laboral de los Egresados* realizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('company.index')->with($this->notification);
    }

    public function surveyEdit()
    {
        $data['constants'] = Constants::getConstants();
        $data['userData'] = CompanySurveyTwo::where('user_id', $this->user->id)->first();
        $data['userDataGraduates'] = CompanyGraduatesWorking::where('company_survey_id', $data['userData']->id)->get();
        $data['careers'] = Career::pluck('name');
        return view('backend.survey.company_2.survey_two_company_edit', $data);
    }

    public function surveyUpdate(Request $request)
    {
        $editData = CompanySurveyTwo::where('user_id', $this->user->id)->first();
        $id = $editData->id;

        $editData->number_graduates = $request->number_graduates;
        $editData->congruence = $request->congruence;
        $editData->competence1 = $request->competence1 ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
        $editData->competence2 = $request->competence2 ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
        $editData->competence3 = $request->competence3 ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
        $editData->competence4 = $request->competence4 ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
        $editData->competence5 = $request->competence5 ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
        $editData->competence6 = $request->competence6 ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
        $editData->competence7 = $request->competence7 ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
        $editData->competence8 = $request->competence8 ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
        $editData->most_demanded_career = $request->most_demanded_career;
        $editData->save();

        $validateGraduates = CompanyGraduatesWorking::where('company_survey_id', $id)->get()->isEmpty();
        if ($request->career == null && !$validateGraduates) {
            $notification = array(
                'message' => 'Con un alumno ingresado no puedes dejar vacío el registro',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        } else {
            if ($request->career != null) {
                $countCareer = count($request->career);
                CompanyGraduatesWorking::where('company_survey_id', $id)->delete();
                for ($i = 0; $i < $countCareer; $i++) {
                    $dataStudent = new CompanyGraduatesWorking();
                    $dataStudent->company_survey_id = $id;
                    $dataStudent->career = $request->career[$i];
                    $dataStudent->level =  $request->level[$i];
                    $dataStudent->total =  trim($request->total[$i]);
                    $dataStudent->save();
                }
            }
        }

        $this->notification['message'] = 'Encuesta *Ubicación Laboral de los Egresados* actualizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('company.index')->with($this->notification);
    }

    public function surveyVerifiedRoute()
    {
        $data = CompanySurvey::where('user_id', $this->user->id)->first();

        return $data['survey_two_company_done'] == Constants::STATUS['Active']
            ? redirect()->route('survey.two.company.edit')
            : redirect()->route('survey.two.company.index');
    }
}
