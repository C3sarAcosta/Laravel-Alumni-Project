<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\User;
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

    public function StudentProfilePdf()
    {
        $data['user'] = User::find(Auth::user()->id);
        return view('student.cv', $data);
    }

    public function StudentProfilePdfStore(Request $request)
    {
        if (!$request->hasFile('exampleInputFile')) {
            $notification = array(
                'message' => 'Currículum vacío o se subió el mismo',
                'alert-type' => 'warning'
            );
            return redirect()->route('student.pdf')->with($notification);
        }

        $editData = User::find($request->user_id);

        if ($request->exampleInputFile->getClientOriginalExtension() != 'pdf') {
            $notification = array(
                'message' => 'Solamente se permiten archivos pdf.',
                'alert-type' => 'error'
            );
            return redirect()->route('student.pdf')->with($notification);
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

        return redirect()->route('student.pdf')->with($notification);
    }
}
