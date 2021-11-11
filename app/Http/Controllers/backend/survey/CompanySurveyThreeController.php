<?php

namespace App\Http\Controllers\backend\survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanySurveyThree;
use App\Models\CompanySurvey;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Enums\Status;
use App\Enums\ConstArray;

class CompanySurveyThreeController extends Controller
{
    public function CompanySurveyThreeView()
    {
        $data['consts'] = ConstArray::asArray();
        return view('backend.survey.company_3.survey_three_company', $data);
    }

    public function CompanySurveyThreeStore(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->is_new_user = Status::Active;
        $user->save();

        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $validateData = $request->validate(['user_id' => 'required|unique:company_survey_threes,user_id']);

        $data = new CompanySurveyThree();
        $data->user_id = $request->user_id;
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
        $data->change = $request->change;
        $data->job_performance = $request->job_performance;
        $data->requirement = $request->requirement;
        $data->comments = $request->comments;

        $data->save();

        $user_update = CompanySurvey::where('user_id', $request->user_id)->first();
        $user_update->survey_three_company_done = Status::Active;
        $user_update->save();

        $notification = array(
            'message' => 'Encuesta *Competencias Laborales* realizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('company.index', $user_id_encrypt)->with($notification);
    }

    public function CompanySurveyThreeEdit($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data['userData'] = CompanySurveyThree::where('user_id', $id)->first();
        $data['consts'] = ConstArray::asArray();
        return view('backend.survey.company_3.survey_three_company_edit', $data);
    }

    public function CompanySurveyThreeUpdate(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $editData = CompanySurveyThree::all()->where('user_id', $request->user_id)->first();
        $validateData = $request->validate(['user_id' => 'required']);

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
        $editData->change = $request->change;
        $editData->job_performance = $request->job_performance;
        if (!($request->requirement == "" || $request->requirement == null)) {
            $editData->requirement = $request->requirement;
        }
        $editData->comments = $request->comments;

        $editData->save();

        $notification = array(
            'message' => 'Encuesta *Competencias Laborales* actualizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('company.index', $user_id_encrypt)->with($notification);
    }

    public function CompanySurveyThreeVerifiedRoute($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data = CompanySurvey::where('user_id', $id)->first();

        if ($data['survey_three_company_done'] == Status::Active) {
            return redirect()->route('survey.three.company.edit', $user_id);
        } else {
            return redirect()->route('survey.three.company.index');
        }
    }
}
