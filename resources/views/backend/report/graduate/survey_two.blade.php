@extends('admin.admin_master')

@section('TopTitle')Reportes @endsection

@section('title_section')Reporte Pertinencia y disponibilidad de medio y recursos para el aprendizaje @endsection

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
                            <th>Período de egreso</th>
                            <th>Carrera de egreso</th>
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
                            <td class="text-center">{{ $data->id }}</td>
                            <td>{{ $data->graduate->name }}</td>
                            <td>{{ $data->graduate->control_number }}</td>
                            <td>{{ $data->graduate->year_graduated }}</td>
                            <td>{{ (is_null($data->graduate->surveyOne) || empty($data->graduate->surveyOne))
                                ? ""
                                : $data->graduate->surveyOne->month }}</td>
                            <td>{{ (is_null($data->graduate->surveyOne) || empty($data->graduate->surveyOne))
                                ? ""
                                : $data->graduate->surveyOne->career }}</td>                                                            
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

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var min = $('#min').datepicker("getDate");
            var max = $('#max').datepicker("getDate");
            var startDate = new Date(data[12]);
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