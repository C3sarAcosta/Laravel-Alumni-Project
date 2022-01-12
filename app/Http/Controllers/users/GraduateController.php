<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\users\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudentSurvey;
//Constants
use App\Constants\Constants;

class GraduateController extends UserController
{
    public function index()
    {
        $id = Auth::user()->id;
        $data['graduateSurvey'] = StudentSurvey::where('user_id', $id)->first();

        if (empty($data['graduateSurvey'])) {
            $userSurvey = new StudentSurvey();
            $userSurvey->user_id = $id;
            $userSurvey->survey_one_done = Constants::STATUS['Inactive'];
            $userSurvey->survey_two_done = Constants::STATUS['Inactive'];
            $userSurvey->survey_three_done = Constants::STATUS['Inactive'];
            $userSurvey->survey_four_done = Constants::STATUS['Inactive'];
            $userSurvey->survey_five_done = Constants::STATUS['Inactive'];
            $userSurvey->survey_six_done = Constants::STATUS['Inactive'];
            $userSurvey->survey_seven_done = Constants::STATUS['Inactive'];
            $userSurvey->save();

            $data['graduateSurvey'] = $userSurvey;
        }

        return view('graduate.index', $data);
    }

    public function profileView()
    {
        return view('graduate.show');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return Redirect()->route('login');
    }

    public function graduateProfilePdf()
    {
        $data['user'] = User::find(Auth::user()->id);
        return view('graduate.cv', $data);
    }

    public function graduateProfilePdfStore(Request $request)
    {
        if (!$request->hasFile('exampleInputFile')) {
            $notification = array(
                'message' => 'Currículum vacío o se subió el mismo',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }

        $editData = User::find($request->user_id);

        if ($request->exampleInputFile->getClientOriginalExtension() != 'pdf') {
            $notification = array(
                'message' => 'Solamente se permiten archivos pdf.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        if ($editData->cv != null || $editData->cv != '') {
            $destinationPath = public_path();
            File::delete($destinationPath . '/storage/pdf/' . $editData->cv);
        }

        if ($request->exampleInputFile->getClientOriginalExtension() == 'pdf') {
            $filename =  implode('_', explode(" ", Auth::user()->name)) . '_' . 'cv' . '_' . time()  . '.' . $request->exampleInputFile->getClientOriginalExtension();
            $request->exampleInputFile->move('storage/pdf', $filename);
            $editData->cv = $filename;
            $editData->save();

            $notification = array(
                'message' => 'Currículum agregado con éxito',
                'alert-type' => 'success'
            );
        }

        return redirect()->route('graduate.pdf')->with($notification);
    }
}
