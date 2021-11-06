@extends('admin.admin_master')

@section('TopTitle')Reportes @endsection

@section('title_section')Reporte Expéctativas y Actualización @endsection

@section('admin_content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Expéctativas de desarrollo, superación profesional y de actualización
                </h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="table-filter" class="table table-responsive table-bordered table-striped"
                    style="width: 100%;">
                    <thead class="bg-gray-dark">
                        <tr>
                            <th>ID</th>
                            <th>¿Le gustaria tomar cursos de actualización?</th>
                            <th>Mencionar cursos</th>
                            <th>¿Le gustaria tomar algún postgrado?</th>
                            <th>Postgrado</th>
                            <th>Contestada</th>
                            <th>Actualizada</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($survey_data as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->courses_yes_no }}</td>
                            <td>{{ $data->courses }}</td>
                            <td>{{ $data->master_yes_no }}</td>
                            <td>{{ $data->master }}</td>
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