<?php

namespace App\Http\Controllers\backend\survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SurveyFour;
use App\Models\StudentSurvey;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class SurveyFourController extends Controller
{
    public function SurveyFourView()
    {
        return view('backend.survey.4.survey_four');
    }

    public function SurveyFourStore(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $validateData = $request->validate(['user_id' => 'required|unique:survey_fours,user_id']);

        $data = new SurveyFour();
        $data->user_id = $request->user_id;
        $data->efficiency_work_activities = $request->efficiency_work_activities;
        $data->academic_training = $request->academic_training;
        $data->usefulness_professional_residence = $request->usefulness_professional_residence;
        $data->study_area = $request->study_area;
        $data->title = $request->title;
        $data->experience = $request->experience;
        $data->job_competence = $request->job_competence;
        $data->positioning = $request->positioning;
        $data->languages = $request->languages;
        $data->recommendations = $request->recommendations;
        $data->personality = $request->personality;
        $data->leadership = $request->leadership;
        $data->others = $request->others;
        $data->save();

        $user_update = StudentSurvey::where('user_id', $request->user_id)->firstOrFail();
        $user_update->survey_four_done = 1;
        $user_update->save();

        $notification = array(
            'message' => 'Encuesta *Desempeño Profesional* realizada con éxito',
            'alert-type' => 'success'
        );


        return redirect()->route('student.index', $user_id_encrypt)->with($notification);
    }


    public function SurveyFourEdit($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data['userData'] = SurveyFour::where('user_id', $id)->get();
        return view('backend.survey.4.survey_four_edit', $data);
    }

    public function SurveyFourUpdate(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $editData = SurveyFour::all()->where('user_id', $request->user_id)->first();
        $validateData = $request->validate(['user_id' => 'required']);

        $editData->efficiency_work_activities = $request->efficiency_work_activities;
        $editData->academic_training = $request->academic_training;
        $editData->usefulness_professional_residence = $request->usefulness_professional_residence;
        $editData->study_area = $request->study_area;
        $editData->title = $request->title;
        $editData->experience = $request->experience;
        $editData->job_competence = $request->job_competence;
        $editData->positioning = $request->positioning;
        $editData->languages = $request->languages;
        $editData->recommendations = $request->recommendations;
        $editData->personality = $request->personality;
        $editData->leadership = $request->leadership;
        $editData->others = $request->others;
        $editData->save();

        $notification = array(
            'message' => 'Encuesta *Desempeño Profesional* actualizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('student.index', $user_id_encrypt)->with($notification);
    }

    public function SurveyFourVerifiedRoute($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data['userSurvey'] = StudentSurvey::where('user_id', $id)->get();

        if ($data['userSurvey']['0']['survey_four_done'] == 1) {
            return redirect()->route('survey.four.edit', $user_id);
        } else {
            return redirect()->route('survey.four.index');
        }
    }
}
