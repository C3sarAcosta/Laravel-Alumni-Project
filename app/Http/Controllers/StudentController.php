<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\StudentSurvey;

class StudentController extends Controller
{
    public function StudentIndexView($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data['userSurvey'] = StudentSurvey::where('user_id', $id)->get();

        if ($data['userSurvey']->isEmpty()) {
            $user_survey = new StudentSurvey();
            $user_survey->user_id = $id;
            $user_survey->survey_one_done = 2;
            $user_survey->survey_two_done = 2;
            $user_survey->survey_three_done = 2;
            $user_survey->survey_four_done = 2;
            $user_survey->survey_five_done = 2;
            $user_survey->survey_six_done = 2;
            $user_survey->survey_seven_done = 2;
            $user_survey->survey_eight_done = 2;
            $user_survey->save();

            $data['userSurvey'] = StudentSurvey::where('user_id', $id)->get();
        }

        return view('student.index', $data);
    }

    public function StudentProfileView()
    {
        //Api example
        // $usuarios = Http::get(env('API_ENDPOINT'));
        // $data['usuarios'] = $usuarios->json();
        // dd($data['usuarios']);
        return view('student.show');
    }

    public function StudentLogout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }

    public function JobsView()
    {
        return view('backend.jobs.view_jobs');
    }
}
