<?php

namespace App\Http\Controllers\backend\survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SurveyOne;
use App\Models\StudentSurvey;
use App\Models\Career;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
//Enums
use App\Enums\ConstArray;
use App\Enums\Status;
use App\Enums\Language;

class SurveyOneController extends Controller
{
    public function SurveyOneView()
    {
        $data['languages'] = Language::getValues();
        $data['careers'] = Career::all();
        $data['specialties'] = Specialty::selectRaw('specialties.id_career, specialties.name as specialty, careers.name')
            ->join('careers', 'careers.id', '=', 'specialties.id_career')->get();
        $data['consts'] = ConstArray::asArray();

        return view('backend.survey.1.survey_one', $data);
    }

    public function SurveyOneStore(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->is_new_user = Status::Active;
        $user->save();

        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $validateData = $request->validate([
            'user_id' => 'required|unique:survey_ones,user_id',
            'curp' => 'required|unique:survey_ones,curp',
            'email' => 'required|unique:survey_ones,email',
        ],
            [
                'curp.unique' => 'The :attribute field can not be blank value.'
            ]);

        $data = new SurveyOne();
        $data->user_id = $request->user_id;
        $data->first_name = trim(mb_strtoupper($request->name, 'UTF-8'));
        $data->fathers_surname = trim(mb_strtoupper($request->fathers_surname, 'UTF-8'));
        $data->mothers_surname = trim(mb_strtoupper($request->mothers_surname, 'UTF-8'));
        $data->control_number = trim(Auth::user()->control_number);
        $data->birthday = $request->birthday;
        $data->curp = trim(strtoupper($request->curp));
        $data->sex = $request->sex;
        $data->marital_status = $request->marital_status;
        $data->address = trim(mb_strtoupper($request->address, 'UTF-8'));
        $data->zip_code = trim($request->zip);
        $data->suburb = trim(mb_strtoupper($request->suburb, 'UTF-8'));
        $data->state = trim(mb_strtoupper($request->state, 'UTF-8'));
        $data->city = trim(mb_strtoupper($request->city, 'UTF-8'));
        $data->municipality = trim(mb_strtoupper($request->municipality, 'UTF-8'));
        $data->phone = $request->phone == null ? $request->cellphone : $request->phone;
        $data->cellphone = $request->cellphone;
        $data->email = $request->email;
        $data->career = $request->career;
        $data->specialty = $request->specialty;
        $data->qualified = $request->qualified;
        $data->month = $request->month;
        $data->year = $request->year;
        $data->percent_english = $request->percent_english;
        $data->another_language = $request->another_language == '' ? Language::None : $request->another_language;

        if ($request->another_language == Language::None || $request->another_language == '')
            $data->percent_another_language = "0";
        else
            $data->percent_another_language = $request->percent_another_language;

        $data->software = trim(mb_strtoupper($request->software, 'UTF-8'));
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
        $data['languages'] = Language::getValues();
        $data['careers'] = Career::pluck('name', 'id');
        $data['specialties_data'] = Specialty::pluck('name', 'id');
        $data['specialties'] = Specialty::selectRaw('specialties.id_career, specialties.name as specialty, careers.name')
            ->join('careers', 'careers.id', '=', 'specialties.id_career')->get();
        $data['consts'] = ConstArray::asArray();
        return view('backend.survey.1.survey_one_edit', $data);
    }

    public function SurveyOneUpdate(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $editData = SurveyOne::all()->where('user_id', $request->user_id)->first();

        $editData->first_name = trim(mb_strtoupper($request->name, 'UTF-8'));
        $editData->fathers_surname = trim(mb_strtoupper($request->fathers_surname, 'UTF-8'));
        $editData->mothers_surname = trim(mb_strtoupper($request->mothers_surname, 'UTF-8'));
        $editData->birthday = $request->birthday;
        $editData->sex = $request->sex;
        $editData->marital_status = $request->marital_status;
        $editData->address = trim(mb_strtoupper($request->address, 'UTF-8'));
        $editData->zip_code = $request->zip;
        $editData->suburb = trim(mb_strtoupper($request->suburb, 'UTF-8'));
        $editData->state =  trim(mb_strtoupper($request->state, 'UTF-8'));
        $editData->city =  trim(mb_strtoupper($request->city, 'UTF-8'));
        $editData->municipality =  trim(mb_strtoupper($request->municipality, 'UTF-8'));
        $editData->phone = $request->phone == null ? $request->cellphone : $request->phone;
        $editData->cellphone = $request->cellphone;
        $editData->career = $request->career;
        $editData->specialty = $request->specialty;
        $editData->qualified = $request->qualified;
        $editData->month = $request->month;
        $editData->year = $request->year;
        $editData->percent_english = $request->percent_english;
        $editData->another_language = $request->another_language == '' ? Language::None : $request->another_language;

        if ($request->another_language == Language::None || $request->another_language == '')
            $editData->percent_another_language = "0";
        else
            $editData->percent_another_language = $request->percent_another_language;

        $editData->software = trim(mb_strtoupper($request->software, 'UTF-8'));
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

        if ($data['survey_one_done'] == Status::Active)
            return redirect()->route('survey.one.edit', $user_id);
        else
            return redirect()->route('survey.one.index');
    }
}
