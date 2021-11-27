<?php

namespace App\Http\Controllers\backend\configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Models\Career;

class SpecialtyController extends Controller
{
    public function SpecialtyView()
    {
        $data['allData'] = Specialty::all();
        return view('backend.configuration.specialty.view_specialty', $data);
    }

    public function SpecialtyAdd()
    {
        $data['careers'] = Career::all();
        return view('backend.configuration.specialty.add_specialty', $data);
    }

    public function SpecialtyStore(Request $request)
    {
        $data = new Specialty();
        $data->name = trim(strtoupper($request->specialty));
        $data->id_career = $request->career_selector;
        $data->save();

        $notification = array(
            'message' => 'Especialidad agregada correctamente',
            'alert-type' => 'success'
        );

        return redirect()->route('specialty.view')->with($notification);
    }

    public function SpecialtyEdit($id)
    {
        $data['editData'] = Specialty::find($id);
        $data['careers'] = Career::all();
        return view('backend.configuration.specialty.edit_specialty', $data);
    }

    public function SpecialtyUpdate(Request $request, $id)
    {
        $data = Specialty::find($id);
        $data->name = trim(strtoupper($request->specialty));
        $data->id_career = $request->career_selector;
        $data->save();

        $notification = array(
            'message' => 'Especialidad actualizada correctamente',
            'alert-type' => 'success'
        );

        return redirect()->route('specialty.view')->with($notification);
    }
}
