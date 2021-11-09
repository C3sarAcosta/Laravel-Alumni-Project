<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use App\Models\StudentSurvey;
use App\Enums\Status;

class StudentController extends Controller
{

    public function StudentIndexView($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data['studentSurvey'] = StudentSurvey::where('user_id', $id)->first();

        if (empty($data['studentSurvey'])) {
            $user_survey = new StudentSurvey();
            $user_survey->user_id = $id;
            $user_survey->survey_one_done = Status::Inactive;
            $user_survey->survey_two_done = Status::Inactive;
            $user_survey->survey_three_done = Status::Inactive;
            $user_survey->survey_four_done = Status::Inactive;
            $user_survey->survey_five_done = Status::Inactive;
            $user_survey->survey_six_done = Status::Inactive;
            $user_survey->survey_seven_done = Status::Inactive;
            $user_survey->survey_eight_done = Status::Inactive;
            $user_survey->save();

            $data['studentSurvey'] = StudentSurvey::where('user_id', $id)->first();
        }

        return view('student.index', $data);
    }

    public function StudentProfileView()
    {
        return view('student.show');
    }

    public function StudentLogout()
    {
        Auth::logout();
        Session::flush();
        return Redirect()->route('login');
    }

    public function JobsView()
    {
        return view('backend.jobs.view_jobs');
    }
}
