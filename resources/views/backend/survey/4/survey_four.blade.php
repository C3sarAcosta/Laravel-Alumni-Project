@php
$user_id_encrypt = Crypt::encrypt(Auth::user()->id);
@endphp

@extends('student.student_master')

@section('TopTitle')Desempeño Profesional @endsection

@section('title_section')Desempeño profesional de los egresados @endsection

@section('student_content')
<form method="post" action=" {{route('survey.four.store')}} ">
    @csrf
    <input id="user_id" name="user_id" value=" {{Auth::user()->id}} " style="display: none">
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="efficiency_work_activities">Eficiencia para realizar las actividades laborales, en relación
                    con su formación
                    académica</label>
                <div class="controls">
                    <select name="efficiency_work_activities" id="efficiency_work_activities" class="form-control"
                        required="" oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option value="Muy eficiente">Muy eficiente</option>
                        <option value="Eficiente">Eficiente</option>
                        <option value="Poco eficiente">Poco eficiente</option>
                        <option value="Deficiente">Deficiente</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="academic_training">Cómo califica su formación académica con respecto a su desempeño
                    laboral</label>
                <div class="controls">
                    <select name="academic_training" id="academic_training" class="form-control" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option value="Excelente">Excelente</option>
                        <option value="Bueno">Bueno</option>
                        <option value="Regular">Regular</option>
                        <option value="Malo">Malo</option>
                        <option value="Pesimo">Pésimo</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="usefulness_professional_residence">Utilidad de las residencias profesionales o prácticas
                    profesionales para su desarrollo
                    laboral y profesional</label>
                <div class="controls">
                    <select name="usefulness_professional_residence" id="usefulness_professional_residence"
                        class="form-control" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option value="Excelente">Excelente</option>
                        <option value="Bueno">Bueno</option>
                        <option value="Regular">Regular</option>
                        <option value="Malo">Malo</option>
                        <option value="Pesimo">Pésimo</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row mb-3 mt-4 ml-1 d-flex justify-content-sm-center">
        <label><u>Aspectos que valora la empresa u organismo para la contratación de egresados. Llena el formulario
                donde 1 es
                poco y 5 es mucho.</u></label>
    </div>
    <hr>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="study_area">Área o Campo de Estudio</label>
                <div class="controls">
                    <select name="study_area" id="study_area" class="form-control" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="title">Titulación</label>
                <div class="controls">
                    <select name="title" id="title" class="form-control" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="experience">Experiencia Laboral / Práctica (antes de egresar)</label>
                <div class="controls">
                    <select name="experience" id="experience" class="form-control" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="job_competence">Competencia Laboral: Resolver problemas, análisis, aprendizaje, trabajo en
                    equipo, etc</label>
                <div class="controls">
                    <select name="job_competence" id="job_competence" class="form-control" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="positioning">Posicionamiento de la Institución de Egreso</label>
                <div class="controls">
                    <select name="positioning" id="positioning" class="form-control" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="languages">Conocimiento de Idiomas Extranjeros</label>
                <div class="controls">
                    <select name="languages" id="languages" class="form-control" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="recommendations">Recomendaciones / Referencias</label>
                <div class="controls">
                    <select name="recommendations" id="recommendations" class="form-control" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="personality">Personalidad / Actitudes</label>
                <div class="controls">
                    <select name="personality" id="personality" class="form-control" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="leadership">Capacidad de liderazgo</label>
                <div class="controls">
                    <select name="leadership" id="leadership" class="form-control" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="others">Otros</label>
                <div class="controls">
                    <select name="others" id="others" class="form-control" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
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