@extends('admin.admin_master')

@section('TopTitle')Reportes @endsection

@section('title_section')Participación social @endsection

@section('admin_content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Participación social de los egresados</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="table-filter" class="table table-responsive table-bordered table-striped"
                    style="width: 100%;">
                    <thead class="bg-gray-dark">
                        <tr>
                            <th>ID</th>
                            <th>¿Pertenece a organizaciones sociales?</th>
                            <th>Mencionar organizaciones</th>
                            <th>¿Pertenece a organismos de profesionistas?</th>
                            <th>Mencionar organismos</th>
                            <th>¿Pertenece a asociaciones de egresados?</th>
                            <th>Mencionar asosiación</th>
                            <th>Contestada</th>
                            <th>Actualizada</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($survey_data as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->organization_yes_no }}</td>
                            <td>{{ $data->organization }}</td>
                            <td>{{ $data->agency_yes_no }}</td>
                            <td>{{ $data->agency }}</td>
                            <td>{{ $data->association_yes_no }}</td>
                            <td>{{ $data->association }}</td>
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