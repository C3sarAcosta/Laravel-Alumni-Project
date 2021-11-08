@extends('admin.admin_master')

@section('TopTitle')Reportes @endsection

@section('title_section')Reporte Competencias Laborales @endsection

@section('admin_content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Competencias Laborales</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="table-filter" class="table table-responsive table-bordered table-striped"
                    style="width: 100%;">
                    <thead class="bg-gray-dark">
                        <tr>
                            <th>Habilidad para resolver conflictos</th>
                            <th>Ortografía y redacción de documentos</th>
                            <th>Mejora de procesos</th>
                            <th>Trabajo en equipo</th>
                            <th>Habilidad para administrar tiempo</th>
                            <th>Seguridad personal</th>
                            <th>Facilidad de palabra</th>
                            <th>Gestión de proyectos</th>
                            <th>Puntualidad y asistencia</th>
                            <th>Cumplimiento de las normas</th>
                            <th>Integración al trabajo</th>
                            <th>Creatividad e innovación</th>
                            <th>Capacidad de negociación</th>
                            <th>Abstracción, análisis y síntesis</th>
                            <th>Liderazgo y toma de decisión</th>
                            <th>Adaptar al cambio</th>
                            <th>Desempeño laboral</th>
                            <th>Sugerencias</th>
                            <th>Comentarios y sugerencias</th>
                            <th>Contestada</th>
                            <th>Actualizada</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($survey_data as $data)
                        <tr>
                            <td>{{ $data->resolve_conflicts }}</td>
                            <td>{{ $data->orthography }}</td>
                            <td>{{ $data->process_improvement }}</td>
                            <td>{{ $data->teamwork }}</td>
                            <td>{{ $data->time_management }}</td>
                            <td>{{ $data->security }}</td>
                            <td>{{ $data->ease_speech }}</td>
                            <td>{{ $data->project_management }}</td>
                            <td>{{ $data->puntuality }}</td>
                            <td>{{ $data->rules }}</td>
                            <td>{{ $data->integration_work }}</td>
                            <td>{{ $data->creativity }}</td>
                            <td>{{ $data->bargaining }}</td>
                            <td>{{ $data->abstraction }}</td>
                            <td>{{ $data->leadership }}</td>
                            <td>{{ $data->change }}</td>
                            <td>{{ $data->job_performance }}</td>
                            <td>{{ $data->requirement }}</td>
                            <td>{{ $data->comments }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
@endsection