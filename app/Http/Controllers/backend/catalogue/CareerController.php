<?php

namespace App\Http\Controllers\backend\catalogue;

use App\Http\Controllers\backend\catalogue\CatalogueController;
use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\Specialty;
//Constants
use App\Constants\Constants;

class CareerController extends CatalogueController
{
    protected function view()
    {
        $data['allData'] = Career::all();
        return view('backend.catalogue.career.view_career', $data);
    }

    public function add()
    {
        return view('backend.catalogue.career.add_career');
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
        return view('backend.catalogue.career.edit_career', compact('editData'));
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

    public function delete(int $id)
    {
        $career = Career::find($id);
        $career->delete();

        Specialty::where('id_career', $id)->delete();

        $this->notification['message'] = 'Carrera eliminada correctamente.';
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
