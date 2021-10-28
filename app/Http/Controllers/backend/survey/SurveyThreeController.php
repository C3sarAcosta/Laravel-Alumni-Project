<?php

namespace App\Http\Controllers\backend\survey;

use App\Http\Controllers\Controller;
use App\Models\SurveyThree;
use App\Models\StudentSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class SurveyThreeController extends Controller
{
    //Survey Three
    public function SurveyThreeView()
    {
        return view('backend.survey.3.survey_three');
    }

    public function SurveyThreeStore(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $validateData = $request->validate(['user_id' => 'required|unique:survey_threes,user_id']);

        $data = new SurveyThree();
        $data->user_id = $request->user_id;
        $data->do_for_living = $request->do_for_living;

        if ($request->do_for_living != "No estudia ni trabaja") {
            if (str_contains($request->do_for_living, "Estudia")) {
                $data->speciality = $request->speciality;
                $data->school = $request->school;
            }
            if (str_contains($request->do_for_living, "trabaja")) {
                $data->long_take_job = $request->long_take_job;
                $data->competence1 = $request->competence1 == true ? 1 : 0;
                $data->competence2 = $request->competence2 == true ? 1 : 0;
                $data->competence3 = $request->competence3 == true ? 1 : 0;
                $data->competence4 = $request->competence4 == true ? 1 : 0;
                $data->competence5 = $request->competence5 == true ? 1 : 0;
                $data->competence6 = $request->competence6 == true ? 1 : 0;
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
                $data->business_name = $request->business_name;
                $data->business_activity = $request->business_activity;
                $data->address = $request->address;
                $data->zip = $request->zip;
                $data->suburb = $request->suburb;
                $data->state = $request->state;
                $data->city = $request->city;
                $data->municipality = $request->municipality;
                $data->phone = $request->phone;
                $data->fax = $request->fax;
                $data->web_page = $request->web_page;
                $data->boss_email = $request->boss_email;
                $data->business_structure = $request->business_structure;
                $data->company_size = $request->company_size;
                $data->business_activity_selector = $request->business_activity_selector;
            }
        }

        $data->save();

        $user_update = StudentSurvey::where('user_id', $request->user_id)->firstOrFail();
        $user_update->survey_three_done = 1;
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
        $data['userData'] = SurveyThree::where('user_id', $id)->get();
        return view('backend.survey.3.survey_three_edit', $data);
    }

    public function SurveyThreeUpdate(Request $request)
    {
        $user_id_encrypt = Crypt::encrypt(Auth::user()->id);
        $editData = SurveyThree::all()->where('user_id', $request->user_id)->first();
        $validateData = $request->validate(['user_id' => 'required']);

        $editData->do_for_living = $request->do_for_living;

        if ($request->do_for_living != "No estudia ni trabaja") {
            if (str_contains($request->do_for_living, "Estudia")) {
                $editData->speciality = $request->speciality;
                $editData->school = $request->school;
            }
            if (str_contains($request->do_for_living, "trabaja")) {
                $editData->long_take_job = $request->long_take_job;
                $editData->competence1 = $request->competence1 == true ? 1 : 0;
                $editData->competence2 = $request->competence2 == true ? 1 : 0;
                $editData->competence3 = $request->competence3 == true ? 1 : 0;
                $editData->competence4 = $request->competence4 == true ? 1 : 0;
                $editData->competence5 = $request->competence5 == true ? 1 : 0;
                $editData->competence6 = $request->competence6 == true ? 1 : 0;
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
                $editData->business_name = $request->business_name;
                $editData->business_activity = $request->business_activity;
                $editData->address = $request->address;
                $editData->zip = $request->zip;
                $editData->suburb = $request->suburb;
                $editData->state = $request->state;
                $editData->city = $request->city;
                $editData->municipality = $request->municipality;
                $editData->phone = $request->phone;
                $editData->fax = $request->fax;
                $editData->web_page = $request->web_page;
                $editData->boss_email = $request->boss_email;
                $editData->business_structure = $request->business_structure;
                $editData->company_size = $request->company_size;
                $editData->business_activity_selector = $request->business_activity_selector;
            }
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
        $data['userSurvey'] = StudentSurvey::where('user_id', $id)->get();

        if ($data['userSurvey']['0']['survey_three_done'] == 1) {
            return redirect()->route('survey.three.edit', $user_id);
        } else {
            return redirect()->route('survey.three.index');
        }
    }
}
