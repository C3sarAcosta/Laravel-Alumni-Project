@extends('admin.admin_master')

@section('TopTitle')Carreras @endsection

@section('title_section')Editar carrera @endsection

@php
$arr = explode(' ',trim($editData->name));
$degree = $arr[0];
array_shift($arr);
$name = join(" ", $arr);

@endphp

@section('admin_content')
<form method="post" action="{{ route('career.update', $editData->id) }}">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="career_selector">Grado académico</label>
                <div class="controls">
                    <select name="career_selector" id="career_selector" class="form-control"
                        title="Mencione el grado académico" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option value="LICENCIATURA" {{ $degree=="LICENCIATURA" ? "selected" : "" }}>
                            LICENCIATURA
                        </option>
                        <option value="INGENIERIA" {{ $degree=="INGENIERIA" ? "selected" : "" }}>
                            INGENIERIA
                        </option>
                        <option value="MAESTRIA" {{ $degree=="MAESTRIA" ? "selected" : "" }}>
                            MAESTRIA
                        </option>
                        <option value="ESPECIALIDAD" {{ $degree=="ESPECIALIDAD" ? "selected" : "" }}>
                            ESPECIALIDAD
                        </option>
                        <option value="DOCTORADO" {{ $degree=="DOCTORADO" ? "selected" : "" }}>
                            DOCTORADO
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="career">Nombre de la carrera</label>
                <input id="career" name="career" type="text" class="form-control"
                    title="Escribe el nombre de la carrera" placeholder="Escribe el nombre de la carrera" required
                    value="{{ $name }}">
            </div>
        </div>
    </div>

    <div class="row mt-2 d-flex justify-content-sm-center">
        <div class="col-4">
            <input type="submit" class="btn btn-block bg-gradient-primary" value="Actualizar Carrera">
        </div>
    </div>
</form>

<div class="row mt-3 d-flex justify-content-sm-center">
    <div class="col-4">
        <a href="{{ URL::previous() }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>
@endsection