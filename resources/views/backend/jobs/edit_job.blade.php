@extends('company.company_master')

@section('TopTitle')Trabajo @endsection

@section('title_section')Editar empleo @endsection

@section('company_content')
<form method="post" action="{{ route('company.jobs.update', $job->id) }}">
    @csrf
    <input class="d-none" id="id_user" name="id_user" value=" {{ Auth::user()->id }} ">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="title">Título del empleo</label>
                <input id="title" name="title" type="text" class="form-control" title="Escribe el título del empleo"
                    placeholder="Ejemplo: Analista de Datos" required value="{{$job->title}}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="title">Salario</label>
                $<input id="salary" name="salary" type="text" class="form-control" title="Escribe el salario"
                    placeholder="Ejemplo: $5000 mensuales" required value="{{$job->salary}}">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea id="description" name="description" class="form-control" rows="4"
                    placeholder="Ejemplo: Se busca ingeniero en sistemas con conocimientos en el lenguaje C# y base de datos Microsoft SQL Server para análisis de datos"
                    required oninvalid="this.setCustomValidity('Por favor es importante agregar una descripción')"
                    oninput="setCustomValidity('')">{{$job->description}}</textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="id_career">Carrera preferente</label>
                <div class="controls">
                    <select name="id_career" id="id_career" class="form-control" title="Seleccione la carrera"
                        required oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($careers as $career)
                        <option value="{{ $career->id }}" {{$job->id_career == $career->id ? "selected" : "" }}>
                            {{ $career->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2 d-flex justify-content-sm-center">
        <div class="col-4">
            <input type="submit" class="btn btn-block bg-gradient-primary" value="Actualizar Empleo">
        </div>
    </div>
</form>

<div class="row mt-3 d-flex justify-content-sm-center">
    <div class="col-4">
        <a href="{{ URL::previous() }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>

@endsection