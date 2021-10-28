<?php

namespace App\Http\Controllers\backend\survey;

use App\Http\Controllers\Controller;
use App\Models\SurveyTwo;
use App\Models\StudentSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;


class SurveyTwoController extends Controller
{
    public function SurveyTwoView()
    {
        return view('backend.survey.2.survey_two');
    }

    public function SurveyTwoStore(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $validateData = $request->validate(['user_id' => 'required|unique:survey_twos,user_id']);

        $data = new SurveyTwo();
        $data->user_id = $request->user_id;
        $data->quality_teachers = $request->quality_teachers;
        $data->syllabus = $request->syllabus;
        $data->study_condition = $request->study_condition;
        $data->experience = $request->experience;
        $data->study_emphasis = $request->study_emphasis;
        $data->participate_projects = $request->participate_projects;
        $data->save();

        $user_update = StudentSurvey::where('user_id', $request->user_id)->firstOrFail();
        $user_update->survey_two_done = 1;
        $user_update->save();

        $notification = array(
            'message' => 'Encuesta *Pertenencia y Disponibilidad* realizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('student.index', $user_id_encrypt)->with($notification);
    }

    public function SurveyTwoEdit($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data['userData'] = SurveyTwo::where('user_id', $id)->get();
        return view('backend.survey.2.survey_two_edit', $data);
    }

    public function SurveyTwoUpdate(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $editData = SurveyTwo::all()->where('user_id', $request->user_id)->first();
        $validateData = $request->validate(['user_id' => 'required']);

        $editData->quality_teachers = $request->quality_teachers;
        $editData->syllabus = $request->syllabus;
        $editData->study_condition = $request->study_condition;
        $editData->experience = $request->experience;
        $editData->study_emphasis = $request->study_emphasis;
        $editData->participate_projects = $request->participate_projects;
        $editData->save();

        $notification = array(
            'message' => 'Encuesta *Pertenencia y Disponibilidad* actualizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('student.index', $user_id_encrypt)->with($notification);
    }

    public function SurveyTwoVerifiedRoute($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data['userSurvey'] = StudentSurvey::where('user_id', $id)->get();

        if ($data['userSurvey']['0']['survey_two_done'] == 1) {
            return redirect()->route('survey.two.edit', $user_id);
        } else {
            return redirect()->route('survey.two.index');
        }
    }
}
