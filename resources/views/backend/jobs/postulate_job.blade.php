@extends('company.company_master')

@section('TopTitle')Postulados @endsection

@section('title_section')Lista de postulados @endsection

@section('company_content')

@if(!$postulates->isEmpty())
    @foreach ($groups as $group)
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">{{ $group->title }}</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @foreach ($postulates as $postulate)
                    @if ($postulate->job->id == $group->job_id)
                    <ul>
                        <li>
                            <img src="{{ empty($postulate->graduate->profile_photo_path) 
                                        ? $postulate->graduate->profile_photo_url 
                                        : url("storage/".$postulate->graduate->profile_photo_path) }}"
                            class="img-circle elevation-2" alt="User Image">
                            &nbsp;&nbsp;
                            <b>{{ $postulate->graduate->name }}</b>
                            &nbsp;&nbsp;
                            Correo para contactarse:
                            <a class="text-decoration-none" href="mailto:{{ $postulate->graduate->email}}">
                                {{ $postulate->graduate->email}}
                            </a>&nbsp;&nbsp;
                            Postulado el día: {{ $postulate->created_at }}&nbsp;&nbsp;
                            Currículum: <a href="{{ asset('storage/pdf/'. $postulate->graduate->cv) }}" download>
                                Descargar</a> &nbsp;&nbsp;
                        </li>
                    </ul>
                    @endif
                    @endforeach
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    @endforeach
@else
    <h2>Todavía no se ha postulado nadie a los empleos. Puedes volver más tarde.</h2>
@endif

@endsection