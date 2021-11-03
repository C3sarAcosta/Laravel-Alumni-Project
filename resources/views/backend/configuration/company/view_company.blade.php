@extends('admin.admin_master')

@section('TopTitle')Empresas @endsection

@section('title_section')Administrar empresas @endsection

@section('admin_content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="col-12">
                    <h3 class="card-title"><label>Empresas relacionadas</label></h3>
                    <div class="col-10 d-flex justify-content-center">
                        <a href="{{ route('company.config.add') }}" class="btn btn-rounded btn-success">Agregar empresa</a>
                    </div>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Razón social</th>
                            <th>Correo electrónico</th>
                            <th>Registrado</th>
                            <th>Actualización</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allData as $data)
                        <tr>
                            <td class="text-center">
                                <a href="{{ route('company.config.edit', $data->id) }}">
                                    {{ $data->id }}
                                </a>
                            </td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    {{-- <tfoot>
                        <tr>
                            <th>Número</th>
                            <th>Nombre</th>
                            <th>Carrera</th>
                            <th>Año de egreso</th>
                            <th>Creada:</th>
                            <th>Actualización:</th>
                        </tr>
                    </tfoot> --}}
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
@endsection