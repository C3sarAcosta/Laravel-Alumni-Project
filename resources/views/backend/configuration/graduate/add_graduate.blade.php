@extends('admin.admin_master')

@section('TopTitle')Egresados @endsection

@section('title_section')Agregar egresado @endsection

@section('admin_content')
<form method="post" action="{{ route('graduate.store') }}">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="name">Nombre de usuario</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required=""
                    oninvalid="this.setCustomValidity('Por favor ingrese el nombre del usuario')"
                    oninput="setCustomValidity('')" title=" Por favor escribe el nombre del usuario" />
            </div>
        </div>
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
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required=""
                    oninvalid="this.setCustomValidity('Por favor ingrese el correo electrónico')"
                    oninput="setCustomValidity('')" title="Por favor escribe el correo electrónico" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" name="password" type="password" class="form-control"
                    title="Escribe la contraseña del usuario" placeholder="Escribe la contraseña del usuario"
                    required>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="year">Año de Egreso</label>
                <input pattern="[0-9]{4}" title="Por favor ingrese un año correcto de 4 dígitos" type="text" id="year"
                    name="year" readonly class="yearpicker form-control" required=""
                    oninvalid="this.setCustomValidity('Por favor ingrese un año correcto')"
                    oninput="setCustomValidity('')" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="control_number">Número de Control</label>
                <input type="text" class="form-control" id="control_number" name="control_number" required=""
                    pattern="[0-9]{8}" maxlength="8" onkeypress="ValidateNumbers(event);"
                    oninvalid="this.setCustomValidity('Por favor ingrese el número de control')"
                    oninput="setCustomValidity('')" title="Por favor escribe el número de control"
                    placeholder="Número de Control" />
            </div>
        </div>
    </div>

    <div class="row mt-2 d-flex justify-content-sm-center">
        <div class="col-4">
            <input type="submit" class="btn btn-block bg-gradient-primary" value="Guardar Egresado">
        </div>
    </div>
</form>

<div class="row mt-3 d-flex justify-content-sm-center">
    <div class="col-4">
        <a href="{{ URL::previous() }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>

<script src="{{ asset('backend/js/functions.js') }}" type="text/javascript"> </script>
@endsection