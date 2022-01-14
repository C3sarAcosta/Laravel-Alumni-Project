<?php

namespace App\Http\Controllers\backend\configuration;

use App\Http\Controllers\backend\configuration\ConfigurationController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Career;
use App\Models\StudentSurvey;
use Illuminate\Support\Facades\Hash;
//Constants
use App\Constants\Constants;

class GraduateConfigurationController extends ConfigurationController
{
    public function view()
    {
        $data['allData'] = User::where('role', Constants::ROLE['Graduate'])->get();
        return view('backend.configuration.graduate.view_graduate', $data);
    }

    public function graduateSurveyView()
    {
        $data['allData'] = StudentSurvey::get();
        return view('backend.configuration.graduate.view_survey', $data);
    }

    public function add()
    {
        $data['careers'] = Career::all();
        return view('backend.configuration.graduate.add_graduate', $data);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|unique:users,email',
                'control_number' => 'required|unique:users,control_number',
            ]
        );

        $graduate = new User();
        $this->saveController($graduate, $request);

        $this->notification['message'] = 'Egresado agregado correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('graduate.configuration.view')->with($this->notification);
    }

    public function edit($id)
    {
        $data['careers'] = Career::all();
        $data['editData'] = User::find($id);
        return view('backend.configuration.graduate.edit_graduate', $data);
    }

    public function update(Request $request)
    {
        $graduate = User::find($request->graduate_id);
        $request->validate(
            [
                'email' => 'required|unique:users,email,' . $graduate->id,
                'control_number' => 'required|unique:users,control_number,' . $graduate->id,
            ]
        );
        $this->saveController($graduate, $request);

        $this->notification['message'] = 'Egresado actualizado correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('graduate.configuration.view')->with($this->notification);
    }

    public function delete(int $id)
    {
        $graduate = User::find($id);
        $graduate->delete();

        $this->notification['message'] = 'Egresado eliminado correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('graduate.configuration.view')->with($this->notification);
    }

    protected function saveController(User $graduate, Request $request)
    {
        $graduate->name = trim(strtoupper($request->name));
        $graduate->email = trim($request->email);
        $graduate->password = Hash::make($request->password);
        $graduate->year_graduated = trim($request->year);
        $graduate->control_number = trim($request->control_number);
        $graduate->role = Constants::ROLE['Graduate'];
        $graduate->save();
    }
}
