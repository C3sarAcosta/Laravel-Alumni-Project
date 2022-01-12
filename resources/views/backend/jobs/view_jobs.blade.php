@extends('company.company_master')

@section('TopTitle')Trabajo @endsection

@section('title_section')Lista de trabajos disponibles @endsection

@section('company_content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="col-12 d-flex justify-content-md-around">
                    <h3 class="card-title my-auto font-weight-bold">Lista de empleos</h3>
                    <a href="{{ route('company.jobs.add') }}" class="btn btn-rounded btn-success">Agregar empleos</a>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="table-filter" class="table table-responsive table-bordered table-striped w-100">
                    <thead class="bg-gray-dark">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Salario</th>
                            <th>Publicado</th>
                            <th>Actualización</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @empty(!$allData)
                        @foreach ($allData as $data)
                        <tr>
                            <td class="text-center">{{ $data->id }}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->description }}</td>
                            <td>{{ $data->salary }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->updated_at }}</td>
                            <td>
                                <a href="{{route('company.jobs.edit',$data->id)}}" class="btn btn-info">Editar</a>
                                <a id="delete" href="{{route('company.jobs.delete', $data->id)}}"
                                    class="btn btn-danger">
                                    Eliminar
                                </a>
                            </td>
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


@section('scripts')
<script type="text/javascript">
    $(function(){
        $(document).on('click', '#delete', function(e){
        	e.preventDefault();
        	var link = $(this).attr("href");
        	Swal.fire({
        	title: '¿Estás seguro?',
        	text: "Se eliminará este empleo y sus postulados",
        	icon: 'warning',
        	showCancelButton: true,
        	confirmButtonColor: '#3085d6',
        	cancelButtonColor: '#d33',
        	confirmButtonText: 'Sí'
        	}).then((result) => {
        	if (result.isConfirmed) {
        		window.location.href = link;
        	Swal.fire(
        	'Eliminado!',
        	'Empleo eliminado correctamente.',
        	'success')}
        	});
        });	
    });
</script>
@endsection


@endsection