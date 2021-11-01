<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\CompanySurvey;
use App\Enums\Status;

class CompanyController extends Controller
{
    public function CompanyIndexView($user_id)
    {
        $id = Crypt::decrypt($user_id);
        $data['companySurvey'] = CompanySurvey::where('user_id', $id)->first();

        if (empty($data['companySurvey'])) {
            $user_survey = new CompanySurvey();
            $user_survey->user_id = $id;
            $user_survey->survey_one_company_done = Status::Inactive;
            $user_survey->survey_two_company_done = Status::Inactive;
            $user_survey->survey_three_company_done = Status::Inactive;
            $user_survey->save();

            $data['companySurvey'] = CompanySurvey::where('user_id', $id)->first();
        }

        $data['survey_done'] = empty(CompanySurvey::where([['user_id', $id],
            ['survey_one_company_done', 1],
            ['survey_two_company_done', 1],
            ['survey_three_company_done', 1],
        ])->get()->first()) ? true : false;

        return view('company.index', $data);
    }

    public function CompanyProfileView()
    {
        return view('company.show');
    }

    public function CompanyLogout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }

    public function CompanyRegister()
    {
        return view('auth.company_register');
    }

    public function CompanyLogin()
    {
        return view('auth.login');
    }
}
