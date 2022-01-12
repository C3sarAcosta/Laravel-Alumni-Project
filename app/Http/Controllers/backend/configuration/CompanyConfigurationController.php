<?php

namespace App\Http\Controllers\backend\configuration;

use App\Http\Controllers\backend\configuration\ConfigurationController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
//Constants
use App\Constants\Constants;

class CompanyConfigurationController extends ConfigurationController
{
    public function view()
    {
        $data['allData'] = User::where('role', Constants::ROLE['Company'])->get();
        return view('backend.configuration.company.view_company', $data);
    }

    public function add()
    {
        return view('backend.configuration.company.add_company');
    }

    public function store(Request $request)
    {
        $request->validate(['email' => 'required|unique:users,email']);

        $company = new User();
        $this->saveController($company, $request);

        $this->notification['message'] = 'Empresa agregada correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('company.config.view')->with($this->notification);
    }

    public function edit($id)
    {
        $data['editData'] = User::find($id);
        return view('backend.configuration.company.edit_company', $data);
    }

    public function update(Request $request)
    {
        $company = User::find($request->company_id);
        $request->validate(['email' => 'required|unique:users,email,' . $company->id]);
        
        $this->saveController($company, $request);

        $this->notification['message'] = 'Empresa actualizada correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('company.config.view')->with($this->notification);
    }

    public function saveController(User $company, Request $request)
    {
        $company->name = trim(strtoupper($request->name));
        $company->email = trim($request->email);
        $company->password = Hash::make($request->password);
        $company->role = Constants::ROLE['Company'];
        $company->save();
    }
}
