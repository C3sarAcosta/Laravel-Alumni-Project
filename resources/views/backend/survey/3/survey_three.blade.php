@extends('student.student_master')

@section('TopTitle')Ubicación Laboral @endsection

@section('title_section')Ubicación laboral de los egresados @endsection

@section('student_content')
<form method="post" action="{{ route('survey.three.store') }}">
    @csrf
    <input id="user_id" name="user_id" value=" {{ Auth::user()->id }} " style="display: none">
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="do_for_living">Actividad a la que se dedica actualmente</label>
                <div class="controls">
                    <select name="do_for_living" id="do_for_living" onchange="changeActivity()" class="form-control"
                        title="Por favor seleccione una actividad" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($consts['DoForLiving'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <hr id="hr1" style="display: none">
    <div class="row" name="study_row" id="study_row" style="display: none">
        <div class="col-6">
            <div class="form-group">
                <label for="speciality">Indique que es lo que está estudiando</label>
                <div class="controls">
                    <select name="speciality" id="speciality" class="form-control"
                        title="Indique lo que está estudiando">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($consts['Speciality'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="school">Especialidad e Institución</label>
                <input type="text" id="school" name="school" class="form-control" id="email"
                    title="Indique la institución donde estudia"
                    placeholder="Ejemplo: Mecatrónica, Tecnológico de Chihuahua" />
            </div>
        </div>
    </div>

    <hr id="hr2" style="display: none">
    <div class="row" name="work_row" id="work_row" style="display: none">
        <div class="col-6">
            <div class="form-group">
                <label for="long_take_job">Tiempo transcurrido para obtener el primer empleo</label>
                <div class="controls">
                    <select class="form-control" id="long_take_job" name="long_take_job"
                        title="Indique el tiempo en conseguir su empleo">
                        <option value="" selected="" disabled="">
                            Selecciona una opción
                        </option>
                        @foreach ($consts['LongTakeJob'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="hear_about">Medio para obtener el empleo</label>
                <div class="controls">
                    <select class="form-control" id="hear_about" name="hear_about"
                        title="Indique el medio para obtener el empleo">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($consts['HearAbout'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>Requisito de contratación</label>
                <div class="d-flex">
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence1" name="competence1" type="checkbox"
                            title="Competencia #1">
                        <label class="form-check-label">Competencias laborales</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence2" name="competence2" type="checkbox"
                            title="Competencia #2">
                        <label class="form-check-label">Título Profesional</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence3" name="competence3" type="checkbox"
                            title="Competencia #3">
                        <label class="form-check-label">Examen de selección</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence4" name="competence4" type="checkbox"
                            title="Competencia #4">
                        <label class="form-check-label">Idioma Extranjero</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence5" name="competence5" type="checkbox"
                            title="Competencia #5">
                        <label class="form-check-label">Actitudes y habilidades socio-comunicativas (principios y
                            valores)</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence6" name="competence6" type="checkbox"
                            title="Competencia #6">
                        <label class="form-check-label">Ninguno</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-2">
            <div class="form-group">
                <label for="language_most_spoken">Idioma que utiliza en su trabajo actual</label>
                <div class="controls">
                    <select name="language_most_spoken" id="language_most_spoken" class="form-control"
                        title="Idioma que es más utilizado en su trabajo">
                        <option value="" selected="" disabled="">Selecciona una lengua</option>
                        @foreach ($consts['LanguageMostSpoken'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <label for="speak_percent">% Hablar</label>
                <div class="input-group">
                    <span class="input-group-prepend minus">
                        <button type="button" class="btn btn-outline-secondary btn-number">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input type="text" class="form-control" id="speak_percent" name="speak_percent" value="0" max="100"
                        min="0" readonly title="Porcentaje del habla" />
                    <span class="input-group-append plus">
                        <button type="button" class="btn btn-outline-secondary btn-number">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="write_percent">% Escribir</label>
                <div class="input-group">
                    <span class="input-group-prepend minus">
                        <button type="button" class="btn btn-outline-secondary btn-number">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input type="text" class="form-control" id="write_percent" name="write_percent" value="0" max="100"
                        min="0" readonly title="Porcentaje de escritura" />
                    <span class="input-group-append plus">
                        <button type="button" class="btn btn-outline-secondary btn-number">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="read_percent">% Leer</label>
                <div class="input-group">
                    <span class="input-group-prepend minus">
                        <button type="button" class="btn btn-outline-secondary btn-number">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input type="text" class="form-control" id="read_percent" name="read_percent" value="0" max="100"
                        min="0" readonly title="Porcentaje de lectura" />
                    <span class="input-group-append plus">
                        <button type="button" class="btn btn-outline-secondary btn-number">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="listen_percent">% Escuchar</label>
                <div class="input-group">
                    <span class="input-group-prepend minus">
                        <button type="button" class="btn btn-outline-secondary btn-number">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input type="text" class="form-control" id="listen_percent" name="listen_percent" value="0"
                        max="100" min="0" readonly title="Porcentaje de escucha" />
                    <span class="input-group-append plus">
                        <button type="button" class="btn btn-outline-secondary btn-number">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-6 mt-3">
            <div class="form-group">
                <label for="seniority">Antigüedad en el empleo actual</label>
                <div class="controls">
                    <select name="seniority" id="seniority" class="form-control"
                        title="Indique la antigüedad en el empleo actual">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($consts['Seniority'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6 mt-3">
            <div class="form-group">
                <label for="year">Año de ingreso</label>
                <input autocomplete="off" pattern="[0-9]{4}" title="Porfavor ingrese un año correcto de 4 dígitos"
                    type="text" id="year" name="year" class="yearpicker form-control" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="salary">Ingreso (Salario minimo diario)</label>
                <div class="controls">
                    <select name="salary" id="salary" class="form-control" title="Indique su salario">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($consts['Salary'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="management_level">Nivel jerárquico en el trabajo</label>
                <div class="controls">
                    <select name="management_level" id="management_level" class="form-control"
                        title="Indique el nivel jerárquico">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($consts['ManagementLevel'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="job_condition">Condición de trabajo</label>
                <div class="controls">
                    <select name="job_condition" id="job_condition" class="form-control"
                        title="Indique la condición de su trabajo">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($consts['JobCondition'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="job_relationship">Relación del trabajo con su área de formación</label>
                <div class="controls">
                    <select name="job_relationship" id="job_relationship" class="form-control"
                        title="Indique la relación con su área de formación">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @for ($i = 0; $i < 101; $i+=20) <option value="{{ $i }}">{{ $i }}%</option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="business_name">Razón Social</label>
                <input type="text" class="form-control" id="business_name" name="business_name"
                    title="Indique el nombre de la empresa" placeholder="Razón Social" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="business_activity">Giro o actividad principal de la empresa u organismo</label>
                <input type="text" class="form-control" id="business_activity" name="business_activity"
                    title="Indique el giro de la empresa"
                    placeholder="Giro o actividad principal de la empresa u organismo. Ejemplo: Industrial, Comercial, etc." />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="address">Domicilio</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Calle #Número"
                    title="Indique el domicilio de la empresa">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="zip">Código Postal</label>
                <input type="text" class="form-control" id="zip" name="zip" onchange="getZipCode()"
                    onkeypress="ValidateNumbers(event);" placeholder="Código Postal"
                    title="Indique el código postal, si espera se rellanará si es que existe información con ese código" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="suburb">Colonia</label>
                <div class="controls">
                    <input type="text" class="form-control" id="suburb" name="suburb" placeholder="Colonia"
                        title="Indique la colonia donde está la empresa" />
                    <select name="suburb_selector" id="suburb_selector" class="form-control" style="display: none"
                        onchange="onChangeSuburb()">
                        <option value="" selected="" disabled="">
                            Selecciona una colonia
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="state">Estado</label>
                <input type="text" class="form-control" id="state" name="state" placeholder="Estado"
                    title="Indique el estado donde está la empresa" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="city">Ciudad</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad"
                    title="Indique la ciudad donde está la empresa" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="municipality">Municipio</label>
                <input type="text" class="form-control" id="municipality" name="municipality" placeholder="Municipio"
                    title="Indique el municipio donde está la empresa" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="tel" maxlength="10" pattern="[0-9]{10}" class="form-control" id="phone" name="phone"
                    onkeypress="ValidateNumbers(event);" placeholder="Teléfono" title="Por favor escribe tu teléfono" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="fax">Fax</label>
                <input type="text" class="form-control" id="fax" name="fax" placeholder="Fax"
                    title="Indique el fax de la empresa">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="web_page">Página Web</label>
                <input type="text" class="form-control" id="web_page" name="web_page" placeholder="Página Web"
                    title="Indique la página web de la empresa">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="boss_email">Jefe inmediato</label>
                <input type="text" class="form-control" id="boss_email" name="boss_email"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Correo electrónico del jefe"
                    title="Indique el correo del jefe inmediato" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="business_structure">Su empresa u organismo es</label>
                <div class="controls">
                    <select name="business_structure" id="business_structure" class="form-control"
                        title="Indique la estructura de la empresa">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($consts['BusinessStructure'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="company_size">Tamaño de la empresa u organismo</label>
                <div class="controls">
                    <select name="company_size" id="company_size" class="form-control"
                        title="Indique el tamaño de la empresa">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($consts['CompanySize'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="business_activity_selector">Actividad económica de la empresa u organismo</label>
                <div class="controls">
                    <select name="business_activity_selector" id="business_activity_selector" class="form-control"
                        title="Indique la actividad de la empresa">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($business_activity as $activity)
                        <option value="{{ $activity }}">{{ $activity }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2" id="saveRow">
        <div class="col-4">
            <input type="submit" class="btn btn-block bg-gradient-primary" value="Guardar Encuesta" />
        </div>
    </div>
</form>

<div class="row mt-3" id="cancelRow">
    <div class="col-4">
        <a href="{{ URL::previous() }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>

<script src="{{ asset('backend/js/functions.js') }}" type="text/javascript"> </script>

@endsection