@extends('student.student_master')

@section('TopTitle')Expéctativas y Actualización @endsection

@section('title_section')Expéctativas de desarrollo, superación profesional y de actualización @endsection

@php
$user_id_encrypt = Crypt::encrypt(Auth::user()->id);
$userAnswer = $userData['0'];
@endphp

@section('student_content')
<form method="post" action=" {{route('survey.five.update')}} ">
    @csrf
    <input id="user_id" name="user_id" value=" {{Auth::user()->id}} " style="display: none">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="courses_selector">¿Le gustaria tomar cursos de actualización?</label>
                <div class="controls">
                    <select name="courses_selector" id="courses_selector" onchange="changeSelect()" class="form-control"
                        required="" oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{ $userAnswer->courses_yes_no == "Si" ? "selected" : "" }} value="Si">Sí</option>
                        <option {{ $userAnswer->courses_yes_no == "No" ? "selected" : "" }} value="No">No</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="courses">Mencionar cursos</label>
                <input id="courses" name="courses" type="text" class="form-control" 
                    {{$userAnswer->courses_yes_no== "Si" ? "value=$userAnswer->courses" : "disabled" }}
                    placeholder="Mencione cuáles serían de su agrado">
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-6">
            <div class="form-group">
                <label for="master_selector">¿Le gustaria tomar algún postgrado?</label>
                <div class="controls">
                    <select id="master_selector" name="master_selector" onchange="changeSelect()" class="form-control"
                        required="" oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{ $userAnswer->master_yes_no == "Si" ? "selected" : "" }} value="Si">Sí</option>
                        <option {{ $userAnswer->master_yes_no == "No" ? "selected" : "" }} value="No">No</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="master">Postgrado</label>
                <input id="master" name="master" type="text" class="form-control"
                {{$userAnswer->master_yes_no== "Si" ? "value=$userAnswer->master" : "disabled" }}
                    placeholder="Mencione cuál sería de su agrado">
            </div>
        </div>
    </div>
    <div class="row mt-2 d-flex justify-content-sm-center">
        <div class="col-4">
            <input type="submit" class="btn btn-block bg-gradient-primary" value="Actualizar Encuesta">
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