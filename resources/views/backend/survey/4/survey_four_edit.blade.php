@extends('student.student_master')

@section('TopTitle')Desempeño Profesional @endsection

@section('title_section')Desempeño profesional de los egresados @endsection

@section('student_content')
<form method="post" action=" {{ route('survey.four.update') }} ">
    @csrf
    <input id="user_id" name="user_id" value=" {{ Auth::user()->id }} " style="display: none">
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="efficiency_work_activities">
                    Eficiencia para realizar las actividades laborales, en relación con su formación académica
                </label>
                <div class="controls">
                    <select name="efficiency_work_activities" id="efficiency_work_activities" class="form-control"
                        title="Por favor selecciona la calidad para realizar las actividades laborales, en relación con su formación académica"
                        required="" oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{ $userData->efficiency_work_activities == "MUY EFICIENTE" ? "selected" : "" }}
                            value="MUY EFICIENTE">
                            MUY EFICIENTE
                        </option>
                        <option {{ $userData->efficiency_work_activities == "EFICIENTE" ? "selected" : "" }}
                            value="EFICIENTE">
                            EFICIENTE
                        </option>
                        <option {{ $userData->efficiency_work_activities == "POCO EFICIENTE" ? "selected" : "" }}
                            value="POCO EFICIENTE">
                            POCO EFICIENTE
                        </option>
                        <option {{ $userData->efficiency_work_activities == "DEFICIENTE" ? "selected" : "" }}
                            value="DEFICIENTE">
                            DEFICIENTE
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="academic_training">
                    Cómo califica su formación académica con respecto a su desempeño laboral
                </label>
                <div class="controls">
                    <select name="academic_training" id="academic_training" class="form-control" required=""
                        title="Por favor selecciona la calidad de formación académica con respecto a su desempeño"
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{ $userData->academic_training == "EXCELENTE" ? "selected" : "" }} value="EXCELENTE">
                            EXCELENTE
                        </option>
                        <option {{ $userData->academic_training == "BUENO" ? "selected" : "" }} value="BUENO">
                            BUENO
                        </option>
                        <option {{ $userData->academic_training == "REGULAR" ? "selected" : "" }} value="REGULAR">
                            REGULAR
                        </option>
                        <option {{ $userData->academic_training == "MALO" ? "selected" : "" }} value="MALO">
                            MALO
                        </option>
                        <option {{ $userData->academic_training == "PÉSIMO" ? "selected" : "" }} value="PÉSIMO">
                            PÉSIMO
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="usefulness_professional_residence">
                    Utilidad de las residencias profesionales o prácticas profesionales para su desarrollo laboral y
                    profesional
                </label>
                <div class="controls">
                    <select name="usefulness_professional_residence" id="usefulness_professional_residence"
                        title="Por favor selecciona la calidad de utilidad de residencia profesionale o práctica profesionale para su desarrollo laboral"
                        class="form-control" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{ $userData->usefulness_professional_residence == "EXCELENTE" ? "selected" : "" }}
                            value="EXCELENTE">
                            EXCELENTE
                        </option>
                        <option {{ $userData->usefulness_professional_residence == "BUENO" ? "selected" : "" }}
                            value="BUENO">
                            BUENO
                        </option>
                        <option {{ $userData->usefulness_professional_residence == "REGULAR" ? "selected" : "" }}
                            value="REGULAR">
                            REGULAR
                        </option>
                        <option {{ $userData->usefulness_professional_residence == "MALO" ? "selected" : "" }}
                            value="MALO">
                            MALO
                        </option>
                        <option {{ $userData->usefulness_professional_residence=="PÉSIMO" ? "selected" : "" }}
                            value="PÉSIMO">
                            PÉSIMO
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row mb-3 mt-4 ml-1 d-flex justify-content-sm-center">
        <label>
            <h5>Aspectos que valora la empresa u organismo para la contratación de egresados. Llena el formulario
                donde 1 es poco y 5 es mucho.</h5>
        </label>
    </div>
    <hr>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="study_area">Área o Campo de Estudio</label>
                <div class="controls">
                    <select name="study_area" id="study_area" class="form-control" required=""
                        title="Por favor califique el área de estudio"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->study_area == $i ? "selected"
                            : "" }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="title">Titulación</label>
                <div class="controls">
                    <select name="title" id="title" class="form-control" required=""
                        title="Por favor califique la titulación"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->title == $i ? "selected" : ""
                            }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="experience">Experiencia Laboral / Práctica (antes de egresar)</label>
                <div class="controls">
                    <select name="experience" id="experience" class="form-control" required=""
                        title="Por favor califique la experiencia laboral"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->experience == $i ? "selected"
                            : "" }}>
                            {{ $i }}
                            </option>
                            @endfor
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
                        title="Por favor califique la competencia laboral"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->job_competence == $i ?
                            "selected" : "" }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="positioning">Posicionamiento de la Institución de Egreso</label>
                <div class="controls">
                    <select name="positioning" id="positioning" class="form-control" required=""
                        title="Por favor califique el posicionamiento de la institución de egreso"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->positioning == $i ?
                            "selected" : "" }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="languages">Conocimiento de Idiomas Extranjeros</label>
                <div class="controls">
                    <select name="languages" id="languages" class="form-control" required=""
                        title="Por favor califique el conocimiento de idiomas extranjeros"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->languages == $i ? "selected"
                            :"" }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="recommendations">Recomendaciones / Referencias</label>
                <div class="controls">
                    <select name="recommendations" id="recommendations" class="form-control" required=""
                        title="Por favor califique las recomendaciones"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->recommendations == $i ?
                            "selected" : "" }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="personality">Personalidad / Actitudes</label>
                <div class="controls">
                    <select name="personality" id="personality" class="form-control" required=""
                        title="Por favor califique la personalidad"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->personality == $i ?
                            "selected" : "" }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="leadership">Capacidad de liderazgo</label>
                <div class="controls">
                    <select name="leadership" id="leadership" class="form-control" required=""
                        title="Por favor califique la capacidad de liderazgo"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->leadership == $i ? "selected"
                            : "" }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="others">Otros</label>
                <div class="controls">
                    <select name="others" id="others" class="form-control" required=""
                        title="Por favor califique otros aspectos"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->others == $i ? "selected" :
                            "" }}>
                            {{ $i }}
                            </option>
                            @endfor
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
        <a href="{{ URL::previous() }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>

@endsection