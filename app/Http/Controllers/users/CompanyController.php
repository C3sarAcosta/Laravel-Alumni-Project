<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\users\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\CompanySurvey;
use App\Models\Postulate;
use App\Models\CompanyJobs;
use App\Models\SurveyThree;
//Constants
use App\Constants\Constants;

class CompanyController extends UserController
{
    public function index()
    {
        $id = Auth::user()->id;
        $data['jobs'] = CompanyJobs::where('id_user', $id)->get()->count();
        $data['postulates'] = Postulate::join('company_jobs', 'company_jobs.id', '=', 'postulates.job_id')
            ->where('company_jobs.id_user', $id)
            ->get()->count();
            
        $data['companySurvey'] = CompanySurvey::where('user_id', $id)->first();
        
        if (empty($data['companySurvey'])) {
            $companySurvey = new CompanySurvey();
            $companySurvey->user_id = $id;
            $companySurvey->survey_one_company_done = Constants::STATUS['Inactive'];
            $companySurvey->survey_two_company_done = Constants::STATUS['Inactive'];
            $companySurvey->survey_three_company_done = Constants::STATUS['Inactive'];
            $companySurvey->save();

            $data['companySurvey'] = $companySurvey;
        }

        $data['survey_done'] = empty(CompanySurvey::where([['user_id', $id],
            ['survey_one_company_done', Constants::STATUS['Active']],
            ['survey_two_company_done', Constants::STATUS['Active']],
            ['survey_three_company_done', Constants::STATUS['Active']],
        ])->get()->first()) ? true : false;

        $data['gradute'] = SurveyThree::where('do_for_living', '=', 'NO ESTUDIA NI TRABAJA')
        ->orWhere('do_for_living', '=', 'ESTUDIA')
        ->get()->count();

        return view('company.index', $data);
    }

    public function profileView()
    {
        return view('company.show');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return Redirect()->route('login');
    }
}
