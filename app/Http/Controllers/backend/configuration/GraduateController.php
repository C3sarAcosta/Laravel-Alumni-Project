<?php

namespace App\Http\Controllers\backend\configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Career;
use App\Enums\Role;
use Illuminate\Support\Facades\Hash;

class GraduateController extends Controller
{
    public function GraduateView()
    {
        $data['allData'] = User::where('role', Role::Student)->get();
        return view('backend.configuration.graduate.view_graduate', $data);
    }

    public function GraduateAdd()
    {
        $data['careers'] = Career::all();
        return view('backend.configuration.graduate.add_graduate', $data);
    }

    public function GraduateStore(Request $request)
    {
        $validateData = $request->validate(
            ['email' => 'required|unique:users,email']
        );

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->year_graduated = $request->year;
        $data->control_number = $request->control_number;
        $data->id_career =  $request->career_selector;
        $data->role = Role::Student;
        $data->save();

        $notification = array(
            'message' => 'Egresado agregado correctamente',
            'alert-type' => 'success'
        );

        return redirect()->route('graduate.view')->with($notification);
    }

    public function GraduateEdit($id)
    {
        $data['careers'] = Career::all();
        $data['editData'] = User::find($id);
        return view('backend.configuration.graduate.edit_graduate', $data);
    }

    public function GraduateUpdate(Request $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->year_graduated = $request->year;
        $data->control_number = $request->control_number;
        $data->id_career =  $request->career_selector;

        $data->save();

        $notification = array(
            'message' => 'Egresado actualizado correctamente',
            'alert-type' => 'success'
        );

        return redirect()->route('graduate.view')->with($notification);
    }
}