<?php

namespace App\Http\Controllers\backend\survey;

use App\Http\Controllers\Controller;
use App\Models\CompanySurveyOne;
use App\Models\CompanySurvey;
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
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $validateData = $request->validate(['user_id' => 'required|unique:company_survey_ones,user_id']);

        $data = new CompanySurveyOne();
        $data->user_id = $request->user_id;

        $data->business_name = $request->business_name;
        $data->address = $request->address;
        $data->zip = $request->zip;
        $data->suburb = $request->suburb;
        $data->state = $request->state;
        $data->city = $request->city;
        $data->municipality = $request->municipality;
        $data->phone = $request->phone;
        $data->email = $request->email;
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

        $editData->business_name = $request->business_name;
        $editData->address = $request->address;
        $editData->zip = $request->zip;
        $editData->suburb = $request->suburb;
        $editData->state = $request->state;
        $editData->city = $request->city;
        $editData->municipality = $request->municipality;
        $editData->phone = $request->phone;
        $editData->email = $request->email;
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

        if ($data['survey_one_company_done'] == Status::Active) {
            return redirect()->route('survey.one.company.edit', $user_id);
        } else {
            return redirect()->route('survey.one.company.index');
        }
    }
}
