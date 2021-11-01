<?php

namespace App\Http\Controllers\backend\survey;

use App\Http\Controllers\Controller;
use App\Models\SurveyThree;
use App\Models\StudentSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Enums\Status;
use App\Enums\BusinessActivity;
use App\Enums\ConstArray;

class SurveyThreeController extends Controller
{
    public function SurveyThreeView()
    {
        $data['consts'] = ConstArray::asArray();
        $data['business_activity'] = BusinessActivity::getValues();
        return view('backend.survey.3.survey_three', $data);
    }

    public function SurveyThreeStore(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $validateData = $request->validate(['user_id' => 'required|unique:survey_threes,user_id']);

        $data = new SurveyThree();
        $data->user_id = $request->user_id;
        $data->do_for_living = $request->do_for_living;

        switch ($request->do_for_living) {
            case "ESTUDIA Y TRABAJA":
                $data->speciality = $request->speciality;
                $data->school = strtr($request->school, config('global.accented_chars'));
                $data->long_take_job = $request->long_take_job;
                $data->hear_about = $request->hear_about;
                $data->competence1 = $request->competence1 == true ? Status::Active : Status::Inactive;
                $data->competence2 = $request->competence2 == true ? Status::Active : Status::Inactive;
                $data->competence3 = $request->competence3 == true ? Status::Active : Status::Inactive;
                $data->competence4 = $request->competence4 == true ? Status::Active : Status::Inactive;
                $data->competence5 = $request->competence5 == true ? Status::Active : Status::Inactive;
                $data->competence6 = $request->competence6 == true ? Status::Active : Status::Inactive;
                $data->language_most_spoken = $request->language_most_spoken;
                $data->speak_percent = $request->speak_percent;
                $data->write_percent = $request->write_percent;
                $data->read_percent = $request->read_percent;
                $data->listen_percent = $request->listen_percent;
                $data->seniority = $request->seniority;
                $data->year = $request->year;
                $data->salary = $request->salary;
                $data->management_level = $request->management_level;
                $data->job_condition = $request->job_condition;
                $data->job_relationship = $request->job_relationship;
                $data->business_name = strtr($request->business_name, config('global.accented_chars'));
                $data->business_activity = strtr($request->business_activity, config('global.accented_chars'));
                $data->address = strtr($request->address, config('global.accented_chars'));
                $data->zip = $request->zip;
                $data->suburb = strtr($request->suburb, config('global.accented_chars'));
                $data->state = strtr($request->state, config('global.accented_chars'));
                $data->city = strtr($request->city, config('global.accented_chars'));
                $data->municipality = strtr($request->municipality, config('global.accented_chars'));
                $data->phone = $request->phone;
                $data->fax = $request->fax;
                $data->web_page = $request->web_page;
                $data->boss_email = $request->boss_email;
                $data->business_structure = $request->business_structure;
                $data->company_size = $request->company_size;
                $data->business_activity_selector = $request->business_activity_selector;
                break;

            case "ESTUDIA":
                $data->speciality = $request->speciality;
                $data->school = strtr($request->school, config('global.accented_chars'));
                break;

            case "TRABAJA":
                $data->long_take_job = $request->long_take_job;
                $data->hear_about = $request->hear_about;
                $data->competence1 = $request->competence1 == true ? Status::Active : Status::Inactive;
                $data->competence2 = $request->competence2 == true ? Status::Active : Status::Inactive;
                $data->competence3 = $request->competence3 == true ? Status::Active : Status::Inactive;
                $data->competence4 = $request->competence4 == true ? Status::Active : Status::Inactive;
                $data->competence5 = $request->competence5 == true ? Status::Active : Status::Inactive;
                $data->competence6 = $request->competence6 == true ? Status::Active : Status::Inactive;
                $data->language_most_spoken = $request->language_most_spoken;
                $data->speak_percent = $request->speak_percent;
                $data->write_percent = $request->write_percent;
                $data->read_percent = $request->read_percent;
                $data->listen_percent = $request->listen_percent;
                $data->seniority = $request->seniority;
                $data->year = $request->year;
                $data->salary = $request->salary;
                $data->management_level = $request->management_level;
                $data->job_condition = $request->job_condition;
                $data->job_relationship = $request->job_relationship;
                $data->business_name = strtr($request->business_name, config('global.accented_chars'));
                $data->business_activity = strtr($request->business_activity, config('global.accented_chars'));
                $data->address = strtr($request->address, config('global.accented_chars'));
                $data->zip = $request->zip;
                $data->suburb = strtr($request->suburb, config('global.accented_chars'));
                $data->state = strtr($request->state, config('global.accented_chars'));
                $data->city = strtr($request->city, config('global.accented_chars'));
                $data->municipality = strtr($request->municipality, config('global.accented_chars'));
                $data->phone = $request->phone;
                $data->fax = $request->fax;
                $data->web_page = $request->web_page;
                $data->boss_email = $request->boss_email;
                $data->business_structure = $request->business_structure;
                $data->company_size = $request->company_size;
                $data->business_activity_selector = $request->business_activity_selector;
                break;
        }

        $data->save();

        $user_update = StudentSurvey::where('user_id', $request->user_id)->first();
        $user_update->survey_three_done = Status::Active;
        $user_update->save();

        $notification = array(
            'message' => 'Encuesta *Ubicación Laboral* realizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('student.index', $user_id_encrypt)->with($notification);
    }

    public function SurveyThreeEdit($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data['consts'] = ConstArray::asArray();
        $data['business_activity'] = BusinessActivity::getValues();
        $data['userData'] = SurveyThree::where('user_id', $id)->first();
        return view('backend.survey.3.survey_three_edit', $data);
    }

    public function SurveyThreeUpdate(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $editData = SurveyThree::all()->where('user_id', $request->user_id)->first();
        $validateData = $request->validate(['user_id' => 'required']);

        $editData->do_for_living = $request->do_for_living;

        switch ($request->do_for_living) {
            case "NO ESTUDIA NI TRABAJA":
                $editData->speciality = null;
                $editData->school = null;
                $editData->long_take_job = null;
                $editData->hear_about = null;
                $editData->competence1 = Status::Inactive;
                $editData->competence2 = Status::Inactive;
                $editData->competence3 = Status::Inactive;
                $editData->competence4 = Status::Inactive;
                $editData->competence5 = Status::Inactive;
                $editData->competence6 = Status::Inactive;
                $editData->language_most_spoken = null;
                $editData->speak_percent = null;
                $editData->write_percent = null;
                $editData->read_percent = null;
                $editData->listen_percent = null;
                $editData->seniority = null;
                $editData->year = null;
                $editData->salary = null;
                $editData->management_level = null;
                $editData->job_condition = null;
                $editData->job_relationship = null;
                $editData->business_name = null;
                $editData->business_activity = null;
                $editData->address = null;
                $editData->zip = null;
                $editData->suburb = null;
                $editData->state = null;
                $editData->city = null;
                $editData->municipality = null;
                $editData->phone = null;
                $editData->fax = null;
                $editData->web_page = null;
                $editData->boss_email = null;
                $editData->business_structure = null;
                $editData->company_size = null;
                $editData->business_activity_selector = null;
                break;

            case "ESTUDIA Y TRABAJA":
                $editData->speciality = $request->speciality;
                $editData->school = strtr($request->school, config('global.accented_chars'));
                $editData->long_take_job = $request->long_take_job;
                $editData->hear_about = $request->hear_about;
                $editData->competence1 = $request->competence1 == true ? Status::Active : Status::Inactive;
                $editData->competence2 = $request->competence2 == true ? Status::Active : Status::Inactive;
                $editData->competence3 = $request->competence3 == true ? Status::Active : Status::Inactive;
                $editData->competence4 = $request->competence4 == true ? Status::Active : Status::Inactive;
                $editData->competence5 = $request->competence5 == true ? Status::Active : Status::Inactive;
                $editData->competence6 = $request->competence6 == true ? Status::Active : Status::Inactive;
                $editData->language_most_spoken = $request->language_most_spoken;
                $editData->speak_percent = $request->speak_percent;
                $editData->write_percent = $request->write_percent;
                $editData->read_percent = $request->read_percent;
                $editData->listen_percent = $request->listen_percent;
                $editData->seniority = $request->seniority;
                $editData->year = $request->year;
                $editData->salary = $request->salary;
                $editData->management_level = $request->management_level;
                $editData->job_condition = $request->job_condition;
                $editData->job_relationship = $request->job_relationship;
                $editData->business_name = strtr($request->business_name, config('global.accented_chars'));
                $editData->business_activity = strtr($request->business_activity, config('global.accented_chars'));
                $editData->address = strtr($request->address, config('global.accented_chars'));
                $editData->zip = $request->zip;
                $editData->suburb = strtr($request->suburb, config('global.accented_chars'));
                $editData->state = strtr($request->state, config('global.accented_chars'));
                $editData->city = strtr($request->city, config('global.accented_chars'));
                $editData->municipality = strtr($request->municipality, config('global.accented_chars'));
                $editData->phone = $request->phone;
                $editData->fax = $request->fax;
                $editData->web_page = $request->web_page;
                $editData->boss_email = $request->boss_email;
                $editData->business_structure = $request->business_structure;
                $editData->company_size = $request->company_size;
                $editData->business_activity_selector = $request->business_activity_selector;
                break;

            case "ESTUDIA":
                $editData->speciality = $request->speciality;
                $editData->school = strtr($request->school, config('global.accented_chars'));
                $editData->long_take_job = null;
                $editData->hear_about = null;
                $editData->competence1 = Status::Inactive;
                $editData->competence2 = Status::Inactive;
                $editData->competence3 = Status::Inactive;
                $editData->competence4 = Status::Inactive;
                $editData->competence5 = Status::Inactive;
                $editData->competence6 = Status::Inactive;
                $editData->language_most_spoken = null;
                $editData->speak_percent = null;
                $editData->write_percent = null;
                $editData->read_percent = null;
                $editData->listen_percent = null;
                $editData->seniority = null;
                $editData->year = null;
                $editData->salary = null;
                $editData->management_level = null;
                $editData->job_condition = null;
                $editData->job_relationship = null;
                $editData->business_name = null;
                $editData->business_activity = null;
                $editData->address = null;
                $editData->zip = null;
                $editData->suburb = null;
                $editData->state = null;
                $editData->city = null;
                $editData->municipality = null;
                $editData->phone = null;
                $editData->fax = null;
                $editData->web_page = null;
                $editData->boss_email = null;
                $editData->business_structure = null;
                $editData->company_size = null;
                $editData->business_activity_selector = null;
                break;

            case "TRABAJA":
                $editData->speciality = null;
                $editData->school = null;
                $editData->long_take_job = $request->long_take_job;
                $editData->hear_about = $request->hear_about;
                $editData->competence1 = $request->competence1 == true ? Status::Active : Status::Inactive;
                $editData->competence2 = $request->competence2 == true ? Status::Active : Status::Inactive;
                $editData->competence3 = $request->competence3 == true ? Status::Active : Status::Inactive;
                $editData->competence4 = $request->competence4 == true ? Status::Active : Status::Inactive;
                $editData->competence5 = $request->competence5 == true ? Status::Active : Status::Inactive;
                $editData->competence6 = $request->competence6 == true ? Status::Active : Status::Inactive;
                $editData->language_most_spoken = $request->language_most_spoken;
                $editData->speak_percent = $request->speak_percent;
                $editData->write_percent = $request->write_percent;
                $editData->read_percent = $request->read_percent;
                $editData->listen_percent = $request->listen_percent;
                $editData->seniority = $request->seniority;
                $editData->year = $request->year;
                $editData->salary = $request->salary;
                $editData->management_level = $request->management_level;
                $editData->job_condition = $request->job_condition;
                $editData->job_relationship = $request->job_relationship;
                $editData->business_name = strtr($request->business_name, config('global.accented_chars'));
                $editData->business_activity = strtr($request->business_activity, config('global.accented_chars'));
                $editData->address = strtr($request->address, config('global.accented_chars'));
                $editData->zip = $request->zip;
                $editData->suburb = strtr($request->suburb, config('global.accented_chars'));
                $editData->state = strtr($request->state, config('global.accented_chars'));
                $editData->city = strtr($request->city, config('global.accented_chars'));
                $editData->municipality = strtr($request->municipality, config('global.accented_chars'));
                $editData->phone = $request->phone;
                $editData->fax = $request->fax;
                $editData->web_page = $request->web_page;
                $editData->boss_email = $request->boss_email;
                $editData->business_structure = $request->business_structure;
                $editData->company_size = $request->company_size;
                $editData->business_activity_selector = $request->business_activity_selector;
                break;
        }

        $editData->save();

        $notification = array(
            'message' => 'Encuesta *Ubicación Laboral* actualizada con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('student.index', $user_id_encrypt)->with($notification);
    }

    public function SurveyThreeVerifiedRoute($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data = StudentSurvey::where('user_id', $id)->first();

        if ($data['survey_three_done'] == Status::Active) {
            return redirect()->route('survey.three.edit', $user_id);
        } else {
            return redirect()->route('survey.three.index');
        }
    }
}
