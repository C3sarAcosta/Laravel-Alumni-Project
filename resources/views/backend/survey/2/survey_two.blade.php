@extends('student.student_master')

@section('TopTitle')Pertenencia y Disponibilidad @endsection

@section('title_section')
Pertinencia y disponibilidad de medio y recursos para el aprendizaje
@endsection

@php
$user_id_encrypt = Crypt::encrypt(Auth::user()->id);
@endphp

@section('student_content')
<form method="post" action=" {{ route('survey.two.store') }} ">
    @csrf
    <input id="user_id" name="user_id" value="{{ Auth::user()->id }}" style="display: none">
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="quality_teachers">Calidad de los docentes</label>
                <div class="controls">
                    <select name="quality_teachers" id="quality_teachers" required="" class="form-control"
                        title="Por favor seleccione la calidad de sus docentes"
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($good_bad_question as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="syllabus">Plan de estudios</label>
                <div class="controls">
                    <select name="syllabus" id="syllabus" required="" class="form-control"
                        title="Por favor selecciona la calidad de plan de estudios"
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($good_bad_question as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="study_condition">Satisfacción condiciones de estudio (infraestructura)</label>
                <div class="controls">
                    <select name="study_condition" id="study_condition" required="" class="form-control"
                        title="Por favor selecciona la calidad de condiciones de estudio"
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($good_bad_question as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
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
                        title="Por favor selecciona como fue la experiencia en tu residencia"
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($good_bad_question as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
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
                        title="Por favor selecciona la calidad de énfasis que se le prestaba a la investigación"
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($good_bad_question as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
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
                        title="Por favor selecciona la calidad de poder participar en proyectos"
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($good_bad_question as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
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
@endsection