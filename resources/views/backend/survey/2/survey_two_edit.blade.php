@extends('student.student_master')

@section('TopTitle')Pertenencia y Disponibilidad @endsection

@section('title_section')
Pertinencia y disponibilidad de medio y recursos para el aprendizaje
@endsection

@php
$user_id_encrypt = Crypt::encrypt(Auth::user()->id);
$userAnswer = $userData['0'];
@endphp

@section('student_content')
<form method="post" action=" {{route('survey.two.update')}} ">
    @csrf
    <input id="user_id" name="user_id" value="{{Auth::user()->id}}" style="display: none">
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="quality_teachers">Calidad de los docentes</label>
                <div class="controls">
                    <select name="quality_teachers" id="quality_teachers" required="" class="form-control"
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{ $userAnswer->quality_teachers == "Muy buena" ? "selected" : "" }} value="Muy
                            buena">
                            Muy buena
                        </option>
                        <option {{ $userAnswer->quality_teachers == "Buena" ? "selected" : "" }} value="Buena">
                            Buena
                        </option>
                        <option {{ $userAnswer->quality_teachers == "Regular" ? "selected" : "" }} value="Regular">
                            Regular
                        </option>
                        <option {{ $userAnswer->quality_teachers == "Mala" ? "selected" : "" }} value="Mala">
                            Mala
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="syllabus">Plan de estudios</label>
                <div class="controls">
                    <select name="syllabus" id="syllabus" required="" class="form-control"
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{ $userAnswer->syllabus == "Muy buena" ? "selected" : "" }} value="Muy buena">
                            Muy buena
                        </option>
                        <option {{ $userAnswer->syllabus == "Buena" ? "selected" : "" }} value="Buena">
                            Buena
                        </option>
                        <option {{ $userAnswer->syllabus == "Regular" ? "selected" : "" }} value="Regular">
                            Regular
                        </option>
                        <option {{ $userAnswer->syllabus == "Mala" ? "selected" : "" }} value="Mala">
                            Mala
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="study_condition">Satisfacción condiciones de estudio (infraestructura)</label>
                <div class="controls">
                    <select name="study_condition" id="study_condition" required="" class="form-control"
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{ $userAnswer->study_condition == "Muy buena" ? "selected" : "" }} value="Muy buena">
                            Muy buena
                        </option>
                        <option {{ $userAnswer->study_condition == "Buena" ? "selected" : "" }} value="Buena">
                            Buena
                        </option>
                        <option {{ $userAnswer->study_condition == "Regular" ? "selected" : "" }} value="Regular">
                            Regular
                        </option>
                        <option {{ $userAnswer->study_condition == "Mala" ? "selected" : "" }} value="Mala">
                            Mala
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-4">
            <div class="form-group">
                <label for="experience">Experiencia obtenida a través de la residencia<br />profesional</label>
                <div class="controls">
                    <select name="experience" id="experience" required="" class="form-control"
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{ $userAnswer->experience == "Muy buena" ? "selected" : "" }} value="Muy buena">
                            Muy buena
                        </option>
                        <option {{ $userAnswer->experience == "Buena" ? "selected" : "" }} value="Buena">
                            Buena
                        </option>
                        <option {{ $userAnswer->experience == "Regular" ? "selected" : "" }} value="Regular">
                            Regular
                        </option>
                        <option {{ $userAnswer->experience == "Mala" ? "selected" : "" }} value="Mala">
                            Mala
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="study_emphasis">Énfasis que se le prestaba a la investigación dentro del proceso de
                    enseñanza</label>
                <div class="controls">
                    <select name="study_emphasis" id="study_emphasis" required="" class="form-control"
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{ $userAnswer->study_emphasis == "Muy buena" ? "selected" : "" }} value="Muy buena">
                            Muy buena
                        </option>
                        <option {{ $userAnswer->study_emphasis == "Buena" ? "selected" : "" }} value="Buena">
                            Buena
                        </option>
                        <option {{ $userAnswer->study_emphasis == "Regular" ? "selected" : "" }} value="Regular">
                            Regular
                        </option>
                        <option {{ $userAnswer->study_emphasis == "Mala" ? "selected" : "" }} value="Mala">
                            Mala
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="participate_projects">Oportunidad de participar en proyectos de investigación y
                    desarrollo</label>
                <div class="controls">
                    <select name="participate_projects" id="participate_projects" required="" class="form-control"
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{ $userAnswer->participate_projects == "Muy buena" ? "selected" : "" }}
                            value="Muy buena">
                            Muy buena
                        </option>
                        <option {{ $userAnswer->participate_projects == "Buena" ? "selected" : "" }} value="Buena">
                            Buena
                        </option>
                        <option {{ $userAnswer->participate_projects == "Regular" ? "selected" : "" }}
                            value="Regular">
                            Regular
                        </option>
                        <option {{ $userAnswer->participate_projects == "Mala" ? "selected" : "" }} value="Mala">
                            Mala
                        </option>
                    </select>
                </div>
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

@endsection