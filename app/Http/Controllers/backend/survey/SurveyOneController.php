<?php

namespace App\Http\Controllers\backend\survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SurveyOne;
use App\Models\StudentSurvey;
use App\Models\Career;
use App\Models\Specialty;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
//Enums
use App\Enums\Status;
use App\Enums\Month;
use App\Enums\Language;
use App\Enums\MaritalStatus;
use App\Enums\YesNoQuestion;

class SurveyOneController extends Controller
{
    public function SurveyOneView()
    {
        $data['months'] = Month::getValues();
        $data['languages'] = Language::getValues();
        $data['marital_status'] = MaritalStatus::getValues();
        $data['yes_no'] = YesNoQuestion::getValues();
        $data['careers'] = Career::pluck('name', 'id');
        $data['specialties'] = Specialty::pluck('name', 'id');
        return view('backend.survey.1.survey_one', $data);
    }

    public function SurveyOneStore(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $validateData = $request->validate(['user_id' => 'required|unique:survey_ones,user_id']);

        $data = new SurveyOne();
        $data->user_id = $request->user_id;
        $data->first_name = strtr($request->name, config('global.accented_chars'));
        $data->fathers_surname = strtr($request->fathers_surname, config('global.accented_chars'));
        $data->mothers_surname = strtr($request->mothers_surname, config('global.accented_chars'));
        $data->control_number = $request->control_number;
        $data->birthday = $request->birthday;
        $data->curp = $request->curp;
        $data->sex = $request->sex;
        $data->marital_status = $request->marital_status;
        $data->address = strtr($request->address, config('global.accented_chars'));
        $data->zip_code = $request->zip;
        $data->suburb = strtr($request->suburb, config('global.accented_chars'));
        $data->state = strtr($request->state, config('global.accented_chars'));
        $data->city = strtr($request->city, config('global.accented_chars'));
        $data->municipality = strtr($request->municipality, config('global.accented_chars'));
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
        $data->percent_another_language = $request->another_language == Language::None ? "0" : $request->percent_another_language;
        $data->software = strtr($request->software, config('global.accented_chars'));
        $data->save();

        $user_update = StudentSurvey::where('user_id', $request->user_id)->first();
        $user_update->survey_one_done = Status::Active;
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
        $data['userData'] = SurveyOne::where('user_id', $id)->first();
        $data['months'] = Month::getValues();
        $data['languages'] = Language::getValues();
        $data['marital_status'] = MaritalStatus::getValues();
        $data['yes_no'] = YesNoQuestion::getValues();
        $data['careers'] = Career::pluck('name', 'id');
        $data['specialties'] = Specialty::pluck('name', 'id');
        return view('backend.survey.1.survey_one_edit', $data);
    }

    public function SurveyOneUpdate(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $editData = SurveyOne::all()->where('user_id', $request->user_id)->first();
        $validateData = $request->validate(['user_id' => 'required']);

        $editData->first_name = strtr($request->name, config('global.accented_chars'));
        $editData->fathers_surname = strtr($request->fathers_surname, config('global.accented_chars'));
        $editData->mothers_surname = strtr($request->mothers_surname, config('global.accented_chars'));
        $editData->control_number = $request->control_number;
        $editData->birthday = $request->birthday;
        $editData->curp = $request->curp;
        $editData->sex = $request->sex;
        $editData->marital_status = $request->marital_status;
        $editData->address = strtr($request->address, config('global.accented_chars'));
        $editData->zip_code = $request->zip;
        $editData->suburb = strtr($request->suburb, config('global.accented_chars'));
        $editData->state = strtr($request->state, config('global.accented_chars'));
        $editData->city = strtr($request->city, config('global.accented_chars'));
        $editData->municipality = strtr($request->municipality, config('global.accented_chars'));
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
        $editData->percent_another_language = $request->another_language == Language::None ? "0" : $request->percent_another_language;
        $editData->software = strtr($request->software, config('global.accented_chars'));
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
        $data = StudentSurvey::where('user_id', $id)->first();

        if ($data['survey_one_done'] == Status::Active) {
            return redirect()->route('survey.one.edit', $user_id);
        } else {
            return redirect()->route('survey.one.index');
        }
    }
}
