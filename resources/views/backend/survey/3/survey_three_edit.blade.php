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
                    <select name="do_for_living" id="do_for_living" onchange="changeActivity()" required
                        class="form-control">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option {{$userAnswer->do_for_living == "Trabaja" ? "selected" : ""}} value="Trabaja">Trabaja</option>
                        <option {{$userAnswer->do_for_living == "Estudia" ? "selected" : ""}} value="Estudia">Estudia</option>
                        <option {{$userAnswer->do_for_living == "Estudia" ? "selected" : ""}} value="Estudia y trabaja">Estudia y trabaja</option>
                        <option {{$userAnswer->do_for_living == "No" ? "selected" : ""}} value="No estudia ni trabaja">No estudia ni trabaja</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row" name="study_row" id="study_row" style="display: none">
        <div class="col-6">
            <div class="form-group">
                <label for="speciality">Indique que es lo que está estudiando</label>
                <div class="controls">
                    <select name="speciality" id="speciality" class="form-control">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option value="Especialidad">Especialidad</option>
                        <option value="Maestria">Maestría</option>
                        <option value="Doctorado">Doctorado</option>
                        <option value="Idiomas">Idiomas</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="school">Especialidad e Institución</label>
                <input type="text" id="school" name="school" class="form-control" id="email"
                    placeholder="Ejemplo: Mecatrónica, Tecnológico de Chihuahua" />
            </div>
        </div>
    </div>

    <div class="row" name="work_row" id="work_row" style="display: none">
        <div class="col-6">
            <div class="form-group">
                <label for="long_take_job">Tiempo transcurrido para obtener el primer empleo</label>
                <div class="controls">
                    <select class="form-control" id="long_take_job" name="long_take_job">
                        <option value="" selected="" disabled="">
                            Selecciona una opción
                        </option>
                        <option value="Antes de egresar">Antes de egresar</option>
                        <option value="Menos de 6 meses">Menos de 6 meses</option>
                        <option value="6 meses a 1 año">6 meses a 1 año</option>
                        <option value="Mas de un año">Más de un año</option>
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
                        <option value="Bolsa de trabajo del plantel">Bolsa de trabajo del plantel</option>
                        <option value="Contacto personal">Contacto personal</option>
                        <option value="Residencia profesional">Residencia profesional</option>
                        <option value="Medios masivos de comunicacion">Medios masivos de comunicación</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>Requisito de contratación</label>
                <div class="d-flex">
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence1" name="competence1" type="checkbox">
                        <label class="form-check-label">Competencias laborales</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence2" name="competence2" type="checkbox">
                        <label class="form-check-label">Título Profesional</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence3" name="competence3" type="checkbox">
                        <label class="form-check-label">Examen de selección</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence4" name="competence4" type="checkbox">
                        <label class="form-check-label">Idioma Extranjero</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence5" name="competence5" type="checkbox">
                        <label class="form-check-label">Actitudes y habilidades socio-comunicativas (principios y
                            valores)</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence6" name="competence6" type="checkbox">
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
                        <option value="Español">Español</option>
                        <option value="Ingles">Inglés</option>
                        <option value="Chino Mandarin">Chino mandarín</option>
                        <option value="Frances">Francés</option>
                        <option value="Arabe">Árabe</option>
                        <option value="Bengali">Bengalí</option>
                        <option value="Ruso">Ruso</option>
                        <option value="Portugues">Portugués</option>
                        <option value="Aleman">Alemán</option>
                        <option value="Japones">Japonés</option>
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
                        min="0" readonly />
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
                        min="0" readonly />
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
                        min="0" readonly />
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
                        max="100" min="0" readonly />
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
                        <option value="Menos de un año">Menos de un año</option>
                        <option value="Un año">Un año</option>
                        <option value="Tres años">Tres años</option>
                        <option value="Mas de tres años">Más de tres años</option>
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
                    <select name="salary" id="salary" class="form-control">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option value="Menos de cinco">Menos de cinco</option>
                        <option value="Entre cinco y siete">Entre cinco y siete</option>
                        <option value="Entre ocho y diez">Entre ocho y diez</option>
                        <option value="Mas de diez">Más de diez</option>
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
                        <option value="Tecnico">Técnico</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Jefe de area">Jefe de área</option>
                        <option value="Funcionario">Funcionario</option>
                        <option value="Directivo">Directivo</option>
                        <option value="Empresario">Empresario</option>
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
                        <option value="Base">Base</option>
                        <option value="Eventual">Eventual</option>
                        <option value="Contrato">Contrato</option>
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
                        <option value="0">0%</option>
                        <option value="20">20%</option>
                        <option value="40">40%</option>
                        <option value="60">60%</option>
                        <option value="80">80%</option>
                        <option value="100">100%</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="business_name">Razón Social</label>
                <input type="text" class="form-control" id="business_name" name="business_name"
                    placeholder="Razón Social" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="business_activity">Giro o actividad principal de la empresa u organismo</label>
                <input type="text" class="form-control" id="business_activity" name="business_activity"
                    placeholder="Giro o actividad principal de la empresa u organismo. Ejemplo: Industrial, Comercial, etc." />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="address">Domicilio</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Calle #Número">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="zip">Código Postal</label>
                <input type="text" class="form-control" id="zip" name="zip" onchange="getZipCode()"
                    placeholder="Código Postal" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="suburb">Colonia</label>
                <div class="controls">
                    <input type="text" class="form-control" id="suburb" name="suburb" placeholder="Colonia" />
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
                <input type="text" class="form-control" id="state" name="state" placeholder="Estado" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="city">Ciudad</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="municipality">Municipio</label>
                <input type="text" class="form-control" id="municipality" name="municipality" placeholder="Municipio" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="fax">Fax</label>
                <input type="text" class="form-control" id="fax" name="fax" placeholder="Fax">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="web_page">Página Web</label>
                <input type="text" class="form-control" id="web_page" name="web_page" placeholder="Página Web">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="boss_email">Jefe inmediato</label>
                <input type="text" class="form-control" id="boss_email" name="boss_email"
                    placeholder="Correo electrónico del jefe" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="business_structure">Su empresa u organismo es</label>
                <div class="controls">
                    <select name="business_structure" id="business_structure" class="form-control">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        <option value="Publica">Pública</option>
                        <option value="Privada">Privada</option>
                        <option value="Social">Social</option>
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
                        <option value="Micro">Microempresa (de 1 a 30)</option>
                        <option value="Pequena">Pequeña (De 31 a 100) </option>
                        <option value="Mediana"> Mediana (De 101 a 500) </option>
                        <option value="Grande">Grande (Más de 500) </option>
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
                        <option value="Agro-industrial">Agro-industrial</option>
                        <option value="Pesca y acuacultura">Pesca y acuacultura</option>
                        <option value="Mineria">Minería</option>
                        <option value="Alimentos, bebidas y tabaco">Alimentos, bebidas y tabaco</option>
                        <option value="Textiles, vestido y cuero">Textiles, vestido y cuero</option>
                        <option value="Madera y sus productos">Madera y sus productos</option>
                        <option value="Papel, imprenta y editoriales">Papel, imprenta y editoriales</option>
                        <option value="Quimica">Química</option>
                        <option value="Caucho y Plastico">Caucho y Plástico</option>
                        <option value="Minerales no metalicos">Minerales no metálicos</option>
                        <option value="Industrias metalicas basicas">Industrias metálicas básicas</option>
                        <option value="Productos metalicos, maquinaria y equipo">Productos metálicos, maquinaria y
                            equipo
                        </option>
                        <option value="Construccion">Construcción</option>
                        <option value="Electricidad, gas y agua">Electricidad, gas y agua</option>
                        <option value="Comercio y turismo">Comercio y turismo</option>
                        <option value="Transporte, almacenaje y comunicaciones">Transporte, almacenaje y comunicaciones
                        </option>
                        <option value="Servicios financieros, seguros, actividades inmobiliarias y de alquiler">
                            Servicios
                            financieros, seguros,
                            actividades inmobiliarias y de alquiler</option>
                        <option value="Educacion">Educación</option>
                        <option value="Otra">Otra</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2" id="saveRow">
        <div class="col-4">
            <input type="submit" class="btn btn-block bg-gradient-primary" value="Actualizar Encuesta" />
        </div>
    </div>
</form>

<div class="row mt-3" id="cancelRow">
    <div class="col-4">
        <a href="{{ route('student.index') }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>

<script src="{{ asset('backend/js/functions.js') }}" type="text/javascript"> </script>

@endsection