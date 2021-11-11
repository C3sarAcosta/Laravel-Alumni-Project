<?php

namespace App\Http\Controllers\backend\jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyJobs;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Career;
use App\Models\Postulate;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function JobsView()
    {
        $id = Auth::user()->id;
        $data['allData'] = CompanyJobs::where('id_user', $id)->get();
        return view('backend.jobs.view_jobs', $data);
    }
    public function PostulateView()
    {
        $data['groups'] = Postulate::groupBy('postulates.job_id')
            ->join('company_jobs', 'company_jobs.id', '=', 'postulates.job_id')
            ->where('company_jobs.id_user', Auth::user()->id)
            ->get();

        $data['postulates'] = Postulate::join('company_jobs', 'company_jobs.id', '=', 'postulates.job_id')
            ->where('company_jobs.id_user', Auth::user()->id)
            ->get();
        return view('backend.jobs.postulate_job', $data);
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


    public function JobsEdit(int $id)
    {
        $data['job'] = CompanyJobs::find($id);
        $data['careers'] = Career::all();
        return view('backend.jobs.edit_job', $data);
    }

    public function JobsUpdate(Request $request, $id)
    {
        $editdata = CompanyJobs::find($id);
        $editdata->title = $request->title;
        $editdata->description = $request->description;
        $editdata->salary = $request->salary;
        $editdata->id_career = $request->id_career;
        $editdata->save();

        $notification = array(
            'message' => 'Trabajo actualizado correctamente',
            'alert-type' => 'success'
        );

        return redirect()->route('company.jobs.view')->with($notification);
    }

    public function JobDelete(int $id)
    {
        $job = CompanyJobs::find($id);
        $job->delete();

        Postulate::where('job_id', $id)->delete();

        $notification = array(
            'message' => 'Trabajo eliminado correctamente',
            'alert-type' => 'success'
        );

        return redirect()->route('company.jobs.view')->with($notification);
    }

    public function JobsList()
    {
        $data['jobs'] = CompanyJobs::all();
        return view('backend.jobs.graduate_view_job', $data);
    }

    public function JobPostulate(int $job_id)
    {
        $user = User::find(Auth::user()->id);
        if ($user->cv == null || $user->cv == '') {
            $notification = array(
                'message' => 'No te puedes postular sin un currículum',
                'alert-type' => 'error'
            );
            return redirect()->route('jobs.view')->with($notification);
        }
        $validate_postulate = Postulate::where([
            ['job_id', $job_id],
            ['graduate_id', Auth::user()->id],
        ])->get()->count();

        if ($validate_postulate == 0) {
            $data = new Postulate();
            $data->job_id = $job_id;
            $data->graduate_id = Auth::user()->id;
            $data->save();

            $notification = array(
                'message' => 'Postulado exitosamente',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Ya te postulaste anteriormente',
                'alert-type' => 'warning'
            );
        }
        return redirect()->route('jobs.view')->with($notification);
    }
}
