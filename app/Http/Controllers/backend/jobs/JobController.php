<?php

namespace App\Http\Controllers\backend\jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyJobs;
use Illuminate\Support\Facades\Crypt;
use App\Models\Career;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function JobsView()
    {
        $id = Auth::user()->id;
        $data['allData'] = CompanyJobs::where('id_user', $id)->get();
        return view('backend.jobs.view_jobs', $data);
    }

    public function JobsAdd()
    {
        $data['careers'] = Career::all();
        return view('backend.jobs.add_job', $data);
    }


    public function JobsStore(Request $request)
    {
        $data = new CompanyJobs();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->salary = $request->salary;
        $data->id_career = $request->id_career;
        $data->id_user = $request->id_user;
        $data->save();

        $notification = array(
            'message' => 'Trabajo publicado correctamente',
            'alert-type' => 'success'
        );

        return redirect()->route('company.jobs.view')->with($notification);
    }
}
