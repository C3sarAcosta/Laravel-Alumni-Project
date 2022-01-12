<?php

namespace App\Http\Controllers\backend\configuration;

use App\Http\Controllers\backend\configuration\ConfigurationController;
use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Models\Career;
//Constants
use App\Constants\Constants;

class SpecialtyController extends ConfigurationController
{
    public function view()
    {
        $data['allData'] = Specialty::all();
        return view('backend.configuration.specialty.view_specialty', $data);
    }

    public function add()
    {
        $data['careers'] = Career::all();
        return view('backend.configuration.specialty.add_specialty', $data);
    }

    public function store(Request $request)
    {
        $specialty = new Specialty();
        $this->saveController($specialty, $request);

        $this->notification['message'] = 'Especialidad agregada correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('specialty.view')->with($this->notification);
    }

    public function edit($id)
    {
        $data['editData'] = Specialty::find($id);
        $data['careers'] = Career::all();
        return view('backend.configuration.specialty.edit_specialty', $data);
    }

    public function update(Request $request)
    {
        $specialty = Specialty::find($request->specialty_id);
        $this->saveController($specialty, $request);

        $this->notification['message'] = 'Especialidad actualizada correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('specialty.view')->with($this->notification);
    }

    protected function saveController(Specialty $specialty, Request $request)
    {
        $specialty->name = trim(strtoupper($request->specialty));
        $specialty->id_career = $request->career_selector;
        $specialty->save();
    }
}
