<?php

namespace App\Http\Controllers\backend\survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SurveyFive;
use App\Models\StudentSurvey;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Enums\Status;
use App\Enums\YesNoQuestion;

class SurveyFiveController extends Controller
{
    public function SurveyFiveView()
    {
        $data['yes_no'] = YesNoQuestion::getValues();
        return view('backend.survey.5.survey_five', $data);
    }

    public function SurveyFiveStore(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $validateData = $request->validate(['user_id' => 'required|unique:survey_fives,user_id']);

        $data = new SurveyFive();
        $data->user_id = $request->user_id;
        $data->courses_yes_no = $request->courses_selector;
        $data->courses = $request->courses_selector == YesNoQuestion::Yes ? strtr($request->courses, config('global.accented_chars')) : null;

        $data->master_yes_no = $request->master_selector;
        $data->master = $request->master_selector == YesNoQuestion::Yes ? strtr($request->master, config('global.accented_chars')) : null;
        $data->save();

        $user_update = StudentSurvey::where('user_id', $request->user_id)->first();
        $user_update->survey_five_done = Status::Active;
        $user_update->save();

        $notification = array(
            'message' => 'Encuesta *Expéctativas y Actualización* realizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('student.index', $user_id_encrypt)->with($notification);
    }

    public function SurveyFiveEdit($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data['userData'] = SurveyFive::where('user_id', $id)->first();
        $data['yes_no'] = YesNoQuestion::getValues();
        return view('backend.survey.5.survey_five_edit', $data);
    }

    public function SurveyFiveUpdate(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $editData = SurveyFive::all()->where('user_id', $request->user_id)->first();
        $validateData = $request->validate(['user_id' => 'required']);

        $editData->courses_yes_no = $request->courses_selector;
        $editData->courses = $request->courses_selector == YesNoQuestion::Yes ? strtr($request->courses, config('global.accented_chars')) : null;
        $editData->master_yes_no = $request->master_selector;
        $editData->master = $request->master_selector == YesNoQuestion::Yes ? strtr($request->master, config('global.accented_chars')) : null;
        $editData->save();

        $notification = array(
            'message' => 'Encuesta *Expéctativas y Actualización* actualizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('student.index', $user_id_encrypt)->with($notification);
    }

    public function SurveyFiveVerifiedRoute($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data = StudentSurvey::where('user_id', $id)->first();

        if ($data['survey_five_done'] == Status::Active) {
            return redirect()->route('survey.five.edit', $user_id);
        } else {
            return redirect()->route('survey.five.index');
        }
    }
}
