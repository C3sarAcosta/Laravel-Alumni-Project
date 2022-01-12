<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\users\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\StudentSurvey;
use App\Models\SurveyThree;
use App\Models\SurveyTwo;
use App\Models\SurveyOne;
//Constants
use App\Constants\Constants;

class AdminController extends UserController
{
  public function index()
  {
    $data['gradute'] = User::where('role', Constants::ROLE['Graduate'])->get()->count();
    $data['company'] = User::where('role', Constants::ROLE['Company'])->get()->count();
    $data['survey_one_count'] = StudentSurvey::where('survey_one_done', Constants::STATUS['Active'])
      ->get()->count();

    $data['survey'] = StudentSurvey::where([
      ['survey_one_done', Constants::STATUS['Active']],
      ['survey_two_done', Constants::STATUS['Active']],
      ['survey_three_done', Constants::STATUS['Active']],
      ['survey_four_done', Constants::STATUS['Active']],
      ['survey_five_done', Constants::STATUS['Active']],
      ['survey_six_done', Constants::STATUS['Active']],
      ['survey_seven_done', Constants::STATUS['Active']],
    ])->get()->count();
    
    $data['percent'] = $data['gradute'] == 0 ? 0 : round($data['survey'] / $data['gradute'], 2) * 100;

    $data['careers'] = SurveyOne::groupBy('career')
      ->selectRaw('count(*) as total, career as name')
      ->get();

    $data['survey_one'] = SurveyOne::groupBy('sex')
      ->selectRaw('count(*) as total, sex')
      ->get();

    $data['survey_two'] = SurveyTwo::groupBy('quality_teachers')
      ->selectRaw('count(*) as total, quality_teachers')
      ->get();

    $data['survey_three'] = SurveyThree::groupBy('do_for_living')
      ->selectRaw('count(*) as total, do_for_living')
      ->get();

    return view('admin.index', $data);
  }

  public function profileView()
  {
    return view('admin.show');
  }

  public function logout()
  {
    Auth::logout();
    Session::flush();
    return Redirect()->route('login');
  }
}
