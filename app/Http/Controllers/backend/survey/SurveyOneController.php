<?php

namespace App\Http\Controllers\backend\survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SurveyOne;
use App\Models\StudentSurvey;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class SurveyOneController extends Controller
{
    public function SurveyOneView()
    {
        return view('backend.survey.1.survey_one');
    }

    public function SurveyOneStore(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $validateData = $request->validate(['user_id' => 'required|unique:survey_ones,user_id']);

        $data = new SurveyOne();
        $data->user_id = $request->user_id;
        $data->first_name = $request->name;
        $data->fathers_surname = $request->fathers_surname;
        $data->mothers_surname = $request->mothers_surname;
        $data->control_number = $request->control_number;
        $data->birthday = $request->birthday;
        $data->curp = $request->curp;
        $data->sex = $request->sex;
        $data->marital_status = $request->marital_status;
        $data->address = $request->address;
        $data->zip_code = $request->zip;
        $data->suburb = $request->suburb;
        $data->state = $request->state;
        $data->city = $request->city;
        $data->municipality = $request->municipality;
        $data->phone = $request->phone;
        $data->cellphone = $request->cellphone;
        $data->email = $request->email;
        $data->career = $request->career;
        $data->specialty = $request->specialty;
        $data->qualified = $request->qualified;
        $data->month = $request->month;
        $data->year = $request->year;
        $data->percent_english = $request->percent_english;
        $data->another_language = $request->another_language;
        $data->percent_another_language = $request->another_language == "Ninguno" ? "0" : $request->percent_another_language;
        $data->software = $request->software;
        $data->save();

        $user_update = StudentSurvey::where('user_id', $request->user_id)->firstOrFail();
        $user_update->survey_one_done = 1;
        $user_update->save();

        $notification = array(
            'message' => 'Encuesta *Perfil del Egresado* realizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('student.index', $user_id_encrypt)->with($notification);
    }

    public function SurveyOneEdit($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data['userData'] = SurveyOne::where('user_id', $id)->get();
        return view('backend.survey.1.survey_one_edit', $data);
    }

    public function SurveyOneUpdate(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $editData = SurveyOne::all()->where('user_id', $request->user_id)->first();
        $validateData = $request->validate(['user_id' => 'required']);

        $editData->first_name = $request->name;
        $editData->fathers_surname = $request->fathers_surname;
        $editData->mothers_surname = $request->mothers_surname;
        $editData->control_number = $request->control_number;
        $editData->birthday = $request->birthday;
        $editData->curp = $request->curp;
        $editData->sex = $request->sex;
        $editData->marital_status = $request->marital_status;
        $editData->address = $request->address;
        $editData->zip_code = $request->zip;
        $editData->suburb = $request->suburb;
        $editData->state = $request->state;
        $editData->city = $request->city;
        $editData->municipality = $request->municipality;
        $editData->phone = $request->phone;
        $editData->cellphone = $request->cellphone;
        $editData->email = $request->email;
        $editData->career = $request->career;
        $editData->specialty = $request->specialty;
        $editData->qualified = $request->qualified;
        $editData->month = $request->month;
        $editData->year = $request->year;
        $editData->percent_english = $request->percent_english;
        $editData->another_language = $request->another_language;
        $editData->percent_another_language = $request->another_language == "Ninguno" ? "0" : $request->percent_another_language;
        $editData->software = $request->software;
        $editData->save();

        $notification = array(
            'message' => 'Encuesta *Perfil del Egresado* actualizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('student.index', $user_id_encrypt)->with($notification);
    }

    public function SurveyOneVerifiedRoute($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data['userSurvey'] = StudentSurvey::where('user_id', $id)->get();

        if ($data['userSurvey']['0']['survey_one_done'] == 1) {
            return  redirect()->route('survey.one.edit', $user_id);
        } else {
            return redirect()->route('survey.one.index');
        }
    }
}
