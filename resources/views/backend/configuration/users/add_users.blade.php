@extends('admin.admin_master')

@section('TopTitle')Usuarios @endsection

@section('title_section')Agregar usuario @endsection

@section('admin_content')
<form method="post" action="{{ route('users.configuration.store') }}">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="name">Nombre del usuario</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required
                    oninvalid="this.setCustomValidity('Por favor ingrese el nombre del usuario')"
                    oninput="setCustomValidity('')" title=" Por favor escribe el nombre del usuario" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required
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
                <label for="role">Tipo de usuario</label>
                <div class="controls">
                    <select name="role" id="role" required class="form-control" title="Por favor selecciona el tipo de usuario"
                        required oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">
                            Selecciona un tipo de usuario
                        </option>
                        <option value="admin" @if(old('role')=="admin") selected @endif>
                            ADMINISTRADOR
                        </option>
                        <option value="committee" @if(old('role')=="committee") selected @endif>
                            COMITÉ
                        </option>
                    </select>
                </div>
            </div>
        </div>        
    </div>

    <div class="row mt-2 d-flex justify-content-sm-center">
        <div class="col-4">
            <input type="submit" class="btn btn-block bg-gradient-primary" value="Guardar Usuario">
        </div>
    </div>
</form>

<div class="row mt-3 d-flex justify-content-sm-center">
    <div class="col-4">
        <a href="{{ route("users.configuration.view") }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>
@endsection