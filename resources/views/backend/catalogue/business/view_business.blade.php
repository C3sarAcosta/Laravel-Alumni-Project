@extends('admin.admin_master')

@section('TopTitle')Actividad Económica @endsection

@section('title_section')Administrar Actividad Económica @endsection

@section('admin_content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gray-dark">
                <div class="col-12 d-flex justify-content-md-around">
                    <h3 class="card-title my-auto font-weight-bold">Actividades Económicas</h3>
                    <a href="{{ route('business.add') }}" class="btn btn-rounded btn-success">Agregar actividad económica</a>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="table-simple" class="table table-responsive table-bordered table-striped w-100">
                    <thead class="bg-gray-dark">
                        <tr>
                            <th>Número de actividad económica</th>
                            <th>Nombre de la actividad económica</th>
                            <th>Creada</th>
                            <th>Actualización</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allData as $data)
                        <tr>
                            <td class="text-center">{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->updated_at }}</td>
                            <td class="d-flex justify-content-between">
                                <a href="{{route('business.edit', $data->id)}}" class="btn btn-info">Editar</a>
                                <a id="delete" href="{{route('business.delete', $data->id)}}"
                                    class="btn btn-danger">
                                    Eliminar
                                </a>
                            </td>                            
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
    $(function(){
        $(document).on('click', '#delete', function(e){
        	e.preventDefault();
        	var link = $(this).attr("href");
        	Swal.fire({
        	title: '¿Estás seguro?',
        	text: "Se eliminará esta actividad económica.",
        	icon: 'warning',
        	showCancelButton: true,
        	confirmButtonColor: '#3085d6',
        	cancelButtonColor: '#d33',
        	confirmButtonText: 'Sí'
        	}).then((result) => {
        	if (result.isConfirmed) {
        		window.location.href = link;
        	Swal.fire(
        	'Eliminada!',
        	'Actividad económica eliminada correctamente.',
        	'success')}
        	});
        });	
    });
</script>
@endsection

@endsection