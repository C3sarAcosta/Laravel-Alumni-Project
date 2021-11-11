<?php

namespace App\Http\Controllers\backend\survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanySurveyTwo;
use App\Models\CompanySurvey;
use App\Models\Career;
use App\Models\User;
use App\Models\CompanyGraduatesWorking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Enums\Status;
use App\Enums\ConstArray;

class CompanySurveyTwoController extends Controller
{
    public function CompanySurveyTwoView()
    {
        $data['consts'] = ConstArray::asArray();
        $data['careers'] = Career::pluck('name');
        return view('backend.survey.company_2.survey_two_company', $data);
    }

    public function CompanySurveyTwoStore(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->is_new_user = Status::Active;
        $user->save();

        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $validateData = $request->validate(['user_id' => 'required|unique:company_survey_twos,user_id']);

        $data = new CompanySurveyTwo();
        $data->user_id = $request->user_id;
        $data->number_graduates = $request->number_graduates;
        $data->congruence = $request->congruence;
        $data->requirements = $request->requirements;
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
                    $dataStudent->amount =  $request->amount[$i];
                    $dataStudent->save();
                }
            }
        }

        $user_update = CompanySurvey::where('user_id', $request->user_id)->first();
        $user_update->survey_two_company_done = Status::Active;
        $user_update->save();

        $notification = array(
            'message' => 'Encuesta *Ubicación Laboral de los Egresados* realizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('company.index', $user_id_encrypt)->with($notification);
    }

    public function CompanySurveyTwoEdit($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data['consts'] = ConstArray::asArray();
        $data['userData'] = CompanySurveyTwo::where('user_id', $id)->first();
        $data['userDataGraduates'] = CompanyGraduatesWorking::where('company_survey_id', $data['userData']->id)->get();
        $data['careers'] = Career::pluck('name');
        return view('backend.survey.company_2.survey_two_company_edit', $data);
    }

    public function CompanySurveyTwoUpdate(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $editData = CompanySurveyTwo::all()->where('user_id', $request->user_id)->first();
        $validateData = $request->validate(['user_id' => 'required']);
        $id = $editData->id;

        $editData->number_graduates = $request->number_graduates;
        $editData->congruence = $request->congruence;
        $editData->requirements = $request->requirements;
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
                    $dataStudent->amount =  $request->amount[$i];
                    $dataStudent->save();
                }
            }
        }
        $notification = array(
            'message' => 'Encuesta *Ubicación Laboral de los Egresados* actualizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('company.index', $user_id_encrypt)->with($notification);
    }

    public function CompanySurveyTwoVerifiedRoute($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data = CompanySurvey::where('user_id', $id)->first();

        if ($data['survey_two_company_done'] == Status::Active) {
            return redirect()->route('survey.two.company.edit', $user_id);
        } else {
            return redirect()->route('survey.two.company.index');
        }
    }
}
