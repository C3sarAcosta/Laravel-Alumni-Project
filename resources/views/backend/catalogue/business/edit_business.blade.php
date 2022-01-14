@extends('admin.admin_master')

@section('TopTitle')Actividad Económica @endsection

@section('title_section')Editar Actividad Económica @endsection

@section('admin_content')
<form method="post" action="{{ route('business.update') }}">
    @csrf
    <input id="business_id" name="business_id" class="d-none" value="{{ $editData->id }}">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="name">Nombre de la actividad</label>
                <input id="name" name="name" type="text" class="form-control" title="Escribe el nombre de la actividad"
                    placeholder="Escribe el nombre de la actividad" required value="{{ $editData->name }}">                
            </div>
        </div>
    </div>

    <div class="row mt-2 d-flex justify-content-sm-center">
        <div class="col-4">
            <input type="submit" class="btn btn-block bg-gradient-primary" value="Actualizar Lenguaje">
        </div>
    </div>
</form>

<div class="row mt-3 d-flex justify-content-sm-center">
    <div class="col-4">
        <a href="{{ URL::previous() }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>
@endsection