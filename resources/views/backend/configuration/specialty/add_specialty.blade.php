@extends('admin.admin_master')

@section('TopTitle')Especialidad @endsection

@section('title_section')Agregar Especialidad @endsection

@section('admin_content')
<form method="post" action="{{ route('specialty.store') }}">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="career_selector">Carrera</label>
                <div class="controls">
                    <select name="career_selector" id="career_selector" class="form-control"
                        title="Seleccione la carrera" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($careers as $career)
                            <option value="{{ $career->id }}">{{ $career->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="specialty">Nombre de la especialidad</label>
                <input id="specialty" name="specialty" type="text" class="form-control"
                    title="Escribe el nombre de la especialidad"
                    placeholder="Escribe el nombre de la especialidad" required>
            </div>
        </div>
    </div>

    <div class="row mt-2 d-flex justify-content-sm-center">
        <div class="col-4">
            <input type="submit" class="btn btn-block bg-gradient-primary" value="Guardar Especialidad">
        </div>
    </div>
</form>

<div class="row mt-3 d-flex justify-content-sm-center">
    <div class="col-4">
        <a href="{{ URL::previous() }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>
@endsection