<?php

namespace App\Http\Controllers\backend\jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyJobs;
use App\Models\User;
use App\Models\Career;
use App\Models\Postulate;
use Illuminate\Support\Facades\Auth;
//Constants
use App\Constants\Constants;

class JobController extends Controller
{
    protected $notification;

    public function __construct()
    {
        $this->notification = array(
            'message' => '',
            'alert-type' => Constants::ALERT_TYPE['Info']
        );
    }

    public function jobsView()
    {
        $id = Auth::user()->id;
        $data['allData'] = CompanyJobs::where('id_user', $id)->get();
        return view('backend.jobs.view_jobs', $data);
    }

    public function postulateView()
    {
        $id = Auth::user()->id;
        $data['groups'] = Postulate::groupBy('postulates.job_id')
            ->join('company_jobs', 'company_jobs.id', '=', 'postulates.job_id')
            ->where('company_jobs.id_user', $id)
            ->get();

        $data['postulates'] = Postulate::join('company_jobs', 'company_jobs.id', '=', 'postulates.job_id')
            ->where('company_jobs.id_user', $id)
            ->get();
        return view('backend.jobs.postulate_job', $data);
    }

    public function jobsAdd()
    {
        $data['careers'] = Career::all();
        return view('backend.jobs.add_job', $data);
    }

    public function jobsStore(Request $request)
    {
        $job = new CompanyJobs();
        $this->saveController($job, $request);

        $this->notification['message'] = 'Trabajo publicado correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('company.jobs.view')->with($this->notification);
    }

    public function jobsEdit(int $id)
    {
        $data['job'] = CompanyJobs::find($id);
        $data['careers'] = Career::all();
        return view('backend.jobs.edit_job', $data);
    }

    public function jobsUpdate(Request $request, $id)
    {
        $job = CompanyJobs::find($id);
        $this->saveController($job, $request);
        
        $this->notification['message'] = 'Trabajo actualizado correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('company.jobs.view')->with($this->notification);
    }

    public function jobDelete(int $id)
    {
        $job = CompanyJobs::find($id);
        $job->delete();

        Postulate::where('job_id', $id)->delete();

        $this->notification['message'] = 'Trabajo eliminado correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('company.jobs.view')->with($this->notification);
    }

    public function jobsList()
    {
        $data['jobs'] = CompanyJobs::all();
        return view('backend.jobs.graduate_view_job', $data);
    }

    public function jobPostulate(int $job_id)
    {
        $user = User::find(Auth::user()->id);

        if ($user->cv == null || $user->cv == '') {
            $this->notification['message'] = 'No te puedes postular sin un currículum.';
            $this->notification['alert-type'] = Constants::ALERT_TYPE['Error'];

            return redirect()->route('jobs.view')->with($this->notification);
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

            $this->notification['message'] = 'Postulado exitosamente.';
            $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];
        } else {
            $this->notification['message'] = 'Ya te postulaste anteriormente.';
            $this->notification['alert-type'] = Constants::ALERT_TYPE['Warning'];
        }
        return redirect()->route('jobs.view')->with($this->notification);
    }

    public function saveController(CompanyJobs $job, Request $request) {
        $job->title = trim($request->title);
        $job->description = trim($request->description);
        $job->salary = trim($request->salary);
        $job->id_career = $request->id_career;
        $job->id_user = $request->id_user;
        $job->save();
    }
}
