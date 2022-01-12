<?php

namespace App\Http\Controllers\backend\survey;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\StudentSurvey;
use App\Models\CompanySurvey;
//Constants
use App\Constants\Constants;


abstract class BaseController extends Controller
{
    protected $user;
    protected $notification;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });

        $this->notification = array(
            'message' => 'Default',
            'alert-type' => Constants::ALERT_TYPE['Info']
        );
    }

    protected abstract function surveyView();

    protected abstract function surveyStore(Request $request);

    protected abstract function surveyEdit();

    protected abstract function surveyUpdate(Request $request);

    protected abstract function surveyVerifiedRoute();

    protected function updateSurveyStatus(int $survey_number)
    {
        if ($this->user->role == Constants::ROLE['Graduate']) {
            $user_update = StudentSurvey::where('user_id', $this->user->id)->first();
            switch ($survey_number) {
                case 1:
                    $user_update->survey_one_done = Constants::STATUS['Active'];
                    break;
                case 2:
                    $user_update->survey_two_done = Constants::STATUS['Active'];
                    break;
                case 3:
                    $user_update->survey_three_done = Constants::STATUS['Active'];
                    break;
                case 4:
                    $user_update->survey_four_done = Constants::STATUS['Active'];
                    break;
                case 5:
                    $user_update->survey_five_done = Constants::STATUS['Active'];
                    break;
                case 6:
                    $user_update->survey_six_done = Constants::STATUS['Active'];
                    break;
                case 7:
                    $user_update->survey_seven_done = Constants::STATUS['Active'];
                    break;
            };
            $user_update->save();
        } else {
            $user_update = CompanySurvey::where('user_id', $this->user->id)->first();
            switch ($survey_number) {
                case 1:
                    $user_update->survey_one_company_done = Constants::STATUS['Active'];
                    break;
                case 2:
                    $user_update->survey_two_company_done = Constants::STATUS['Active'];
                    break;
                case 3:
                    $user_update->survey_three_company_done = Constants::STATUS['Active'];
                    break;
            };
            $user_update->save();
        }
    }
}
