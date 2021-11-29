<?php

namespace App\Http\Controllers\backend\survey;

use App\Http\Controllers\Controller;
use App\Models\CompanySurveyOne;
use App\Models\CompanySurvey;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Enums\Status;
use App\Enums\BusinessActivity;
use App\Enums\ConstArray;

class CompanySurveyOneController extends Controller
{
    public function CompanySurveyOneView()
    {
        $data['consts'] = ConstArray::asArray();
        $data['business_activity'] = BusinessActivity::getValues();
        return view('backend.survey.company_1.survey_one_company', $data);
    }

    public function CompanySurveyOneStore(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->is_new_user = Status::Active;
        $user->save();

        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $validateData = $request->validate(['user_id' => 'required|unique:company_survey_ones,user_id']);

        $data = new CompanySurveyOne();
        $data->user_id = $request->user_id;

        $data->business_name = trim(mb_strtoupper($request->business_name, 'UTF-8'));
        $data->address = trim(mb_strtoupper($request->address, 'UTF-8'));
        $data->zip = trim($request->zip);
        $data->suburb = trim(mb_strtoupper($request->suburb, 'UTF-8'));
        $data->state = trim(mb_strtoupper($request->state, 'UTF-8'));
        $data->city = trim(mb_strtoupper($request->city, 'UTF-8'));
        $data->municipality = trim(mb_strtoupper($request->municipality, 'UTF-8'));
        $data->phone = trim($request->phone);
        $data->email = trim($request->email);
        $data->business_structure = $request->business_structure;
        $data->company_size = $request->company_size;
        $data->business_activity_selector = $request->business_activity_selector;

        $data->save();

        $user_update = CompanySurvey::where('user_id', $request->user_id)->first();
        $user_update->survey_one_company_done = Status::Active;
        $user_update->save();

        $notification = array(
            'message' => 'Encuesta *Datos generales de la empresa* realizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('company.index', $user_id_encrypt)->with($notification);
    }

    public function CompanySurveyOneEdit($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data['consts'] = ConstArray::asArray();
        $data['business_activity'] = BusinessActivity::getValues();
        $data['userData'] = CompanySurveyOne::where('user_id', $id)->first();
        return view('backend.survey.company_1.survey_one_company_edit', $data);
    }

    public function CompanySurveyOneUpdate(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $editData = CompanySurveyOne::all()->where('user_id', $request->user_id)->first();
        $validateData = $request->validate(['user_id' => 'required']);

        $editData->business_name = trim(mb_strtoupper($request->business_name, 'UTF-8'));
        $editData->address = trim(mb_strtoupper($request->address, 'UTF-8'));
        $editData->zip = trim($request->zip);
        $editData->suburb = trim(mb_strtoupper($request->suburb, 'UTF-8'));
        $editData->state = trim(mb_strtoupper($request->state, 'UTF-8'));
        $editData->city = trim(mb_strtoupper($request->city, 'UTF-8'));
        $editData->municipality = trim(mb_strtoupper($request->municipality, 'UTF-8'));
        $editData->phone = trim($request->phone);
        $editData->email = trim($request->email);
        $editData->business_structure = $request->business_structure;
        $editData->company_size = $request->company_size;
        $editData->business_activity_selector = $request->business_activity_selector;

        $editData->save();

        $notification = array(
            'message' => 'Encuesta *Datos generales de la empresa* actualizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('company.index', $user_id_encrypt)->with($notification);
    }

    public function CompanySurveyOneVerifiedRoute($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data = CompanySurvey::where('user_id', $id)->first();

        if ($data['survey_one_company_done'] == Status::Active)
            return redirect()->route('survey.one.company.edit', $user_id);
        else
            return redirect()->route('survey.one.company.index');
    }
}
