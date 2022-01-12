<?php

namespace App\Http\Controllers\backend\survey\graduate;

use App\Http\Controllers\backend\survey\BaseController;
use Illuminate\Http\Request;
use App\Models\SurveySix;
use App\Models\StudentSurvey;
use App\Models\User;
//Constants
use App\Constants\Constants;

class SurveySixController extends BaseController
{
    public function SurveyView()
    {
        $data['constants'] = Constants::getConstants();
        return view('backend.survey.6.survey_six', $data);
    }

    public function surveyStore(Request $request)
    {
        (new User)->newUser();

        $checkOrganization = $request->organization_selector == Constants::YES_NO['Yes'] && empty(trim($request->organization));
        $checkAgency = $request->agency_selector == Constants::YES_NO['Yes'] && empty(trim($request->agency));
        $checkAssociation = $request->association_selector == Constants::YES_NO['Yes'] && empty(trim($request->association));

        if ($checkOrganization || $checkAgency || $checkAssociation) return $this->messageError($checkOrganization, $checkAgency, $checkAssociation);

        $surveySix = new SurveySix();
        $this->saveController($surveySix, $request);
        $this->updateSurveyStatus(6);

        $this->notification['message'] = 'Encuesta *Participación Social* realizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('graduate.index')->with($this->notification);
    }

    public function surveyEdit()
    {
        $data['userData'] = SurveySix::where('user_id', $this->user->id)->first();
        $data['constants'] = Constants::getConstants();
        return view('backend.survey.6.survey_six_edit', $data);
    }

    public function surveyUpdate(Request $request)
    {
        $checkOrganization = $request->organization_selector == Constants::YES_NO['Yes'] && empty(trim($request->organization));
        $checkAgency = $request->agency_selector == Constants::YES_NO['Yes'] && empty(trim($request->agency));
        $checkAssociation = $request->association_selector == Constants::YES_NO['Yes'] && empty(trim($request->association));

        if ($checkOrganization || $checkAgency || $checkAssociation) return $this->messageError($checkOrganization, $checkAgency, $checkAssociation);

        $surveySix = SurveySix::where('user_id', $this->user->id)->first();
        $this->saveController($surveySix, $request);

        $this->notification['message'] = 'Encuesta *Participación Social* actualizada con éxito.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('graduate.index')->with($this->notification);
    }

    public function surveyVerifiedRoute()
    {
        $data = StudentSurvey::where('user_id', $this->user->id)->first();

        return $data['survey_six_done'] == Constants::STATUS['Active']
            ? redirect()->route('survey.six.edit')
            : redirect()->route('survey.six.index');
    }

    function saveController(SurveySix $surveySix, Request $request)
    {
        $surveySix->user_id = $this->user->id;
        $surveySix->organization_yes_no = $request->organization_selector;
        $surveySix->organization = $request->organization_selector == Constants::YES_NO['Yes']
            ? trim($request->organization)
            : null;

        $surveySix->agency_yes_no = $request->agency_selector;
        $surveySix->agency = $request->agency_selector == Constants::YES_NO['Yes']
            ? trim($request->agency)
            : null;

        $surveySix->association_yes_no = $request->association_selector;
        $surveySix->association = $request->association_selector == Constants::YES_NO['Yes']
            ? trim($request->association)
            : null;

        $surveySix->save();
    }

    public function messageError($checkOrganization, $checkAgency, $checkAssociation)
    {
        $this->notification['message'] = $checkOrganization
            ? 'Por favor mencione los organizaciones, es obligatorio si selecciona sí.'
            : ($checkAgency
                ? 'Por favor mencione los organismos, es obligatorio si selecciona sí.'
                : ($checkAssociation
                    ? 'Por favor mencione las asociaciones, es obligatorio si selecciona sí.'
                    : ''));
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Error'];
        return redirect()->back()->withInput()->with($this->notification);
    }
}
