@extends('company.company_master')

@section('TopTitle')Competencias Laborales @endsection

@section('title_section')Competencias Laborales @endsection

@section('company_content')
<form method="post" action="{{ route('survey.three.company.update') }}">
    @csrf
    <label>En su opinión ¿qué competencias considera deben desarrollar los egresados del Instituto Tecnológico, para
        desempeñarse eficientemente en sus actividades laborales? <br>
        Por favor evalúe conforme a la tabla siguiente: Califique del 1(menor) al 5 (mayor):</label>
    <hr>

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="resolve_conflicts">Habilidad para resolver conflictos</label>
                <div class="controls">
                    <select name="resolve_conflicts" id="resolve_conflicts" class="form-control" required
                        title="Por favor califique la habilidad"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->resolve_conflicts == $i ?
                            'selected' : '' }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="orthography">Ortografía y redacción de documentos</label>
                <div class="controls">
                    <select name="orthography" id="orthography" class="form-control" required
                        title="Por favor califique la ortografía"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->orthography == $i ?
                            'selected' : '' }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="process_improvement">Mejora de procesos</label>
                <div class="controls">
                    <select name="process_improvement" id="process_improvement" class="form-control" required
                        title="Por favor califique los procesos"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->process_improvement == $i ?
                            'selected' : '' }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="teamwork">Trabajo en equipo</label>
                <div class="controls">
                    <select name="teamwork" id="teamwork" class="form-control" required
                        title="Por favor califique el trabajo en equipo"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->teamwork == $i ?
                            'selected' : '' }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="time_management">Habilidad para administrar tiempo</label>
                <div class="controls">
                    <select name="time_management" id="time_management" class="form-control" required
                        title="Por favor califique la habilidad para administación"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->time_management == $i ?
                            'selected' : '' }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="security">Seguridad personal</label>
                <div class="controls">
                    <select name="security" id="security" class="form-control" required
                        title="Por favor califique la seguridad personal"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->security == $i ?
                            'selected' : '' }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="ease_speech">Facilidad de palabra</label>
                <div class="controls">
                    <select name="ease_speech" id="ease_speech" class="form-control" required
                        title="Por favor califique la facilidad de palabra"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->ease_speech == $i ?
                            'selected' : '' }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="project_management">Gestión de proyectos</label>
                <div class="controls">
                    <select name="project_management" id="project_management" class="form-control" required
                        title="Por favor califique la gestión de proyectos"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->project_management == $i ?
                            'selected' : '' }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="puntuality">Puntualidad y asistencia</label>
                <div class="controls">
                    <select name="puntuality" id="puntuality" class="form-control" required
                        title="Por favor califique la puntualidad"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->puntuality == $i ?
                            'selected' : '' }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="rules">Cumplimiento de las normas</label>
                <div class="controls">
                    <select name="rules" id="rules" class="form-control" required
                        title="Por favor califique el cumplimiento de normas"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->rules == $i ?
                            'selected' : '' }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="integration_work">Integración al trabajo</label>
                <div class="controls">
                    <select name="integration_work" id="integration_work" class="form-control" required
                        title="Por favor califique la integración al trabajo"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->integration_work == $i ?
                            'selected' : '' }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="creativity">Creatividad e innovación</label>
                <div class="controls">
                    <select name="creativity" id="creativity" class="form-control" required
                        title="Por favor califique la creatividad"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->creativity == $i ?
                            'selected' : '' }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="bargaining">Capacidad de negociación</label>
                <div class="controls">
                    <select name="bargaining" id="bargaining" class="form-control" required
                        title="Por favor califique la capacidad de negociación"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->bargaining == $i ?
                            'selected' : '' }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="abstraction">Abstracción, análisis y síntesis</label>
                <div class="controls">
                    <select name="abstraction" id="abstraction" class="form-control" required
                        title="Por favor califique la abstracción"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->abstraction == $i ?
                            'selected' : '' }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="leadership">Liderazgo y toma de decisión</label>
                <div class="controls">
                    <select name="leadership" id="leadership" class="form-control" required
                        title="Por favor califique el liderazgo"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->leadership == $i ?
                            'selected' : '' }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="changes">Adaptar al cambio</label>
                <div class="controls">
                    <select name="changes" id="changes" class="form-control" required
                        title="Por favor califique el liderazgo"
                        oninvalid="this.setCustomValidity('Por favor seleccione una calificación correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ $userData->changes == $i ?
                            'selected' : '' }}>
                            {{ $i }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="row mb-3 mt-4 ml-1 d-flex justify-content-sm-center">
        <label>Con base al desempeño laboral así como a las actividades laborales que realiza el egresado.
            ¿Cómo considera su desempeño laboral respecto a su formación académica? Del total de egresados anote el
            porcentaje que corresponda.</label>
    </div>

    <div class="row mt-2 d-flex justify-content-sm-center">
        <div class="col-4">
            <div class="form-group">
                <div class="controls">
                    <select name="job_performance" id="job_performance" required class="form-control"
                        title="Por favor seleccione la calidad de sus docentes"
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($constants['GOOD_BAD_QUESTION'] as $option)
                        <option value="{{ $option }}" {{ $userData->job_performance == $option ?
                            'selected' : '' }}>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label>De acuerdo con las necesidades de su empresa u organismo, ¿qué sugiere para mejorar la formación
                    de los
                    egresados del Instituto Tecnológico?</label>
                <textarea id="requirement" name="requirement" class="form-control" rows="4"
                    placeholder="Escribe aquí sus sugerencias de mejora" required
                    oninvalid="this.setCustomValidity('Por favor es importante su opinión')"
                    oninput="setCustomValidity('')">{{ $userData->requirement }}</textarea>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label>Comentarios y sugerencias</label>
                <textarea id="comments" name="comments" class="form-control" rows="4"
                    placeholder="Escribe aquí sus comentarios">{{ $userData->comments }}</textarea>
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
        <a href="{{ route('company.index') }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>
@endsection