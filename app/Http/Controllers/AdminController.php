<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\StudentSurvey;
use App\Enums\Role;
use App\Enums\Status;

class AdminController extends Controller
{
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
      ['survey_eight_done', Status::Active],
    ])
      ->get()
      ->count();

    $data['percent'] = round($data['survey'] / $data['gradute'], 2) * 100;
    return view('admin.index', $data);
  }

  public function AdminProfileView()
  {
    return view('admin.show');
  }

  public function AdminLogout()
  {
    Auth::logout();
    return Redirect()->route('login');
  }
}
