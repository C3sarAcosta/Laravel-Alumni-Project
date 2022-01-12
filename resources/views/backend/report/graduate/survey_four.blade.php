@extends('admin.admin_master')

@section('TopTitle')Reportes @endsection

@section('title_section')Reporte Desempeño profesional de los egresados @endsection

@section('head')
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/themes/base/jquery-ui.css" rel="stylesheet"
    type="text/css" />
<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js' type='text/javascript'></script>
@endsection

@section('admin_content')
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-5 ml-5">
                <div class="form-group">
                    <label>Fecha de inicio:</label>
                    <input type="text" class="form-control" name="min" id="min"
                        placeholder="Fecha inicio de contestación" />
                </div>
            </div>
            <div class="col-5 mr-5">
                <div class="form-group">
                    <label>Fecha fin:</label>
                    <input type="text" class="form-control" name="max" id="max"
                        placeholder="Fecha fin de contestación" />
                </div>
            </div>
        </div>
        <!-- /.date-filter -->
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="table-filter-two" class="table table-responsive table-bordered table-striped w-100">
                    <thead class="bg-gray-dark">
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Número de Control</th>
                            <th>Año de egreso</th>
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
                            <td class="text-center">{{ $data->id }}</td>
                            <td>{{ $data->graduate->name }}</td>
                            <td>{{ $data->graduate->control_number }}</td>
                            <td>{{ $data->graduate->year_graduated }}</td>
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

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var min = $('#min').datepicker("getDate");
            var max = $('#max').datepicker("getDate");
            var startDate = new Date(data[17]);
            if (min == null && max == null) {
                return true;
            }
            if (min == null && startDate <= max) {
                return true;
            }
            if (max == null && startDate >= min) {
                return true;
            }
            if (startDate <= max && startDate >= min) {
                return true;
            }
            return false;
        }
    );

    $("#min").datepicker({
        onSelect: function () {
            table.draw();
        },
        changeMonth: true,
        changeYear: true
    });
    $("#max").datepicker({
        onSelect: function () {
            table.draw();
        },
        changeMonth: true,
        changeYear: true
    });
    var table = $('#table-filter-two').DataTable();

    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').change(function () {
        table.draw();
    });

    $("#ui-datepicker-div").css("display", "none");
});
</script>
@endsection

@endsection