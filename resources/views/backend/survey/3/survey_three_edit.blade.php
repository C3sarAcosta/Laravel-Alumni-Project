@extends('student.student_master')

@section('TopTitle')Ubicación Laboral @endsection

@section('title_section')Ubicación laboral de los egresados @endsection

@php
$user_id_encrypt = Crypt::encrypt(Auth::user()->id);
$userAnswer = $userData['0'];
@endphp

@section('student_content')
<form method="post" action=" {{route('survey.three.update')}} ">
    @csrf
    <input id="user_id" name="user_id" value=" {{Auth::user()->id}} " style="display: none">
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="do_for_living">Actividad a la que se dedica actualmente</label>
                <div class="controls">
                    <select name="do_for_living" id="do_for_living" onchange="changeActivity()" 
                        class="form-control" title="Por favor seleccione una actividad" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{$userAnswer->do_for_living == "Trabaja" ? "selected" : ""}}
                            value="Trabaja">
                            Trabaja
                        </option>
                        <option {{$userAnswer->do_for_living == "Estudia" ? "selected" : ""}}
                            value="Estudia">
                            Estudia
                        </option>
                        <option {{$userAnswer->do_for_living == "Estudia y trabaja" ? "selected" : ""}}
                            value="Estudia y trabaja">
                            Estudia y trabaja
                        </option>
                        <option {{$userAnswer->do_for_living == "No estudia ni trabaja" ? "selected" : ""}}
                            value="No estudia ni trabaja">
                            No estudia ni trabaja
                        </option>
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
                    <select name="speciality" id="speciality" class="form-control">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{($userAnswer->speciality != null)
                            ? ($userAnswer->speciality == "Especialidad" ? "selected" : "")
                            : ""}}
                            value="Especialidad">
                            Especialidad
                        </option>
                        <option {{($userAnswer->speciality != null)
                            ? ($userAnswer->speciality == "Maestria" ? "selected" : "")
                            : ""}}
                            value="Maestria">
                            Maestría
                        </option>

                        <option {{($userAnswer->speciality != null)
                            ? ($userAnswer->speciality == "Doctorado" ? "selected" : "")
                            : ""}}
                            value="Doctorado">
                            Doctorado
                        </option>

                        <option {{($userAnswer->speciality != null)
                            ? ($userAnswer->speciality == "Idiomas" ? "selected" : "")
                            : ""}}
                            value="Idiomas">
                            Idiomas
                        </option>

                        <option {{($userAnswer->speciality != null)
                            ? ($userAnswer->speciality == "Otro" ? "selected" : "")
                            : ""}}
                            value="Otro">
                            Otro
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="school">Especialidad e Institución</label>
                <input type="text" id="school" name="school" class="form-control"
                    value='{{($userAnswer->school != null) ? $userAnswer->school: ""}}'
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
                    <select class="form-control" id="long_take_job" name="long_take_job">
                        <option value="" selected="" disabled="">
                            Selecciona una opción
                        </option>
                        <option {{($userAnswer->long_take_job != null)
                            ? ($userAnswer->long_take_job == "Antes de egresar" ? "selected" : "")
                            : ""}}
                            value="Antes de egresar">
                            Antes de egresar
                        </option>
                        <option {{($userAnswer->long_take_job != null)
                            ? ($userAnswer->long_take_job == "Menos de 6 meses" ? "selected" : "")
                            : ""}}
                            value="Menos de 6 meses">
                            Menos de 6 meses
                        </option>
                        <option {{($userAnswer->long_take_job != null)
                            ? ($userAnswer->long_take_job == "6 meses a 1 año" ? "selected" : "")
                            : ""}}
                            value="6 meses a 1 año">
                            6 meses a 1 año
                        </option>
                        <option {{($userAnswer->long_take_job != null)
                            ? ($userAnswer->long_take_job == "Mas de un año" ? "selected" : "")
                            : ""}}
                            value="Mas de un año">
                            Más de un año
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="hear_about">Medio para obtener el empleo</label>
                <div class="controls">
                    <select class="form-control" id="hear_about" name="hear_about">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{($userAnswer->hear_about != null)
                            ? ($userAnswer->hear_about == "Bolsa de trabajo del plantel" ? "selected" : "")
                            : ""}}
                            value="Bolsa de trabajo del plantel">
                            Bolsa de trabajo del plantel
                        </option>
                        <option {{($userAnswer->hear_about != null)
                            ? ($userAnswer->hear_about == "Contacto personal" ? "selected" : "")
                            : ""}}
                            value="Contacto personal">
                            Contacto personal
                        </option>
                        <option {{($userAnswer->hear_about != null)
                            ? ($userAnswer->hear_about == "Residencia profesional" ? "selected" : "")
                            : ""}}
                            value="Residencia profesional">
                            Residencia profesional
                        </option>
                        <option {{($userAnswer->hear_about != null)
                            ? ($userAnswer->hear_about == "Medios masivos de comunicacion" ? "selected" : "")
                            : ""}}
                            value="Medios masivos de comunicacion">
                            Medios masivos de comunicación
                        </option>
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
                            {{$userAnswer->competence1 == 1 ? "checked" : ""}}>
                        <label class="form-check-label">Competencias laborales</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence2" name="competence2" type="checkbox"
                            {{$userAnswer->competence2 == 1 ? "checked" : ""}}>
                        <label class="form-check-label">Título Profesional</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence3" name="competence3" type="checkbox"
                            {{$userAnswer->competence3 == 1 ? "checked" : ""}}>
                        <label class="form-check-label">Examen de selección</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence4" name="competence4" type="checkbox"
                            {{$userAnswer->competence4 == 1 ? "checked" : ""}}>
                        <label class="form-check-label">Idioma Extranjero</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence5" name="competence5" type="checkbox"
                            {{$userAnswer->competence5 == 1 ? "checked" : ""}}>
                        <label class="form-check-label">Actitudes y habilidades socio-comunicativas (principios y
                            valores)</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence6" name="competence6" type="checkbox"
                            {{$userAnswer->competence6 == 1 ? "checked" : ""}}>
                        <label class="form-check-label">Ninguno</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-2">
            <div class="form-group">
                <label for="language_most_spoken">Idioma que utiliza en su trabajo actual</label>
                <div class="controls">
                    <select name="language_most_spoken" id="language_most_spoken" class="form-control">
                        <option value="" selected="" disabled="">Selecciona una lengua</option>
                        <option {{($userAnswer->language_most_spoken != null)
                            ? ($userAnswer->language_most_spoken == "Español" ? "selected" : "")
                            : ""}}
                            value="Español">
                            Español
                        </option>
                        <option {{($userAnswer->language_most_spoken != null)
                            ? ($userAnswer->language_most_spoken == "Ingles" ? "selected" : "")
                            : ""}}
                            value="Ingles">
                            Inglés
                        </option>
                        <option {{($userAnswer->language_most_spoken != null)
                            ? ($userAnswer->language_most_spoken == "Chino Mandarin" ? "selected" : "")
                            : ""}}
                            value="Chino Mandarin">
                            Chino mandarín
                        </option>
                        <option {{($userAnswer->language_most_spoken != null)
                            ? ($userAnswer->language_most_spoken == "Frances" ? "selected" : "")
                            : ""}}
                            value="Frances">
                            Francés
                        </option>
                        <option {{($userAnswer->language_most_spoken != null)
                            ? ($userAnswer->language_most_spoken == "Arabe" ? "selected" : "")
                            : ""}}
                            value="Arabe">
                            Árabe
                        </option>
                        <option {{($userAnswer->language_most_spoken != null)
                            ? ($userAnswer->language_most_spoken == "Bengali" ? "selected" : "")
                            : ""}}
                            value="Bengali">
                            Bengalí
                        </option>
                        <option {{($userAnswer->language_most_spoken != null)
                            ? ($userAnswer->language_most_spoken == "Ruso" ? "selected" : "")
                            : ""}}
                            value="Ruso">
                            Ruso
                        </option>
                        <option {{($userAnswer->language_most_spoken != null)
                            ? ($userAnswer->language_most_spoken == "Portugues" ? "selected" : "")
                            : ""}}
                            value="Portugues">
                            Portugués
                        </option>
                        <option {{($userAnswer->language_most_spoken != null)
                            ? ($userAnswer->language_most_spoken == "Aleman" ? "selected" : "")
                            : ""}}
                            value="Aleman">
                            Alemán
                        </option>
                        <option {{($userAnswer->language_most_spoken != null)
                            ? ($userAnswer->language_most_spoken == "Japones" ? "selected" : "")
                            : ""}}
                            value="Japones">
                            Japonés
                        </option>
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
                        value='{{($userAnswer->speak_percent != null) ? $userAnswer->speak_percent : "0"}}' min="0"
                        readonly />
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
                        value='{{($userAnswer->write_percent != null) ? $userAnswer->write_percent : "0"}}' min="0"
                        readonly />
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
                        value='{{($userAnswer->read_percent != null) ? $userAnswer->read_percent : "0"}}' min="0"
                        readonly />
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
                        value='{{($userAnswer->listen_percent != null) ? $userAnswer->listen_percent : "0"}}' max="100"
                        min="0" readonly />
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
                    <select name="seniority" id="seniority" class="form-control">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{($userAnswer->seniority != null)
                            ? ($userAnswer->seniority == "Menos de un año" ? "selected" : "")
                            : ""}}
                            value="Menos de un año">
                            Menos de un año
                        </option>
                        <option {{($userAnswer->seniority != null)
                            ? ($userAnswer->seniority == "Un año" ? "selected" : "")
                            : ""}}
                            value="Un año">
                            Un año
                        </option>
                        <option {{($userAnswer->seniority != null)
                            ? ($userAnswer->seniority == "Tres años" ? "selected" : "")
                            : ""}}
                            value="Tres años">
                            Tres años
                        </option>
                        <option {{($userAnswer->seniority != null)
                            ? ($userAnswer->seniority == "Mas de tres años" ? "selected" : "")
                            : ""}}
                            value="Mas de tres años">
                            Más de tres años
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6 mt-3">
            <div class="form-group">
                <label for="year">Año de ingreso</label>
                <input pattern="[0-9]{4}" title="Por favor ingrese un año correcto de 4 dígitos" type="text" id="year"
                    name="year" class="form-control" maxlength="4" required="" onkeypress="ValidateNumbers(event);"
                    oninvalid="this.setCustomValidity('Por favor ingrese un año correcto')"
                    oninput="setCustomValidity('')" value="{{$userAnswer->year}}" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="salary">Ingreso (Salario minimo diario)</label>
                <div class="controls">
                    <select name="salary" id="salary" class="form-control">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{($userAnswer->salary != null)
                            ? ($userAnswer->salary == "Menos de cinco" ? "selected" : "")
                            : ""}}
                            value="Menos de cinco">
                            Menos de cinco
                        </option>
                        <option {{($userAnswer->salary != null)
                            ? ($userAnswer->salary == "Entre cinco y siete" ? "selected" : "")
                            : ""}}
                            value="Entre cinco y siete">
                            Entre cinco y siete
                        </option>
                        <option {{($userAnswer->salary != null)
                            ? ($userAnswer->salary == "Entre ocho y diez" ? "selected" : "")
                            : ""}}
                            value="Entre ocho y diez">
                            Entre ocho y diez
                        </option>
                        <option {{($userAnswer->salary != null)
                            ? ($userAnswer->salary == "Mas de diez" ? "selected" : "")
                            : ""}}
                            value="Mas de diez">
                            Más de diez
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="management_level">Nivel jerárgico en el trabajo</label>
                <div class="controls">
                    <select name="management_level" id="management_level" class="form-control">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{($userAnswer->management_level != null)
                            ? ($userAnswer->management_level == "Tecnico" ? "selected" : "")
                            : ""}}
                            value="Tecnico">
                            Técnico
                        </option>
                        <option {{($userAnswer->management_level != null)
                            ? ($userAnswer->management_level == "Supervisor" ? "selected" : "")
                            : ""}}
                            value="Supervisor">
                            Supervisor
                        </option>
                        <option {{($userAnswer->management_level != null)
                            ? ($userAnswer->management_level == "Jefe de area" ? "selected" : "")
                            : ""}}
                            value="Jefe de area">
                            Jefe de área
                        </option>
                        <option {{($userAnswer->management_level != null)
                            ? ($userAnswer->management_level == "Funcionario" ? "selected" : "")
                            : ""}}
                            value="Funcionario">
                            Funcionario
                        </option>
                        <option {{($userAnswer->management_level != null)
                            ? ($userAnswer->management_level == "Directivo" ? "selected" : "")
                            : ""}}
                            value="Directivo">
                            Directivo
                        </option>
                        <option {{($userAnswer->management_level != null)
                            ? ($userAnswer->management_level == "Empresario" ? "selected" : "")
                            : ""}}
                            value="Empresario">
                            Empresario
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="job_condition">Condición de trabajo</label>
                <div class="controls">
                    <select name="job_condition" id="job_condition" class="form-control">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{($userAnswer->job_condition != null)
                            ? ($userAnswer->job_condition == "Base" ? "selected" : "")
                            : ""}}
                            value="Base">
                            Base
                        </option>
                        <option {{($userAnswer->job_condition != null)
                            ? ($userAnswer->job_condition == "Eventual" ? "selected" : "")
                            : ""}}
                            value="Eventual">
                            Eventual
                        </option>
                        <option {{($userAnswer->job_condition != null)
                            ? ($userAnswer->job_condition == "Contrato" ? "selected" : "")
                            : ""}}
                            value="Contrato">
                            Contrato
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="job_relationship">Relación del trabajo con su área de formación</label>
                <div class="controls">
                    <select name="job_relationship" id="job_relationship" class="form-control">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{($userAnswer->job_relationship != null)
                            ? ($userAnswer->job_relationship == "0" ? "selected" : "")
                            : ""}}
                            value="0">
                            0%
                        </option>
                        <option {{($userAnswer->job_relationship != null)
                            ? ($userAnswer->job_relationship == "20" ? "selected" : "")
                            : ""}}
                            value="20">
                            20%
                        </option>
                        <option {{($userAnswer->job_relationship != null)
                            ? ($userAnswer->job_relationship == "40" ? "selected" : "")
                            : ""}}
                            value="40">
                            40%
                        </option>
                        <option {{($userAnswer->job_relationship != null)
                            ? ($userAnswer->job_relationship == "60" ? "selected" : "")
                            : ""}}
                            value="60">
                            60%
                        </option>
                        <option {{($userAnswer->job_relationship != null)
                            ? ($userAnswer->job_relationship == "80" ? "selected" : "")
                            : ""}}
                            value="80">
                            80%
                        </option>
                        <option {{($userAnswer->job_relationship != null)
                            ? ($userAnswer->job_relationship == "100" ? "selected" : "")
                            : ""}}
                            value="100">
                            100%
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="business_name">Razón Social</label>
                <input type="text" class="form-control" id="business_name" name="business_name"
                    value='{{($userAnswer->business_name != null) ? $userAnswer->business_name : ""}}'
                    placeholder="Razón Social" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="business_activity">Giro o actividad principal de la empresa u organismo</label>
                <input type="text" class="form-control" id="business_activity" name="business_activity"
                    value='{{($userAnswer->business_activity != null) ? $userAnswer->business_activity : ""}}'
                    placeholder="Giro o actividad principal de la empresa u organismo. Ejemplo: Industrial, Comercial, etc." />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="address">Domicilio</label>
                <input type="text" class="form-control" id="address" name="address"
                    value='{{($userAnswer->address != null) ? $userAnswer->address : ""}}' placeholder="Calle #Número">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="zip">Código Postal</label>
                <input type="text" class="form-control" id="zip" name="zip" onchange="getZipCode()"
                    onkeypress="ValidateNumbers(event);" value='{{($userAnswer->zip != null) ? $userAnswer->zip : ""}}'
                    placeholder="Código Postal" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="suburb">Colonia</label>
                <div class="controls">
                    <input type="text" class="form-control" id="suburb" name="suburb" placeholder="Colonia"
                        value='{{($userAnswer->suburb != null) ? $userAnswer->suburb : ""}}' />
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
                    value='{{($userAnswer->state != null) ? $userAnswer->state : ""}}' placeholder="Estado" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="city">Ciudad</label>
                <input type="text" class="form-control" id="city" name="city"
                    value='{{($userAnswer->city != null) ? $userAnswer->city : ""}}' placeholder="Ciudad" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="municipality">Municipio</label>
                <input type="text" class="form-control" id="municipality" name="municipality"
                    value='{{($userAnswer->municipality != null) ? $userAnswer->municipality : ""}}'
                    placeholder="Municipio" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="tel" maxlength="10" pattern="[0-9]{10}" class="form-control" id="phone" name="phone"
                    onkeypress="ValidateNumbers(event);" placeholder="Teléfono" title="Por favor escribe tu teléfono"
                    value='{{($userAnswer->phone != null) ? $userAnswer->phone : ""}}' />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="fax">Fax</label>
                <input type="text" class="form-control" id="fax" name="fax"
                    value='{{($userAnswer->fax != null) ? $userAnswer->fax : ""}}' placeholder="Fax">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="web_page">Página Web</label>
                <input type="text" class="form-control" id="web_page" name="web_page"
                    value='{{($userAnswer->web_page != null) ? $userAnswer->web_page : ""}}' placeholder="Página Web">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="boss_email">Jefe inmediato</label>
                <input type="text" class="form-control" id="boss_email" name="boss_email"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                    value='{{($userAnswer->boss_email != null) ? $userAnswer->boss_email : ""}}'
                    placeholder="Correo electrónico del jefe" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="business_structure">Su empresa u organismo es</label>
                <div class="controls">
                    <select name="business_structure" id="business_structure" class="form-control">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{($userAnswer->business_structure != null)
                            ? ($userAnswer->business_structure == "Publica" ? "selected" : "")
                            : ""}}
                            value="Publica">
                            Pública
                        </option>
                        <option {{($userAnswer->business_structure != null)
                            ? ($userAnswer->business_structure == "Privada" ? "selected" : "")
                            : ""}}
                            value="Privada">
                            Privada
                        </option>
                        <option {{($userAnswer->business_structure != null)
                            ? ($userAnswer->business_structure == "Social" ? "selected" : "")
                            : ""}}
                            value="Social">
                            Social
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="company_size">Tamaño de la empresa u organismo</label>
                <div class="controls">
                    <select name="company_size" id="company_size" class="form-control">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{($userAnswer->company_size != null)
                            ? ($userAnswer->company_size == "Micro" ? "selected" : "")
                            : ""}}
                            value="Micro">
                            Microempresa (de 1 a 30)
                        </option>
                        <option {{($userAnswer->company_size != null)
                            ? ($userAnswer->company_size == "Pequena" ? "selected" : "")
                            : ""}}
                            value="Pequena">
                            Pequeña (De 31 a 100)
                        </option>
                        <option {{($userAnswer->company_size != null)
                            ? ($userAnswer->company_size == "Mediana" ? "selected" : "")
                            : ""}}
                            value="Mediana">
                            Mediana (De 101 a 500)
                        </option>
                        <option {{($userAnswer->company_size != null)
                            ? ($userAnswer->company_size == "Grande" ? "selected" : "")
                            : ""}}
                            value="Grande">
                            Grande (Más de 500)
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="business_activity_selector">Actividad económica de la empresa u organismo</label>
                <div class="controls">
                    <select name="business_activity_selector" id="business_activity_selector" class="form-control">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Agro-industrial" ? "selected" : "")
                            : ""}}
                            value="Agro-industrial">
                            Agro-industrial
                        </option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Pesca y acuacultura" ? "selected" : "")
                            : ""}}
                            value="Pesca y acuacultura">
                            Pesca y acuacultura
                        </option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Mineria" ? "selected" : "")
                            : ""}}
                            value="Mineria">
                            Minería
                        </option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Alimentos, bebidas y tabaco" ? "selected" :
                            "")
                            : ""}}
                            value="Alimentos, bebidas y tabaco">
                            Alimentos, bebidas y tabaco
                        </option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Textiles, vestido y cuero" ? "selected" : "")
                            : ""}}
                            value="Textiles, vestido y cuero">
                            Textiles, vestido y cuero
                        </option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Madera y sus productos" ? "selected" : "")
                            : ""}}
                            value="Madera y sus productos">
                            Madera y sus productos
                        </option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Papel, imprenta y editoriales" ? "selected" :
                            "")
                            : ""}}
                            value="Papel, imprenta y editoriales">
                            Papel, imprenta y editoriales
                        </option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Quimica" ? "selected" : "")
                            : ""}}
                            value="Quimica">
                            Química
                        </option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Caucho y Plastico" ? "selected" : "")
                            : ""}}
                            value="Caucho y Plastico">
                            Caucho y Plástico
                        </option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Minerales no metalicos" ? "selected" : "")
                            : ""}}
                            value="Minerales no metalicos">
                            Minerales no metálicos
                        </option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Industrias metalicas basicas" ? "selected" :
                            "")
                            : ""}}
                            value="Industrias metalicas basicas">
                            Industrias metálicas básicas
                        </option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Productos metalicos, maquinaria y equipo" ?
                            "selected" : "")
                            : ""}}
                            value="Productos metalicos, maquinaria y equipo">
                            Productos metálicos, maquinaria y equipo
                        </option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Construccion" ? "selected" : "")
                            : ""}}
                            value="Construccion">
                            Construcción
                        </option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Electricidad, gas y agua" ? "selected" : "")
                            : ""}}
                            value="Electricidad, gas y agua">
                            Electricidad, gas y agua
                        </option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Comercio y turismo" ? "selected" : "")
                            : ""}}
                            value="Comercio y turismo">
                            Comercio y turismo
                        </option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Transporte, almacenaje y comunicaciones" ?
                            "selected" : "")
                            : ""}}
                            value="Transporte, almacenaje y comunicaciones">
                            Transporte, almacenaje y comunicaciones
                        </option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Servicios financieros, seguros, actividades
                            inmobiliarias y de alquiler"
                            ? "selected"
                            : "")
                            : ""}}
                            value="Servicios financieros, seguros, actividades inmobiliarias y de alquiler">
                            Servicios financieros, seguros, actividades inmobiliarias y de alquiler
                        </option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Educacion" ? "selected" : "")
                            : ""}}
                            value="Educacion">
                            Educación
                        </option>
                        <option {{($userAnswer->business_activity_selector != null)
                            ? ($userAnswer->business_activity_selector == "Otra" ? "selected" : "")
                            : ""}}
                            value="Otra">
                            Otra
                        </option>
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
        <a href="{{ route('student.index', $user_id_encrypt) }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>

<script src="{{ asset('backend/js/functions.js') }}" type="text/javascript"> </script>

<script type="text/javascript">
    WorkAndStudy('{{$userAnswer->do_for_living}}');
</script>

@endsection