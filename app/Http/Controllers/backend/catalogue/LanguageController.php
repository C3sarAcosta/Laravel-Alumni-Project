<?php

namespace App\Http\Controllers\backend\catalogue;

use App\Http\Controllers\backend\catalogue\CatalogueController;
use Illuminate\Http\Request;
use App\Models\Language;
//Constants
use App\Constants\Constants;

class LanguageController extends CatalogueController
{
    protected function view()
    {
        $data['allData'] = Language::all();
        return view('backend.catalogue.language.view_language', $data);
    }

    public function add()
    {
        return view('backend.catalogue.language.add_language');
    }

    public function store(Request $request)
    {
        $language = new Language();
        $this->saveController($language, $request);

        $this->notification['message'] = 'Lenguaje agregado correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('language.view')->with($this->notification);
    }

    public function edit($id)
    {
        $editData = Language::find($id);
        return view('backend.catalogue.language.edit_language', compact('editData'));
    }

    public function update(Request $request)
    {
        $language = Language::find($request->language_id);
        $this->saveController($language, $request);

        $this->notification['message'] = 'Lenguaje actualizado correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('language.view')->with($this->notification);
    }

    public function delete(int $id)
    {
        $language = Language::find($id);
        $language->delete();

        $this->notification['message'] = 'Lenguaje eliminado correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('language.view')->with($this->notification);
    }

    protected function saveController(Language $language, Request $request)
    {
        $language->name = strtoupper(trim($request->name));
        $language->save();
    }
}
