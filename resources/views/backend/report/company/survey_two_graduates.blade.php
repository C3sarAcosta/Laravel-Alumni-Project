@extends('admin.admin_master')

@section('TopTitle')Reportes @endsection

@section('title_section')Reporte Ubicación laboral de los egresados / Egresados trabajando @endsection

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
                            <th>Empresa</th>
                            <th>Carrera</th>
                            <th>Nivel jerárquico</th>
                            <th>Cantidad</th>
                            <th>Contestada</th>
                            <th>Actualizada</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($survey_data as $data)
                        <tr>
                            <td class="text-center">{{ $data->id }}</td>
                            <td>{{ $data->company->name }}</td>
                            <td>{{ $data->career }}</td>
                            <td>{{ $data->level }}</td>
                            <td>{{ $data->total }}</td>
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
            var startDate = new Date(data[9]);
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