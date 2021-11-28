<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\StudentSurvey;
use App\Models\SurveyThree;
use App\Models\SurveyTwo;
use App\Models\SurveyOne;

use App\Enums\Role;
use App\Enums\Status;

class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function AdminIndexView()
  {
    $data['gradute'] = User::where('role', Role::Student)->get()->count();
    $data['company'] = User::where('role', Role::Company)->get()->count();
    $data['survey'] = StudentSurvey::where([
      ['survey_one_done', Status::Active],
      ['survey_two_done', Status::Active],
      ['survey_three_done', Status::Active],
      ['survey_four_done', Status::Active],
      ['survey_five_done', Status::Active],
      ['survey_six_done', Status::Active],
      ['survey_seven_done', Status::Active],
    ])
      ->get()
      ->count();


    if ($data['gradute'] == 0) {
      $data['percent'] = 0;
    } else {
      $data['percent'] = round($data['survey'] / $data['gradute'], 2) * 100;
    }

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

  public function AdminProfileView()
  {
    return view('admin.show');
  }

  public function AdminLogout()
  {
    Auth::logout();
    Session::flush();
    return Redirect()->route('login');
  }
}
