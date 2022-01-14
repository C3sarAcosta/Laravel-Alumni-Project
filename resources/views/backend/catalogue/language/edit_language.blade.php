@extends('admin.admin_master')

@section('TopTitle')Lenguaje @endsection

@section('title_section')Editar lenguaje @endsection

@section('admin_content')
<form method="post" action="{{ route('language.update') }}">
    @csrf
    <input  id="language_id" name="language_id" class="d-none" value="{{ $editData->id }}">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="name">Nombre de la carrera</label>
                <input id="name" name="name" type="text" class="form-control" title="Escribe el nombre del lenguaje"
                    placeholder="Escribe el nombre del lenguaje" required value="{{ $editData->name }}">
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-4">
            <input type="submit" class="btn btn-block bg-gradient-primary" value="Actualizar Lenguaje">
        </div>
    </div>
</form>

<div class="row mt-3">
    <div class="col-4">
        <a href="{{ URL::previous() }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>
@endsection