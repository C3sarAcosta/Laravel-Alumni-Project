@extends('student.student_master')

@section('TopTitle')Ubicación Laboral @endsection

@section('title_section')Ubicación laboral de los egresados @endsection

@section('student_content')
<form method="post" action=" {{ route('survey.three.update') }} " onsubmit="return validateSubmit();">
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
                        <option value="{{ $option }}" {{ $userData->do_for_living == $option ? "selected" : "" }}>
                            {{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <hr id="hr1">
    <div class="row" name="study_row" id="study_row">
        <div class="col-6">
            <div class="form-group">
                <label for="speciality">Indique que es lo que está estudiando</label>
                <div class="controls">
                    <select name="speciality" id="speciality" class="form-control"
                        title="Indique lo que está estudiando">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($consts['Speciality'] as $option)
                        <option value="{{ $option }}" {{ ($userData->speciality != null)
                            ? ($userData->speciality == $option ? "selected" : "")
                            : "" }}>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="school">Especialidad e Institución</label>
                <input type="text" id="school" name="school" class="form-control"
                    title="Indique la institución donde estudia"
                    value='{{ ($userData->school != null) ? $userData->school: "" }}'
                    placeholder="Ejemplo: Mecatrónica, Tecnológico de Chihuahua" />
            </div>
        </div>
    </div>

    <hr id="hr2">
    <div class="row" name="work_row" id="work_row">
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
                        <option value="{{ $option }}" {{ ($userData->long_take_job != null)
                            ? ($userData->long_take_job == $option ? "selected" : "")
                            : "" }}>
                            {{ $option }}
                        </option>
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
                        <option value="{{ $option }}" {{ ($userData->hear_about != null)
                            ? ($userData->hear_about == $option ? "selected" : "")
                            : "" }}>
                            {{ $option }}
                        </option>
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
                            title="Competencia #1" {{ $userData->competence1 == 1 ? "checked" : "" }}>
                        <label class="form-check-label">Competencias laborales</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence2" name="competence2" type="checkbox"
                            title="Competencia #2" {{ $userData->competence2 == 1 ? "checked" : "" }}>
                        <label class="form-check-label">Título Profesional</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence3" name="competence3" type="checkbox"
                            title="Competencia #3" {{ $userData->competence3 == 1 ? "checked" : "" }}>
                        <label class="form-check-label">Examen de selección</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence4" name="competence4" type="checkbox"
                            title="Competencia #4" {{ $userData->competence4 == 1 ? "checked" : "" }}>
                        <label class="form-check-label">Idioma Extranjero</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence5" name="competence5" type="checkbox"
                            title="Competencia #5" {{ $userData->competence5 == 1 ? "checked" : "" }}>
                        <label class="form-check-label">Actitudes y habilidades socio-comunicativas (principios y
                            valores)</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence6" name="competence6" type="checkbox"
                            title="Competencia #6" {{ $userData->competence6 == 1 ? "checked" : "" }}>
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
                        <option value="{{ $option }}" {{ ($userData->language_most_spoken != null)
                            ? ($userData->language_most_spoken == $option ? "selected" : "")
                            : "" }}>
                            {{ $option }}
                        </option>
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
                    <input type="text" class="form-control" id="speak_percent" name="speak_percent" max="100"
                        value='{{ ($userData->speak_percent != null) ? $userData->speak_percent : "0" }}' min="0"
                        readonly title="Porcentaje del habla" />
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
                    <input type="text" class="form-control" id="write_percent" name="write_percent" max="100"
                        value='{{ ($userData->write_percent != null) ? $userData->write_percent : "0" }}' min="0"
                        readonly title="Porcentaje de escritura" />
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
                    <input type="text" class="form-control" id="read_percent" name="read_percent" max="100"
                        value='{{ ($userData->read_percent != null) ? $userData->read_percent : "0" }}' min="0" readonly
                        title="Porcentaje de lectura" />
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
                    <input type="text" class="form-control" id="listen_percent" name="listen_percent"
                        value='{{ ($userData->listen_percent != null) ? $userData->listen_percent : "0" }}' max="100"
                        min="0" readonly title="Porcentaje de escucha" />
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
                        <option value="{{ $option }}" {{ ($userData->seniority != null)
                            ? ($userData->seniority == $option ? "selected" : "")
                            : "" }}>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6 mt-3">
            <div class="form-group">
                <label for="year">Año de ingreso</label>
                <input autocomplete="off" pattern="[0-9]{4}" title="Porfavor ingrese un año correcto de 4 dígitos"
                    type="text" id="year" name="year" class="yearpicker form-control" value="{{ $userData->year }}"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="salary">Ingreso (Salario minimo diario)</label>
                <div class="controls">
                    <select name="salary" id="salary" class="form-control" title="Indique su salario">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($consts['Salary'] as $option)
                        <option value="{{ $option }}" {{ ($userData->salary != null)
                            ? ($userData->salary == $option ? "selected" : "")
                            : "" }}>
                            {{ $option }}
                        </option>
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
                        <option value="{{ $option }}" {{ ($userData->management_level != null)
                            ? ($userData->management_level == $option ? "selected" : "")
                            : "" }}>
                            {{ $option }}
                        </option>
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
                        <option value="{{ $option }}" {{ ($userData->job_condition != null)
                            ? ($userData->job_condition == $option ? "selected" : "")
                            : "" }}>
                            {{ $option }}
                        </option>
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
                        @for ($i = 0; $i < 101; $i+=20) <option value="{{ $i }}" {{ ($userData->job_relationship !=
                            null)
                            ? ($userData->job_relationship == $i ? "selected" : "")
                            : "" }}>
                            {{ $i }}%
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="business_name">Razón Social</label>
                <input type="text" class="form-control" id="business_name" name="business_name"
                    value='{{ ($userData->business_name != null) ? $userData->business_name : "" }}'
                    title="Indique el nombre de la empresa" placeholder="Razón Social" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="business_activity">Giro o actividad principal de la empresa u organismo</label>
                <input type="text" class="form-control" id="business_activity" name="business_activity"
                    value='{{ ($userData->business_activity != null) ? $userData->business_activity : "" }}'
                    title="Indique el giro de la empresa"
                    placeholder="Giro o actividad principal de la empresa u organismo. Ejemplo: Industrial, Comercial, etc." />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="address">Domicilio</label>
                <input type="text" class="form-control" id="address" name="address"
                    value='{{ ($userData->address != null) ? $userData->address : "" }}' placeholder="Calle #Número"
                    title="Indique el domicilio de la empresa">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="zip">Código Postal</label>
                <input type="text" class="form-control" id="zip" name="zip" onchange="getZipCode()"
                    onkeypress="ValidateNumbers(event);" value='{{ ($userData->zip != null) ? $userData->zip : "" }}'
                    placeholder="Código Postal"
                    title="Indique el código postal, si espera se rellanará si es que existe información con ese código" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="suburb">Colonia</label>
                <div class="controls">
                    <input type="text" class="form-control" id="suburb" name="suburb" placeholder="Colonia"
                        value='{{ ($userData->suburb != null) ? $userData->suburb : "" }}'
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
                <input type="text" class="form-control" id="state" name="state"
                    value='{{ ($userData->state != null) ? $userData->state : "" }}' placeholder="Estado"
                    title="Indique el estado donde está la empresa" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="city">Ciudad</label>
                <input type="text" class="form-control" id="city" name="city"
                    value='{{ ($userData->city != null) ? $userData->city : "" }}' placeholder="Ciudad"
                    title="Indique la ciudad donde está la empresa" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="municipality">Municipio</label>
                <input type="text" class="form-control" id="municipality" name="municipality"
                    value='{{ ($userData->municipality != null) ? $userData->municipality : "" }}'
                    placeholder="Municipio" title="Indique el municipio donde está la empresa" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="tel" maxlength="10" pattern="[0-9]{10}" class="form-control" id="phone" name="phone"
                    onkeypress="ValidateNumbers(event);" placeholder="Teléfono" title="Por favor escribe tu teléfono"
                    value='{{ ($userData->phone != null) ? $userData->phone : "" }}' />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="fax">Fax</label>
                <input type="text" class="form-control" id="fax" name="fax"
                    value='{{ ($userData->fax != null) ? $userData->fax : "" }}' placeholder="Fax"
                    title="Indique el fax de la empresa">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="web_page">Página Web</label>
                <input type="text" class="form-control" id="web_page" name="web_page"
                    value='{{ ($userData->web_page != null) ? $userData->web_page : "" }}' placeholder="Página Web"
                    title="Indique la página web de la empresa">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="boss_email">Jefe inmediato</label>
                <input type="text" class="form-control" id="boss_email" name="boss_email"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                    value='{{ ($userData->boss_email != null) ? $userData->boss_email : "" }}'
                    placeholder="Correo electrónico del jefe" title="Indique el correo del jefe inmediato" />
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
                        <option value="{{ $option }}" {{ ($userData->business_structure != null)
                            ? ($userData->business_structure == $option ? "selected" : "")
                            : "" }}>
                            {{ $option }}
                        </option>
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
                        <option value="{{ $option }}" {{ ($userData->company_size != null)
                            ? ($userData->company_size == $option ? "selected" : "")
                            : "" }}>
                            {{ $option }}
                        </option>
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
                        <option value="{{ $activity }}" {{ ($userData->business_activity_selector != null)
                            ? ($userData->business_activity_selector == $activity ? "selected" : "")
                            : "" }}>
                            {{$activity}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2 " id="saveRow">
        <div class="col-4">
            <input type="submit" class="btn btn-block bg-gradient-primary" value="Actualizar Encuesta" />
        </div>
    </div>
</form>

<div class="row mt-3 " id="cancelRow">
    <div class="col-4">
        <a href="{{ URL::previous() }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>

<script src="{{ asset('backend/js/functions.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    WorkAndStudy('{{$userData->do_for_living}}');
</script>

@section('scripts')
<script type="text/javascript">
function validateSubmit() {
    if ($("#do_for_living").val().includes('ESTUDIA') && !$("#do_for_living").val().includes('NO')) {
        if ($("#speciality").val() == null || $("#speciality").val().trim() == '') {
            toastr.error('Por favor mencione su especialidad, es obligatorio si selecciona que estudia.');
            return false;
        }
        if ($("#school").val() == null || $("#school").val().trim() == '') {
            toastr.error('Por favor mencione su escuela, es obligatorio si selecciona que estudia.');
            return false;
        }
    }

    if ($("#do_for_living").val().includes('TRABAJA') && !$("#do_for_living").val().includes('NO')) {
        if ($("#long_take_job").val() == null || $("#long_take_job").val().trim() == '') {
            toastr.error('Por favor mencione el tiempo transcurrido, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#hear_about").val() == null || $("#hear_about").val().trim() == '') {
            toastr.error('Por favor mencione el modo de obtención del empleo, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#language_most_spoken").val() == null || $("#language_most_spoken").val().trim() == '') {
            toastr.error('Por favor mencione el idioma utilizado, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#seniority").val() == null || $("#seniority").val().trim() == '') {
            toastr.error('Por favor mencione la antigüedad, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#year").val() == null || $("#year").val().trim() == '') {
            toastr.error('Por favor mencione el año de ingreso, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#salary").val() == null || $("#salary").val().trim() == '') {
            toastr.error('Por favor mencione el salario, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#management_level").val() == null || $("#management_level").val().trim() == '') {
            toastr.error('Por favor mencione el nivel jerárgico, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#job_condition").val() == null || $("#job_condition").val().trim() == '') {
            toastr.error('Por favor mencione la condición de trabajo, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#job_relationship").val() == null || $("#job_relationship").val().trim() == '') {
            toastr.error('Por favor mencione la relación del trabajo con su área de formación, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#business_name").val() == null || $("#business_name").val().trim() == '') {
            toastr.error('Por favor mencione la razón social de la empresa, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#business_activity").val() == null || $("#business_activity").val().trim() == '') {
            toastr.error('Por favor mencione giro o actividad principal, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#address").val() == null || $("#address").val().trim() == '') {
            toastr.error('Por favor mencione el domicilio, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#zip").val() == null || $("#zip").val().trim() == '') {
            toastr.error('Por favor mencione el código postal, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#suburb").val() == null || $("#suburb").val().trim() == '') {
            toastr.error('Por favor mencione la colonia, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#state").val() == null || $("#state").val().trim() == '') {
            toastr.error('Por favor mencione el estado, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#city").val() == null || $("#city").val().trim() == '') {
            toastr.error('Por favor mencione la ciudad, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#municipality").val() == null || $("#municipality").val().trim() == '') {
            toastr.error('Por favor mencione el municipio, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#boss_email").val() == null || $("#boss_email").val().trim() == '') {
            toastr.error('Por favor mencione el correo de su jefe, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#business_structure").val() == null || $("#business_structure").val().trim() == '') {
            toastr.error('Por favor mencione la estructura de la empresa u organismo, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#company_size").val() == null || $("#company_size").val().trim() == '') {
            toastr.error('Por favor mencione el tamaño de la empresa u organismo, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#business_activity_selector").val() == null || $("#business_activity_selector").val().trim() == '') {
            toastr.error('Por favor mencione la actividad económica de la empresa u organismo, es obligatorio si selecciona que trabaja.');
            return false;
        }
    }
    return true;
}
</script>
@endsection

@endsection