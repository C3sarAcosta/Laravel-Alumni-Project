@extends('student.student_master')

@section('TopTitle')Trabajos @endsection

@section('title_section')Lista de trabajos disponibles @endsection

@section('student_content')
@if (!$jobs->isEmpty())
<!-- Default box -->
<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            @foreach ($jobs as $job)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        {{ $job->company->name }}
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b>{{ $job->title }}</b></h2>
                                <p class="text-muted text-sm"><b>Descripción: </b> {{ $job->description }} </p>
                                <p class="text-muted text-sm"><b>Salario: </b> {{ $job->salary }} </p>
                            </div>
                            <div class="col-5 text-center">
                                <img src="{{ empty($job->company->profile_photo_path) ? $job->company->profile_photo_url : url("storage/".$job->company->profile_photo_path)}}" class="img-circle img-fluid"
                                alt="User Image">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="{{ route('jobs.postulate', $job->id) }}" class="btn btn-sm btn-success">
                                <i class="fas fa-check-circle"></i> Postularme
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@else
<div class="row d-flex justify-content-sm-center">
    <h4>No se ha publicado ningún trabajo por el momento, puedes volver en otro momento.</h4>
</div>
@endif
@endsection