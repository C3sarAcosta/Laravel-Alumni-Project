<?php

namespace App\Http\Controllers\backend\catalogue;

use App\Http\Controllers\backend\catalogue\CatalogueController;
use Illuminate\Http\Request;
use App\Models\Business;
//Constants
use App\Constants\Constants;

class BusinessController extends CatalogueController
{
    protected function view()
    {
        $data['allData'] = Business::all();
        return view('backend.catalogue.business.view_business', $data);
    }

    public function add()
    {
        return view('backend.catalogue.business.add_business');
    }

    public function store(Request $request)
    {
        $business = new Business();
        $this->saveController($business, $request);

        $this->notification['message'] = 'Actividad económica agregada correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('business.view')->with($this->notification);
    }

    public function edit($id)
    {
        $editData = Business::find($id);
        return view('backend.catalogue.business.edit_business', compact('editData'));
    }

    public function update(Request $request)
    {
        $business = Business::find($request->business_id);
        $this->saveController($business, $request);

        $this->notification['message'] = 'Actividad económica actualizada correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('business.view')->with($this->notification);
    }

    public function delete(int $id)
    {
        $business = Business::find($id);
        $business->delete();

        $this->notification['message'] = 'Actividad económica eliminada correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('business.view')->with($this->notification);
    }

    protected function saveController(Business $business, Request $request)
    {
        $business->name = strtoupper(trim($request->name));
        $business->save();
    }
}
