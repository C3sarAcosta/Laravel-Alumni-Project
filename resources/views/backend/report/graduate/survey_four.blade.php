@extends('admin.admin_master')

@section('TopTitle')Reportes @endsection

@section('title_section')Reporte Desempeño Profesional @endsection

@section('admin_content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Desempeño profesional de los egresados</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="table-filter" class="table table-responsive table-bordered table-striped"
                    style="width: 100%;">
                    <thead class="bg-gray-dark">
                        <tr>
                            <th>ID</th>
                            <th>Eficiencia para realizar las actividades laborales, en relación con su formación
                                académica</th>
                            <th>Cómo califica su formación académica con respecto a su desempeño laboral</th>
                            <th>Utilidad de las residencias profesionales o prácticas profesionales para su desarrollo
                                laboral y
                                profesional</th>
                            <th>Área o Campo de Estudio</th>
                            <th>Titulación</th>
                            <th>Experiencia Laboral / Práctica (antes de egresar)</th>
                            <th>Competencia Laboral: Resolver problemas, análisis, aprendizaje, trabajo en
                                equipo, etc</th>
                            <th>Posicionamiento de la Institución de Egreso</th>
                            <th>Conocimiento de Idiomas Extranjeros</th>
                            <th>Recomendaciones / Referencias</th>
                            <th>Personalidad / Actitudes</th>
                            <th>Capacidad de liderazgo</th>
                            <th>Otros</th>
                            <th>Contestada</th>
                            <th>Actualizada</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($survey_data as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->efficiency_work_activities }}</td>
                            <td>{{ $data->academic_training }}</td>
                            <td>{{ $data->usefulness_professional_residence }}</td>
                            <td>{{ $data->study_area }}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->experience }}</td>
                            <td>{{ $data->job_competence }}</td>
                            <td>{{ $data->positioning }}</td>
                            <td>{{ $data->languages }}</td>
                            <td>{{ $data->recommendations }}</td>
                            <td>{{ $data->personality }}</td>
                            <td>{{ $data->leadership }}</td>
                            <td>{{ $data->others }}</td>
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