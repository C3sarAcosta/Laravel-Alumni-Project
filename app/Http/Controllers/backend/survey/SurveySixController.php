<?php

namespace App\Http\Controllers\backend\survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SurveySix;
use App\Models\StudentSurvey;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Enums\Status;
use App\Enums\ConstArray;

class SurveySixController extends Controller
{
    public function SurveySixView()
    {
        $data['consts'] = ConstArray::asArray();
        return view('backend.survey.6.survey_six', $data);
    }

    public function SurveySixStore(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->is_new_user = Status::Active;
        $user->save();

        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $validateData = $request->validate(['user_id' => 'required|unique:survey_sixes,user_id']);

        $data = new SurveySix();
        $data->user_id = $request->user_id;
        $data->organization_yes_no = $request->organization_selector;
        $data->organization = $request->organization_selector == "SÍ" ? trim($request->organization) : null;

        $data->agency_yes_no = $request->agency_selector;
        $data->agency = $request->agency_selector == "SÍ" ? trim($request->agency) : null;

        $data->association_yes_no = $request->association_selector;
        $data->association = $request->association_selector == "SÍ" ? trim($request->association) : null;

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
        $data['consts'] = ConstArray::asArray();
        return view('backend.survey.6.survey_six_edit', $data);
    }

    public function SurveySixUpdate(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $editData = SurveySix::all()->where('user_id', $request->user_id)->first();
        $validateData = $request->validate(['user_id' => 'required']);

        $editData->organization_yes_no = $request->organization_selector;
        $editData->organization = $request->organization_selector == "SÍ" ? trim($request->organization) : null;

        $editData->agency_yes_no = $request->agency_selector;      
        $editData->agency = $request->agency_selector == "SÍ" ? trim($request->agency) : null;

        $editData->association_yes_no = $request->association_selector;    
        $editData->association = $request->association_selector == "SÍ" ? trim($request->association) : null;

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

        if ($data['survey_six_done'] == Status::Active)
            return redirect()->route('survey.six.edit', $user_id);
        else
            return redirect()->route('survey.six.index');
    }
}
