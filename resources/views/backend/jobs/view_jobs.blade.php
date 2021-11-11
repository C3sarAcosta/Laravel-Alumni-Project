@extends('company.company_master')

@section('TopTitle')Trabajo @endsection

@section('title_section')Lista de trabajos disponibles @endsection

@section('company_content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="col-12">
                    <h3 class="card-title">Lista de empleos</h3>
                    <div class="col-10 d-flex justify-content-center">
                        <a href="{{ route('company.jobs.add') }}" class="btn btn-rounded btn-success">Agregar
                            empleos</a>
                    </div>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="table-filter" class="table table-responsive table-bordered table-striped"
                    style="width: 100%;">
                    <thead class="bg-gray-dark">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Salario</th>
                            <th>Publicado</th>
                            <th>Actualización</th>
                        </tr>
                    </thead>
                    <tbody>
                        @empty(!$allData)
                        @foreach ($allData as $data)
                        <tr>
                            <td class="text-center">
                                {{ $data->id }}
                            </td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->description }}</td>
                            <td>{{ $data->salary }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->updated_at }}</td>
                        </tr>
                        @endforeach

                        @endempty
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