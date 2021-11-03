<?php

namespace App\Http\Controllers\backend\configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;

class CareerController extends Controller
{
    public function CareerView()
    {
        $data['allData'] = Career::all();
        return view('backend.configuration.career.view_career', $data);
    }

    public function CareerAdd()
    {
        return view('backend.configuration.career.add_career');
    }

    public function CareerStore(Request $request)
    {
        $validateData = $request->validate(
            ['career' => 'required|unique:careers,name']
        );

        $career_name = $request->career_selector . ' ' . strtoupper(trim($request->career));

        $data = new Career();
        $data->name = $career_name;
        $data->save();

        $notification = array(
            'message' => 'Carrera agregada correctamente',
            'alert-type' => 'success'
        );

        return redirect()->route('career.view')->with($notification);
    }

    public function CareerEdit($id)
    {
        $editData = Career::find($id);
        return view('backend.configuration.career.edit_career', compact('editData'));
    }

    public function CareerUpdate(Request $request, $id)
    {
        $data = Career::find($id);
        $career_name = $request->career_selector . ' ' . strtoupper(trim($request->career));   
        $data->name = $career_name;
        $data->save();

        $notification = array(
            'message' => 'Carrera actualizada correctamente',
            'alert-type' => 'success'
        );

        return redirect()->route('career.view')->with($notification);
    }
}
