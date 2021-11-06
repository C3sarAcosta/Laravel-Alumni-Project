@extends('admin.admin_master')

@section('TopTitle')Reportes @endsection

@section('title_section')Reporte Pertinencia y disponibilidad @endsection

@section('admin_content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Pertinencia y disponibilidad de medio y recursos para el aprendizaje
                </h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="table-filter" class="table table-responsive table-bordered table-striped"
                    style="width: 100%;">
                    <thead class="bg-gray-dark">
                        <tr>
                            <th>ID</th>
                            <th>Calidad de docentes</th>
                            <th>Plan de estudios</th>
                            <th>Satisfacción condiciones de estudio (infraestructura)</th>
                            <th>Experiencia obtenida a través de la residencia profesional</th>
                            <th>Énfasis que se le prestaba a la investigación dentro del proceso de
                                enseñanza</th>
                            <th>Oportunidad de participar en proyectos de investigación y
                                desarrollo</th>
                            <th>Contestada</th>
                            <th>Actualizada</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($survey_data as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->quality_teachers }}</td>
                            <td>{{ $data->syllabus }}</td>
                            <td>{{ $data->study_condition }}</td>
                            <td>{{ $data->experience }}</td>
                            <td>{{ $data->study_emphasis }}</td>
                            <td>{{ $data->participate_projects }}</td>
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