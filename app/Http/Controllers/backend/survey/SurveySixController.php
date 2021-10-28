<?php

namespace App\Http\Controllers\backend\survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SurveySix;
use App\Models\StudentSurvey;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class SurveySixController extends Controller
{
    public function SurveySixView()
    {
        return view('backend.survey.6.survey_six');
    }

    public function SurveySixStore(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $validateData = $request->validate(['user_id' => 'required|unique:survey_sixes,user_id']);

        $data = new SurveySix();
        $data->user_id = $request->user_id;
        $data->organization_yes_no = $request->organization_selector;
        $data->organization = $request->organization_selector == "Si" ? $request->organization : null;

        $data->agency_yes_no = $request->agency_selector;
        $data->agency = $request->agency_selector == "Si" ? $request->agency : null;

        $data->association_yes_no = $request->association_selector;
        $data->association = $request->association_selector == "Si" ? $request->association : null;
        $data->save();

        $user_update = StudentSurvey::where('user_id', $request->user_id)->firstOrFail();
        $user_update->survey_six_done = 1;
        $user_update->save();

        $notification = array(
            'message' => 'Encuesta *Participación Social* realizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('student.index', $user_id_encrypt)->with($notification);
    }

    public function SurveySixEdit($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data['userData'] = SurveySix::where('user_id', $id)->get();
        return view('backend.survey.6.survey_six_edit', $data);
    }

    public function SurveySixUpdate(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $editData = SurveySix::all()->where('user_id', $request->user_id)->first();
        $validateData = $request->validate(['user_id' => 'required']);

        $editData->organization_yes_no = $request->organization_selector;
        $editData->organization = $request->organization_selector == "Si" ? $request->organization : null;

        $editData->agency_yes_no = $request->agency_selector;
        $editData->agency = $request->agency_selector == "Si" ? $request->agency : null;

        $editData->association_yes_no = $request->association_selector;
        $editData->association = $request->association_selector == "Si" ? $request->association : null;
        $editData->save();

        $notification = array(
            'message' => 'Encuesta *Participación Social* actualizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('student.index', $user_id_encrypt)->with($notification);
    }

    public function SurveySixVerifiedRoute($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data['userSurvey'] = StudentSurvey::where('user_id', $id)->get();

        if ($data['userSurvey']['0']['survey_six_done'] == 1) {
            return redirect()->route('survey.six.edit', $user_id);
        } else {
            return redirect()->route('survey.six.index');
        }
    }
}
