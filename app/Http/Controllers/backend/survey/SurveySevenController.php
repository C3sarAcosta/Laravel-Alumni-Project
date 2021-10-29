<?php

namespace App\Http\Controllers\backend\survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SurveySeven;
use App\Models\StudentSurvey;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class SurveySevenController extends Controller
{
    public function SurveySevenView()
    {
        return view('backend.survey.7.survey_seven');
    }

    public function SurveySevenStore(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $validateData = $request->validate(['user_id' => 'required|unique:survey_sevens,user_id']);

        $data = new SurveySeven();
        $data->user_id = $request->user_id;
        $data->comments = $request->comments;
        $data->save();

        $user_update = StudentSurvey::where('user_id', $request->user_id)->firstOrFail();
        $user_update->survey_seven_done = 1;
        $user_update->save();

        $notification = array(
            'message' => 'Encuesta *Comentarios y Sugerencias* realizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('student.index', $user_id_encrypt)->with($notification);
    }

    public function SurveySevenEdit($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data['userData'] = SurveySeven::where('user_id', $id)->get();
        return view('backend.survey.7.survey_seven_edit', $data);
    }

    public function SurveySevenUpdate(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $editData = SurveySeven::all()->where('user_id', $request->user_id)->first();
        $validateData = $request->validate(['user_id' => 'required']);

        if($request->comments!= null || $request->comments!=""){
            $editData->comments = $request->comments;
            $editData->save();
        }

        $notification = array(
            'message' => 'Encuesta *Comentarios y Sugerencias* actualizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('student.index', $user_id_encrypt)->with($notification);
    }

    public function SurveySevenVerifiedRoute($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data['userSurvey'] = StudentSurvey::where('user_id', $id)->get();

        if ($data['userSurvey']['0']['survey_seven_done'] == 1) {
            return redirect()->route('survey.seven.edit', $user_id);
        } else {
            return redirect()->route('survey.seven.index');
        }
    }
}
