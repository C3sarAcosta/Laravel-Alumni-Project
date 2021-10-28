@extends('student.student_master')

@section('TopTitle')Perfil del Egresado @endsection

@section('title_section')Perfil del Egresado @endsection

@php
$user_id_encrypt = Crypt::encrypt(Auth::user()->id);
$userAnswer = $userData['0'];
@endphp

@section('student_content')
<form method="post" action=" {{route('survey.one.update')}} ">
    @csrf
    <input id="user_id" name="user_id" value=" {{Auth::user()->id}} " style="display: none">
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="name">Nombre(s)</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre"
                    value="{{ $userAnswer->first_name }}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="fathers_surname">Apellido Paterno</label>
                <input type="text" class="form-control" id="fathers_surname" name="fathers_surname"
                    value="{{ $userAnswer->fathers_surname }}" placeholder="Apellido Paterno" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="mothers_surname">Apellido Materno</label>
                <input type="text" class="form-control" id="mothers_surname" name="mothers_surname"
                    value="{{ $userAnswer->mothers_surname }}" placeholder="Apellido Materno" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="control_number">Número de Control</label>
                <input type="text" class="form-control" id="control_number" name="control_number"
                    value="{{ $userAnswer->control_number }}" placeholder="Número de Control" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label>Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="birthday" name="birthday"
                    value="{{ $userAnswer->birthday }}" placeholder="Fecha de Nacimiento" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="curp">CURP</label>
                <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP"
                    value="{{ $userAnswer->curp }}" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="name">Sexo</label>
                <div class="controls">
                    <select name="sex" id="sex" required="" class="form-control">
                        <option value="" selected="" disabled="">
                            Selecciona un sexo
                        </option>
                        <option {{ ($userAnswer->sex == "Femenino") ? "selected" : "" }} value="Femenino">Femenino
                        </option>
                        <option {{ ($userAnswer->sex == "Masculino") ? "selected" : "" }} value="Masculino">Masculino
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="marital_status">Estado Civil</label>
                <div class="controls">
                    <select name="marital_status" id="marital_status" required="" class="form-control">
                        <option value="" selected="" disabled="">
                            Selecciona un estado civil
                        </option>
                        <option {{($userAnswer->marital_status == "Soltero") ? "selected" : "" }}
                            value="Soltero">Soltera(o)</option>
                        <option {{($userAnswer->marital_status == "Casado") ? "selected" : "" }}
                            value="Casado">Casada(o)</option>
                        <option {{($userAnswer->marital_status == "Divorciado") ? "selected" : "" }}
                            value="Divorciado">Divorciada(o)</option>
                        <option {{($userAnswer->marital_status == "Viudo") ? "selected" : "" }} value="Viudo">Viuda(o)
                        </option>
                        <option {{($userAnswer->marital_status == "Concubinato") ? "selected" : "" }}
                            value="Concubinato">Concubinato</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <hr />

    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="address">Domicilio</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $userAnswer->address }}"
                    placeholder="Calle #Número" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="zip">Código Postal</label>
                <input type="text" class="form-control" id="zip" name="zip" onchange="getZipCode()"
                    value="{{ $userAnswer->zip_code }}" placeholder="Código Postal" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="suburb">Colonia</label>
                <div class="controls">
                    <input type="text" class="form-control" id="suburb" name="suburb" placeholder="Colonia"
                        value="{{ $userAnswer->suburb }}" />
                    <select name="suburb_selector" id="suburb_selector" required="" class="form-control"
                        style="display: none" onchange="onChangeSuburb()">
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
                    value="{{ $userAnswer->state }}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="city">Ciudad</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad"
                    value="{{ $userAnswer->city }}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="municipality">Municipio</label>
                <input type="text" class="form-control" id="municipality" name="municipality" placeholder="Municipio"
                    value="{{ $userAnswer->municipality }}" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono"
                    value="{{ $userAnswer->phone }}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="cellphone">Teléfono Celular</label>
                <input type="text" class="form-control" id="cellphone" name="cellphone"
                    value="{{ $userAnswer->cellphone }}" placeholder="Teléfono Celular" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Correo electrónico"
                    value="{{ $userAnswer->email }}" />
            </div>
        </div>
    </div>

    <hr />

    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="career">Carrera de egreso</label>
                <div class="controls">
                    <select name="career" id="career" required="" class="form-control">
                        <option value="" selected="" disabled="">
                            Selecciona tu carrera
                        </option>
                        <option value="Industrial">Ing. Industrial</option>
                        <option value="Electromecanica">Ing. Electromcánica</option>
                        <option value="Sistemas">
                            Ing. en Sistemas Computacionales
                        </option>
                        <option value="Gestion">Ing. Gestión Empresarial</option>
                        <option value="Tics">Ing. en TICs</option>
                        <option value="Renovables">
                            Ing. en Energías Renovables
                        </option>
                        <option value="Informatica">Lic. Informática</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="specialty">Especialidad</label>
                <div class="controls">
                    <select name="specialty" id="specialty" required="" class="form-control">
                        <option value="" selected="" disabled="">
                            Selecciona tu especialidad
                        </option>
                        <option value="Industrial">Ing. Industrial</option>
                        <option value="Electromecanica">Ing. Electromcánica</option>
                        <option value="Sistemas">
                            Ing. en Sistemas Computacionales
                        </option>
                        <option value="Gestion">Ing. Gestión Empresarial</option>
                        <option value="Tics">Ing. en TICs</option>
                        <option value="Renovables">
                            Ing. en Energías Renovables
                        </option>
                        <option value="Informatica">Lic. Informática</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="qualified">Titulado</label>
                <div class="controls">
                    <select name="qualified" id="qualified" required="" class="form-control">
                        <option value="" selected="" disabled="">
                            Selecciona una opción
                        </option>
                        <option {{ ($userAnswer->qualified == "Si") ? "selected" : "" }} value="Si">Sí</option>
                        <option {{ ($userAnswer->qualified == "No") ? "selected" : "" }} value="No">No</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="month">Mes de egreso</label>
                <div class="controls">
                    <select name="month" id="month" required="" class="form-control">
                        <option value="" selected="" disabled="">
                            Selecciona un mes
                        </option>
                        <option {{ ($userAnswer->month == "Enero") ? "selected" : "" }} value="Enero">Enero</option>
                        <option {{ ($userAnswer->month == "Febrero") ? "selected" : "" }} value="Febrero">Febrero
                        </option>
                        <option {{ ($userAnswer->month == "Marzo") ? "selected" : "" }} value="Marzo">Marzo</option>
                        <option {{ ($userAnswer->month == "Abril") ? "selected" : "" }} value="Abril">Abril</option>
                        <option {{ ($userAnswer->month == "Mayo") ? "selected" : "" }} value="Mayo">Mayo</option>
                        <option {{ ($userAnswer->month == "Junio") ? "selected" : "" }} value="Junio">Junio</option>
                        <option {{ ($userAnswer->month == "Julio") ? "selected" : "" }} value="Julio">Julio</option>
                        <option {{ ($userAnswer->month == "Agosto") ? "selected" : "" }} value="Agosto">Agosto</option>
                        <option {{ ($userAnswer->month == "Septiembre") ? "selected" : "" }}
                            value="Septiembre">Septiembre</option>
                        <option {{ ($userAnswer->month == "Octubre") ? "selected" : "" }} value="Octubre">Octubre
                        </option>
                        <option {{ ($userAnswer->month == "Noviembre") ? "selected" : "" }} value="Noviembre">Noviembre
                        </option>
                        <option {{ ($userAnswer->month == "Diciembre") ? "selected" : "" }} value="Diciembre">Diciembre
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="year">Año de Egreso</label>
                <input value="{{ $userAnswer->year }}" autocomplete="off" pattern="[0-9]{4}"
                    title="Porfavor ingrese un año correcto de 4 dígitos" type="text" id="year" name="year"
                    class="yearpicker form-control" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="percent_english">Dominio de la lengua extranjera inglés</label>
                <div class="input-group">
                    <span class="input-group-prepend minus">
                        <button type="button" class="btn btn-outline-secondary btn-number">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input type="text" class="form-control" id="percent_english" name="percent_english" max="100"
                        min="0" readonly placeholder="%" value="{{ $userAnswer->percent_english }}" />
                    <span class="input-group-append plus">
                        <button type="button" class="btn btn-outline-secondary btn-number">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="another_language">Otro Idioma</label>
                <div class="controls">
                    <select name="another_language" id="another_language" required="" class="form-control">
                        <option value="" selected="" disabled="">
                            Selecciona una lengua
                        </option>
                        <option {{ ($userAnswer->another_language == "Ninguno") ? "selected" : "" }}
                            value="Ninguno">Ninguno</option>
                        <option {{ ($userAnswer->another_language == "Chino Mandarin") ? "selected" : "" }} value="Chino
                            Mandarin">Chino mandarín</option>
                        <option {{ ($userAnswer->another_language == "Hindi") ? "selected" : "" }} value="Hindi">Hindi
                        </option>
                        <option {{ ($userAnswer->another_language == "Frances") ? "selected" : "" }}
                            value="Frances">Francés</option>
                        <option {{ ($userAnswer->another_language == "Arabe") ? "selected" : "" }} value="Arabe">Árabe
                        </option>
                        <option {{ ($userAnswer->another_language == "Bengali") ? "selected" : "" }}
                            value="Bengali">Bengalí</option>
                        <option {{ ($userAnswer->another_language == "Ruso") ? "selected" : "" }} value="Ruso">Ruso
                        </option>
                        <option {{ ($userAnswer->another_language == "Portugues") ? "selected" : "" }}
                            value="Portugues">Portugués</option>
                        <option {{ ($userAnswer->another_language == "Indones") ? "selected" : "" }}
                            value="Indones">Indonés</option>
                        <option {{ ($userAnswer->another_language == "Urdu") ? "selected" : "" }} value="Urdu">Urdu
                        </option>
                        <option {{ ($userAnswer->another_language == "Aleman") ? "selected" : "" }}
                            value="Aleman">Alemán</option>
                        <option {{ ($userAnswer->another_language == "Japones") ? "selected" : "" }}
                            value="Japones">Japonés</option>
                        <option {{ ($userAnswer->another_language == "Suajili") ? "selected" : "" }}
                            value="Suajili">Suajili</option>
                        <option {{ ($userAnswer->another_language == "Marathi") ? "selected" : "" }}
                            value="Marathi">Marathí</option>
                        <option {{ ($userAnswer->another_language == "Telugu") ? "selected" : "" }}
                            value="Telugu">Telugu</option>
                        <option {{ ($userAnswer->another_language == "Chino Wu") ? "selected" : "" }} value="Chino
                            Wu">Chino Wu</option>
                        <option {{ ($userAnswer->another_language == "Tamil") ? "selected" : "" }} value="Tamil">Tamil
                        </option>
                        <option {{ ($userAnswer->another_language == "Turco") ? "selected" : "" }} value="Turco">Turco
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="percent_another_language">Porcentaje de esa lengua</label>
                <div class="input-group">
                    <span class="input-group-prepend minus">
                        <button type="button" class="btn btn-outline-secondary btn-number">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input type="text" id="percent_another_language" name="percent_another_language"
                        class="form-control" max="100" min="0" readonly placeholder="%"
                        value="{{ $userAnswer->percent_another_language }}" />
                    <span class="input-group-append plus">
                        <button type="button" class="btn btn-outline-secondary btn-number">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label>Manejo de paquetes computacionales (Especificar): </label>
                <textarea class="form-control" id="software" name="software" rows="3"
                    placeholder="Ejemplo: Microsoft Office (Excel, PowerPoint, Word), PowerBI, Wordpress, Adobe Photoshop, Google(Gmail, Docs, Hangouts), Canva, Jira, etc.">{{ $userAnswer->software }}</textarea>
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