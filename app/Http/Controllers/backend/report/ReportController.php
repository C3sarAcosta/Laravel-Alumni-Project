<?php

namespace App\Http\Controllers\backend\report;

use App\Http\Controllers\Controller;

abstract class ReportController extends Controller
{
    protected function report($model, $view)
    {
        $data['survey_data'] = $model::all();
        return view($view, $data);
    }
}
