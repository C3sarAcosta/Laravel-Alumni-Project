@php
$user_id_encrypt = Crypt::encrypt(Auth::user()->id);
@endphp

@extends('student.student_master')

@section('TopTitle')Perfil del Egresado @endsection

@section('title_section')Perfil del Egresado @endsection

@section('student_content')
<form method="post" action=" {{route('survey.one.store')}} ">
    @csrf
    <input id="user_id" name="user_id" value=" {{Auth::user()->id}} " style="display: none">
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="name">Nombre(s)</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="fathers_surname">Apellido Paterno</label>
                <input type="text" class="form-control" id="fathers_surname" name="fathers_surname"
                    placeholder="Apellido Paterno" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="mothers_surname">Apellido Materno</label>
                <input type="text" class="form-control" id="mothers_surname" name="mothers_surname"
                    placeholder="Apellido Materno" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="control_number">Número de Control</label>
                <input type="text" class="form-control" id="control_number" name="control_number"
                    value="{{Auth::user()->nc}}" placeholder="Número de Control" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label>Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="birthday" name="birthday"
                    placeholder="Fecha de Nacimiento" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="curp">CURP</label>
                <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP" />
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
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
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
                        <option value="Soltero">Soltera(o)</option>
                        <option value="Casado">Casada(o)</option>
                        <option value="Divorciado">Divorciada(o)</option>
                        <option value="Viudo">Viuda(o)</option>
                        <option value="Concubinato">Concubinato</option>
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
                <input type="text" class="form-control" id="address" name="address" placeholder="Calle #Número" />
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
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="cellphone">Teléfono Celular</label>
                <input type="text" class="form-control" id="cellphone" name="cellphone"
                    placeholder="Teléfono Celular" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Correo electrónico" />
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
                        <option value="Si">Sí</option>
                        <option value="No">No</option>
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
                        <option value="Enero">Enero</option>
                        <option value="Febrero">Febrero</option>
                        <option value="Marzo">Marzo</option>
                        <option value="Abril">Abril</option>
                        <option value="Mayo">Mayo</option>
                        <option value="Junio">Junio</option>
                        <option value="Julio">Julio</option>
                        <option value="Agosto">Agosto</option>
                        <option value="Septiembre">Septiembre</option>
                        <option value="Octubre">Octubre</option>
                        <option value="Noviembre">Noviembre</option>
                        <option value="Diciembre">Diciembre</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="year">Año de Egreso</label>
                <input autocomplete="off" pattern="[0-9]{4}" title="Porfavor ingrese un año correcto de 4 dígitos"
                    type="text" id="year" name="year" class="yearpicker form-control" />
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
                    <input type="text" class="form-control" id="percent_english" name="percent_english" value="0"
                        max="100" min="0" readonly placeholder="%" />
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
                        <option value="Ninguno">Ninguno</option>
                        <option value="Chino Mandarin">Chino mandarín</option>
                        <option value="Hindi">Hindi</option>
                        <option value="Frances">Francés</option>
                        <option value="Arabe">Árabe</option>
                        <option value="Bengali">Bengalí</option>
                        <option value="Ruso">Ruso</option>
                        <option value="Portugues">Portugués</option>
                        <option value="Indones">Indonés</option>
                        <option value="Urdu">Urdu</option>
                        <option value="Aleman">Alemán</option>
                        <option value="Japones">Japonés</option>
                        <option value="Suajili">Suajili</option>
                        <option value="Marathi">Marathí</option>
                        <option value="Telugu">Telugu</option>
                        <option value="Chino Wu">Chino Wu</option>
                        <option value="Tamil">Tamil</option>
                        <option value="Turco">Turco</option>
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
                        class="form-control" value="0" max="100" min="0" readonly placeholder="%" />
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
                    placeholder="Ejemplo: Microsoft Office (Excel, PowerPoint, Word), PowerBI, Wordpress, Adobe Photoshop, Google(Gmail, Docs, Hangouts), Canva, Jira, etc."></textarea>
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

<script src="{{ asset('backend/js/functions.js') }}" type="text/javascript"> </script>

@endsection