@extends('admin.admin_master')

@section('TopTitle')Egresados @endsection

@section('title_section')Administrar egresados con encuestas completadas @endsection

@section('admin_content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="col-12">
                    <h3 class="card-title">Egresados con encuestas completadas</h3>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="table-filter" class="table table-responsive table-bordered table-striped"
                    style="width: 100%;">
                    <thead class="bg-gray-dark">
                        <tr>
                            <th>Número</th>
                            <th>Nombre</th>
                            <th>Número de control</th>
                            <th>Encuesta 1 completada</th>
                            <th>Encuesta 2 completada</th>
                            <th>Encuesta 3 completada</th>
                            <th>Encuesta 4 completada</th>
                            <th>Encuesta 5 completada</th>
                            <th>Encuesta 6 completada</th>
                            <th>Encuesta 7 completada</th>
                            <th>Actualización</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allData as $data)
                        <tr>
                            <td class="text-center">
                                <a href="{{ route('graduate.edit', $data->id) }}">
                                    {{ $data->id }}
                                </a>
                            </td>
                            <td>{{ $data->graduate->name }}</td>
                            <td>{{ $data->graduate->control_number }}</td>
                            <td>{!! ($data->survey_one_done == 1 ? '<p class="text-success">Completada</p>' : '<p class="text-danger">Sin completar</p>') !!}</td>
                            <td>{!! ($data->survey_two_done == 1 ? '<p class="text-success">Completada</p>' : '<p class="text-danger">Sin completar</p>') !!}</td>
                            <td>{!! ($data->survey_three_done == 1 ? '<p class="text-success">Completada</p>' : '<p class="text-danger">Sin completar</p>') !!}</td>
                            <td>{!! ($data->survey_four_done == 1 ? '<p class="text-success">Completada</p>' : '<p class="text-danger">Sin completar</p>') !!}</td>
                            <td>{!! ($data->survey_five_done == 1 ? '<p class="text-success">Completada</p>' : '<p class="text-danger">Sin completar</p>') !!}</td>
                            <td>{!! ($data->survey_six_done == 1 ? '<p class="text-success">Completada</p>' : '<p class="text-danger">Sin completar</p>') !!}</td>
                            <td>{!! ($data->survey_seven_done == 1 ? '<p class="text-success">Completada</p>' : '<p class="text-danger">Sin completar</p>') !!}</td>
                            <td>{{  $data->updated_at  }}</td>
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