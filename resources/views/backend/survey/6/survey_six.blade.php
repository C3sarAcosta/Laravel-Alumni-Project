@extends('student.student_master')

@section('TopTitle')Participación Social @endsection

@section('title_section')Participación social de los egresados @endsection

@php
$user_id_encrypt = Crypt::encrypt(Auth::user()->id);
@endphp

@section('student_content')
<form method="post" action=" {{ route('survey.six.store') }} ">
    @csrf
    <input id="user_id" name="user_id" value=" {{ Auth::user()->id }} " style="display: none">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="organization_selector">¿Pertenece a organizaciones sociales?</label>
                <div class="controls">
                    <select name="organization_selector" id="organization_selector" onchange="changeSelect()"
                        title="¿Pertenece a alguna organización?" class="form-control" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($yes_no as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="organization">Mencionar organizaciones</label>
                <input id="organization" name="organization" type="text" class="form-control" disabled=""
                    title="Mencione esas organizaciones" placeholder="Mencione cuáles organizaciones pertenece">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="agency_selector">¿Pertenece a organismos de profesionistas?</label>
                <div class="controls">
                    <select name="agency_selector" id="agency_selector" onchange="changeSelect()" class="form-control"
                        title="¿Pertenece a algún organismo profesionista?" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($yes_no as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="agency">Mencionar organismos</label>
                <input id="agency" name="agency" type="text" class="form-control" disabled=""
                    title="Mencione esos organismos" placeholder="Mencione cuáles organismos pertenece">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="association_selector">¿Pertenece a asociaciones de egresados?</label>
                <div class="controls">
                    <select name="association_selector" id="association_selector" onchange="changeSelect()"
                        title="¿Pertenece a alguna asociaciones de egresados?" class="form-control" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($yes_no as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="association">Mencionar asosiación</label>
                <input id="association" name="association" type="text" class="form-control" disabled=""
                    title="Mencione esas asosiaciones" placeholder="Mencione cuáles asociaciones pertenece">
            </div>
        </div>
    </div>
    <div class="row mt-2 d-flex justify-content-sm-center">
        <div class="col-4">
            <input type="submit" class="btn btn-block bg-gradient-primary" value="Guardar Encuesta">
        </div>
    </div>
</form>

<div class="row mt-3 d-flex justify-content-sm-center">
    <div class="col-4">
        <a href="{{ route('student.index', $user_id_encrypt) }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>

<script src="{{ asset('backend/js/functions.js') }}" type="text/javascript"> </script>

@endsection