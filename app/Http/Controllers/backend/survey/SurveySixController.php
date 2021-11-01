<?php

namespace App\Http\Controllers\backend\survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SurveySix;
use App\Models\StudentSurvey;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Enums\Status;
use App\Enums\YesNoQuestion;

class SurveySixController extends Controller
{
    public function SurveySixView()
    {
        $data['yes_no'] = YesNoQuestion::getValues();
        return view('backend.survey.6.survey_six', $data);
    }

    public function SurveySixStore(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $validateData = $request->validate(['user_id' => 'required|unique:survey_sixes,user_id']);

        $data = new SurveySix();
        $data->user_id = $request->user_id;
        $data->organization_yes_no = $request->organization_selector;
        $data->organization = $request->organization_selector == YesNoQuestion::Yes ? strtr($request->organization, config('global.accented_chars')) : null;

        $data->agency_yes_no = $request->agency_selector;
        $data->agency = $request->agency_selector == YesNoQuestion::Yes ? strtr($request->agency, config('global.accented_chars')) : null;

        $data->association_yes_no = $request->association_selector;
        $data->association = $request->association_selector == YesNoQuestion::Yes ? strtr($request->association, config('global.accented_chars')) : null;
        $data->save();

        $user_update = StudentSurvey::where('user_id', $request->user_id)->first();
        $user_update->survey_six_done = Status::Active;
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
        $data['userData'] = SurveySix::where('user_id', $id)->first();
        $data['yes_no'] = YesNoQuestion::getValues();
        return view('backend.survey.6.survey_six_edit', $data);
    }

    public function SurveySixUpdate(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $editData = SurveySix::all()->where('user_id', $request->user_id)->first();
        $validateData = $request->validate(['user_id' => 'required']);

        $editData->organization_yes_no = $request->organization_selector;
        $editData->organization = $request->organization_selector == YesNoQuestion::Yes ? strtr($request->organization, config('global.accented_chars')) : null;

        $editData->agency_yes_no = $request->agency_selector;
        $editData->agency = $request->agency_selector == YesNoQuestion::Yes ? strtr($request->agency, config('global.accented_chars')) : null;

        $editData->association_yes_no = $request->association_selector;
        $editData->association = $request->association_selector == YesNoQuestion::Yes ? strtr($request->association, config('global.accented_chars')) : null;
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
        $data = StudentSurvey::where('user_id', $id)->first();

        if ($data['survey_six_done'] == Status::Active) {
            return redirect()->route('survey.six.edit', $user_id);
        } else {
            return redirect()->route('survey.six.index');
        }
    }
}
