@extends('admin.admin_master')

@section('TopTitle')Reportes @endsection

@section('title_section')Reporte Ubicación laboral de los egresados @endsection

@section('admin_content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ubicación laboral de los egresados</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="table-filter" class="table table-responsive table-bordered table-striped"
                    style="width: 100%;">
                    <thead class="bg-gray-dark">
                        <tr>
                            <th>Número de Profesionistas</th>
                            <th>Carreras</th>
                            <th>Nivel jerárquico</th>
                            <th>Cantidad</th>
                            <th>Congruencia</th>
                            <th>Requisito</th>
                            <th>Carrera Demandada</th>
                            <th>Contestada</th>
                            <th>Actualizada</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($survey_data as $data)
                        <tr>
                            <td>{{ $data->number_graduates }}</td>
                            <td>{{ $data->career }}</td>
                            <td>{{ $data->level }}</td>
                            <td>{{ $data->amount }}</td>
                            <td>{{ $data->congruence }}</td>
                            <td>{{ $data->requirements }}</td>
                            <td>{{ $data->most_demanded_career }}</td>
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