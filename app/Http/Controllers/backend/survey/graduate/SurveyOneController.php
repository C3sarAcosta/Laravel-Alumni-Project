<?php

namespace App\Http\Controllers\backend\survey\graduate;

use App\Http\Controllers\backend\survey\BaseController;
use Illuminate\Http\Request;
use App\Models\SurveyOne;
use App\Models\StudentSurvey;
use App\Models\Career;
use App\Models\Specialty;
use App\Models\User;
use App\Models\Language;
//Constants
use App\Constants\Constants;

class SurveyOneController extends BaseController
{
    public function surveyView()
    {
        $data['careers'] = Career::all();
        $data['specialties'] = Specialty::selectRaw('specialties.id_career, specialties.name as specialty, careers.name')
            ->join('careers', 'careers.id', '=', 'specialties.id_career')->get();
        $data['languages'] = Language::where('name', '!=', 'ESPAÑOL')->orWhere('name', '!=', 'INGLÉS')->get();
        $data['constants'] = Constants::getConstants();
        return view('backend.survey.1.survey_one', $data);
    }

    public function surveyStore(Request $request)
    {
        (new User)->newUser();

        $birthday = empty(trim($request->birthday));
        $year = empty(trim($request->year));
        $software = empty(trim($request->software));

        if ($birthday || $year || $software) return $this->messageError($birthday, $year, $software);

        $surveyOne = new SurveyOne();
        $this->saveController($surveyOne, $request);
        $this->updateSurveyStatus(1);

        $this->notification['message'] = 'Encuesta *Perfil del Egresado* realizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('graduate.index')->with($this->notification);
    }

    public function surveyEdit()
    {
        $data['userData'] = SurveyOne::where('user_id', $this->user->id)->first();
        $data['careers'] = Career::pluck('name', 'id');
        $data['specialties_data'] = Specialty::pluck('name', 'id');
        $data['specialties'] = Specialty::selectRaw('specialties.id_career, specialties.name as specialty, careers.name')
            ->join('careers', 'careers.id', '=', 'specialties.id_career')->get();
        $data['languages'] = Language::where('name', '!=','ESPAÑOL')->orWhere('name', '!=', 'INGLÉS')->get();
        $data['constants'] = Constants::getConstants();
        return view('backend.survey.1.survey_one_edit', $data);
    }

    public function surveyUpdate(Request $request)
    {
        $birthday = empty(trim($request->birthday));
        $year = empty(trim($request->year));
        $software = empty(trim($request->software));

        if ($birthday || $year || $software) return $this->messageError($birthday, $year, $software);
        
        $surveyOne = SurveyOne::where('user_id', $this->user->id)->first();
        $this->saveController($surveyOne, $request);

        $this->notification['message'] = 'Encuesta *Perfil del Egresado* actualizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('graduate.index')->with($this->notification);
    }

    public function surveyVerifiedRoute()
    {
        $data = StudentSurvey::where('user_id', $this->user->id)->first();

        return $data['survey_one_done'] == Constants::STATUS['Active']
            ? redirect()->route('survey.one.edit')
            : redirect()->route('survey.one.index');
    }

    function saveController(SurveyOne $surveyOne, Request $request)
    {
        $surveyOne->user_id = $this->user->id;
        $surveyOne->first_name = trim(mb_strtoupper($request->name, 'UTF-8'));
        $surveyOne->fathers_surname = trim(mb_strtoupper($request->fathers_surname, 'UTF-8'));
        $surveyOne->mothers_surname = trim(mb_strtoupper($request->mothers_surname, 'UTF-8'));
        $surveyOne->control_number = trim($this->user->control_number);
        $surveyOne->birthday = $request->birthday;
        $surveyOne->curp = trim(strtoupper($request->curp));
        $surveyOne->sex = $request->sex;
        $surveyOne->marital_status = $request->marital_status;
        $surveyOne->address = trim(mb_strtoupper($request->address, 'UTF-8'));
        $surveyOne->zip_code = trim($request->zip);
        $surveyOne->suburb = trim(mb_strtoupper($request->suburb, 'UTF-8'));
        $surveyOne->state = trim(mb_strtoupper($request->state, 'UTF-8'));
        $surveyOne->city = trim(mb_strtoupper($request->city, 'UTF-8'));
        $surveyOne->municipality = trim(mb_strtoupper($request->municipality, 'UTF-8'));
        $surveyOne->phone = $request->phone == null ? $request->cellphone : $request->phone;
        $surveyOne->cellphone = $request->cellphone;
        $surveyOne->email = $this->user->email;
        $surveyOne->career = $request->career;
        $surveyOne->specialty = $request->specialty;
        $surveyOne->qualified = $request->qualified;
        $surveyOne->month = $request->month;
        $surveyOne->year = $request->year;
        $surveyOne->percent_english = $request->percent_english;
        $surveyOne->another_language = $request->another_language == '' ? 'NINGUNO' : $request->another_language;
        $surveyOne->percent_another_language = $request->another_language == 'NINGUNO' ? "0" : $request->percent_another_language;
        $surveyOne->software = trim(mb_strtoupper($request->software, 'UTF-8'));
        $surveyOne->save();
    }

    public function messageError($birthday, $year, $software)
    {
        $this->notification['message'] = $birthday
            ? 'Por favor ingrese su fecha de nacimiento.'
            : ($year
                ? 'Por favor ingrese su año de egreso.'
                : ($software
                    ? 'Por favor no puede dejar paquetes computacionales con información vacía.'
                    : ''));
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Error'];
        return redirect()->back()->withInput()->with($this->notification);
    }
}
