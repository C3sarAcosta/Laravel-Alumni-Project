<?php

namespace App\Http\Controllers\backend\survey\graduate;

use App\Http\Controllers\backend\survey\BaseController;
use App\Models\SurveyThree;
use App\Models\StudentSurvey;
use Illuminate\Http\Request;
use App\Models\User;
//Constants
use App\Constants\Constants;

class SurveyThreeController extends BaseController
{
    protected $work = Constants::DO_FOR_LIVING['Work'];
    protected $Study = Constants::DO_FOR_LIVING['Study'];
    protected $workAndStudy = Constants::DO_FOR_LIVING['WorkAndStudy'];
    protected $notWorkStudy = Constants::DO_FOR_LIVING['NotWorkStudy'];

    public function surveyView()
    {
        $data['constants'] = Constants::getConstants();
        return view('backend.survey.3.survey_three', $data);
    }

    public function surveyStore(Request $request)
    {
        (new User)->newUser();

        $data = new SurveyThree();
        $data->user_id = $this->user->id;
        $data->do_for_living = $request->do_for_living;

        if(preg_match("({$this->work}|{$this->study}|{$this->workAndStudy})", $request->do_for_living) == 1 ){
            if(str_contains($request->do_for_living, $this->work)){
                $data->long_take_job = $request->long_take_job;
                $data->hear_about = $request->hear_about;
                $data->competence1 = $request->competence1 == true ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
                $data->competence2 = $request->competence2 == true ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
                $data->competence3 = $request->competence3 == true ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
                $data->competence4 = $request->competence4 == true ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
                $data->competence5 = $request->competence5 == true ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
                $data->competence6 = $request->competence6 == true ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
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
                $data->business_name = trim(strtoupper($request->business_name));
                $data->business_activity = trim($request->business_activity);
                $data->address = trim(strtoupper($request->address));
                $data->zip = trim($request->zip);
                $data->suburb = trim(strtoupper($request->suburb));
                $data->state = trim(strtoupper($request->state));
                $data->city = trim(strtoupper($request->city));
                $data->municipality = trim(strtoupper($request->municipality));
                $data->phone = trim($request->phone);
                $data->fax = trim($request->fax);
                $data->web_page = trim($request->web_page);
                $data->boss_email = trim($request->boss_email);
                $data->business_structure = $request->business_structure;
                $data->company_size = $request->company_size;
                $data->business_activity_selector = $request->business_activity_selector;
            }

            if (str_contains($request->do_for_living, $this->study)) {
                $data->speciality = $request->speciality;
                $data->school = trim($request->school);
            }
        }

        $data->save();

        $this->updateSurveyStatus(3);

        $this->notification['message'] = 'Encuesta *Ubicación Laboral* realizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('graduate.index')->with($this->notification);
    }

    public function surveyEdit()
    {
        $id = $this->user->id;;
        $data['constants'] = Constants::getConstants();
        $data['userData'] = SurveyThree::where('user_id', $id)->first();
        return view('backend.survey.3.survey_three_edit', $data);
    }

    public function surveyUpdate(Request $request)
    {
        $editData = SurveyThree::where('user_id', $this->user->id)->first();
        $editData->do_for_living = $request->do_for_living;
        
        switch ($request->do_for_living) {
            case $this->notWorkStudy:
                $editData->speciality = null;
                $editData->school = null;
                $editData->long_take_job = null;
                $editData->hear_about = null;
                $editData->competence1 = Constants::STATUS['Inactive'];
                $editData->competence2 = Constants::STATUS['Inactive'];
                $editData->competence3 = Constants::STATUS['Inactive'];
                $editData->competence4 = Constants::STATUS['Inactive'];
                $editData->competence5 = Constants::STATUS['Inactive'];
                $editData->competence6 = Constants::STATUS['Inactive'];
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

            case $this->workAndStudy:
                $editData->speciality = $request->speciality;
                $editData->school = trim($request->school);
                $editData->long_take_job = $request->long_take_job;
                $editData->hear_about = $request->hear_about;
                $editData->competence1 = $request->competence1 == true ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
                $editData->competence2 = $request->competence2 == true ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
                $editData->competence3 = $request->competence3 == true ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
                $editData->competence4 = $request->competence4 == true ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
                $editData->competence5 = $request->competence5 == true ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
                $editData->competence6 = $request->competence6 == true ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
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
                $editData->business_name = trim(strtoupper($request->business_name));
                $editData->business_activity = trim($request->business_activity);
                $editData->address = trim(strtoupper($request->address));
                $editData->zip = trim($request->zip);
                $editData->suburb = trim(strtoupper($request->suburb));
                $editData->state = trim(strtoupper($request->state));
                $editData->city = trim(strtoupper($request->city));
                $editData->municipality = trim(strtoupper($request->municipality));
                $editData->phone = trim($request->phone);
                $editData->fax = trim($request->fax);
                $editData->web_page = trim($request->web_page);
                $editData->boss_email = trim($request->boss_email);
                $editData->business_structure = $request->business_structure;
                $editData->company_size = $request->company_size;
                $editData->business_activity_selector = $request->business_activity_selector;
                break;

            case $this->study:
                $editData->speciality = $request->speciality;
                $editData->school = trim($request->school);
                $editData->long_take_job = null;
                $editData->hear_about = null;
                $editData->competence1 = Constants::STATUS['Inactive'];
                $editData->competence2 = Constants::STATUS['Inactive'];
                $editData->competence3 = Constants::STATUS['Inactive'];
                $editData->competence4 = Constants::STATUS['Inactive'];
                $editData->competence5 = Constants::STATUS['Inactive'];
                $editData->competence6 = Constants::STATUS['Inactive'];
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

            case $this->work:
                $editData->speciality = null;
                $editData->school = null;
                $editData->long_take_job = $request->long_take_job;
                $editData->hear_about = $request->hear_about;
                $editData->competence1 = $request->competence1 == true ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
                $editData->competence2 = $request->competence2 == true ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
                $editData->competence3 = $request->competence3 == true ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
                $editData->competence4 = $request->competence4 == true ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
                $editData->competence5 = $request->competence5 == true ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
                $editData->competence6 = $request->competence6 == true ? Constants::STATUS['Active'] : Constants::STATUS['Inactive'];
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
                $editData->business_name = trim(strtoupper($request->business_name));
                $editData->business_activity = trim($request->business_activity);
                $editData->address = trim(strtoupper($request->address));
                $editData->zip = trim($request->zip);
                $editData->suburb = trim(strtoupper($request->suburb));
                $editData->state = trim(strtoupper($request->state));
                $editData->city = trim(strtoupper($request->city));
                $editData->municipality = trim(strtoupper($request->municipality));
                $editData->phone = trim($request->phone);
                $editData->fax = trim($request->fax);
                $editData->web_page = trim($request->web_page);
                $editData->boss_email = trim($request->boss_email);
                $editData->business_structure = $request->business_structure;
                $editData->company_size = $request->company_size;
                $editData->business_activity_selector = $request->business_activity_selector;
                break;
        }

        $editData->save();

        $this->notification['message'] = 'Encuesta *Ubicación Laboral* actualizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('graduate.index')->with($this->notification);
    }

    public function surveyVerifiedRoute()
    {
        $id = $this->user->id;;
        $data = StudentSurvey::where('user_id', $id)->first();

        return $data['survey_three_done'] == Constants::STATUS['Active']
            ? redirect()->route('survey.three.edit')
            : redirect()->route('survey.three.index');
    }
}
