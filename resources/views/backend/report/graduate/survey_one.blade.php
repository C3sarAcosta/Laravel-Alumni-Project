@extends('admin.admin_master')

@section('TopTitle')Reportes @endsection

@section('title_section')Reporte Perfil del Egresado @endsection

@section('head')
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/themes/base/jquery-ui.css" rel="stylesheet"
    type="text/css" />
<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js' type='text/javascript'></script>
@endsection

@section('admin_content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Perfil del Egresado</h3>
            </div>
            <!-- /.card-header -->

            <div class="row mt-4">
                <div class="col-5 ml-5">
                    <div class="form-group">
                        <label>Fecha de inicio:</label>
                        <input type="text" class="form-control" name="min" id="min" placeholder="Fecha inicio de contestación" />
                    </div>
                </div>
                <div class="col-5 mr-5">
                    <div class="form-group">
                        <label>Fecha fin:</label>
                        <input type="text" class="form-control" name="max" id="max" placeholder="Fecha fin de contestación" />
                    </div>
                </div>
            </div>
            <!-- /.date-filter -->

            <div class="card-body">
                <table id="table-filter" class="table table-responsive table-bordered table-striped"
                    style="width: 100%;">
                    <thead class="bg-gray-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre(s)</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Número de control</th>
                            <th>Fecha nacimiento</th>
                            <th>CURP</th>
                            <th>Sexo</th>
                            <th>Estado Civil</th>
                            <th>Dirección</th>
                            <th>Código Postal</th>
                            <th>Colonia</th>
                            <th>Estado</th>
                            <th>Ciudad</th>
                            <th>Municipio</th>
                            <th>Teléfono</th>
                            <th>Celular</th>
                            <th>Correo electrónico</th>
                            <th>Carrera</th>
                            <th>Especialiadd</th>
                            <th>Titulado</th>
                            <th>Mes de egreso</th>
                            <th>Año de egreso</th>
                            <th>Porcentaje de inglés</th>
                            <th>Otra Lengua</th>
                            <th>Porcentaje de otra lengua</th>
                            <th>Software</th>
                            <th>Contestada</th>
                            <th>Actualizada</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($survey_data as $data)
                        <tr>
                            <td class="text-center">{{ $data->id }}</td>
                            <td>{{ $data->first_name }}</td>
                            <td>{{ $data->fathers_surname }}</td>
                            <td>{{ $data->mothers_surname }}</td>
                            <td>{{ $data->control_number }}</td>
                            <td>{{ $data->birthday }}</td>
                            <td>{{ $data->curp }}</td>
                            <td>{{ $data->sex }}</td>
                            <td>{{ $data->marital_status }}</td>
                            <td>{{ $data->address }}</td>
                            <td>{{ $data->zip_code }}</td>
                            <td>{{ $data->suburb }}</td>
                            <td>{{ $data->state }}</td>
                            <td>{{ $data->city }}</td>
                            <td>{{ $data->municipality }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->cellphone }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->career }}</td>
                            <td>{{ $data->specialty }}</td>
                            <td>{{ $data->qualified }}</td>
                            <td>{{ $data->month }}</td>
                            <td>{{ $data->year }}</td>
                            <td>{{ $data->percent_english }}</td>
                            <td>{{ $data->another_language }}</td>
                            <td>{{ $data->percent_another_language }}</td>
                            <td>{{ $data->software == NULL ? "" : $data->software}}</td>
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
            var startDate = new Date(data[27]);
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
    var table = $('#table-filter').DataTable();

    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').change(function () {
        table.draw();
    });
});

</script>
@endsection

@endsection