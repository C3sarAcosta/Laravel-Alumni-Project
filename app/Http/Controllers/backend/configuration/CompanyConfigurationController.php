<?php

namespace App\Http\Controllers\backend\configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Enums\Role;
use Illuminate\Support\Facades\Hash;

class CompanyConfigurationController extends Controller
{
    public function CompanyView()
    {
        $data['allData'] = User::where('role', Role::Company)->get();
        return view('backend.configuration.company.view_company', $data);
    }

    public function CompanyAdd()
    {
        return view('backend.configuration.company.add_company');
    }

    public function CompanyStore(Request $request)
    {
        $validateData = $request->validate(
            ['email' => 'required|unique:users,email']
        );

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->role = Role::Company;
        $data->save();

        $notification = array(
            'message' => 'Empresa agregada correctamente',
            'alert-type' => 'success'
        );

        return redirect()->route('company.config.view')->with($notification);
    }

    public function CompanyEdit($id)
    {
        $data['editData'] = User::find($id);
        return view('backend.configuration.company.edit_company', $data);
    }

    public function CompanyUpdate(Request $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);

        $data->save();

        $notification = array(
            'message' => 'Empresa actualizada correctamente',
            'alert-type' => 'success'
        );

        return redirect()->route('company.config.view')->with($notification);
    }
}
