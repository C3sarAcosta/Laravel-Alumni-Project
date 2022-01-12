<?php

namespace App\Http\Controllers\backend\configuration;

use App\Http\Controllers\backend\configuration\ConfigurationController;
use Illuminate\Http\Request;
use App\Models\Career;
//Constants
use App\Constants\Constants;

class CareerController extends ConfigurationController
{
    protected function view()
    {
        $data['allData'] = Career::all();
        return view('backend.configuration.career.view_career', $data);
    }

    public function add()
    {
        return view('backend.configuration.career.add_career');
    }

    public function store(Request $request)
    {
        $request->validate(['career' => 'required|unique:careers,name']);

        $career = new Career();
        $this->saveController($career, $request);

        $this->notification['message'] = 'Carrera agregada correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('career.view')->with($this->notification);
    }

    public function edit($id)
    {
        $editData = Career::find($id);
        return view('backend.configuration.career.edit_career', compact('editData'));
    }

    public function update(Request $request)
    {
        $career = Career::find($request->career_id);
        $request->validate(['career' => 'required|unique:careers,name,' . $career->id]);

        $this->saveController($career, $request);

        $this->notification['message'] = 'Carrera actualizada correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('career.view')->with($this->notification);
    }

    protected function saveController(Career $career, Request $request)
    {
        $career_name = $request->career_selector . ' ' . strtoupper(trim($request->career));
        $career->name = $career_name;
        $career->save();
    }
}
