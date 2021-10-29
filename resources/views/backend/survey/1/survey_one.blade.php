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
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required=""
                    oninvalid="this.setCustomValidity('Por favor ingrese sus nombres o nombre')"
                    oninput="setCustomValidity('')" title=" Por favor escribe tu nombre(s)" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="fathers_surname">Apellido Paterno</label>
                <input type="text" class="form-control" id="fathers_surname" name="fathers_surname" required=""
                    oninvalid="this.setCustomValidity('Por favor ingrese su apellido parterno')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu apellido paterno"
                    placeholder="Apellido Paterno" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="mothers_surname">Apellido Materno</label>
                <input type="text" class="form-control" id="mothers_surname" name="mothers_surname" required=""
                    oninvalid="this.setCustomValidity('Por favor ingrese su apellido materno')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu apellido materno"
                    placeholder="Apellido Materno" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="control_number">Número de Control</label>
                <input type="text" class="form-control" id="control_number" name="control_number" required=""
                    pattern="[0-9]{8}" maxlength="8" onkeypress="ValidateNumbers(event);"
                    oninvalid="this.setCustomValidity('Por favor ingrese su número de control')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu número de control"
                    placeholder="Número de Control" value="{{Auth::user()->control_number}}" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label>Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="birthday" name="birthday" required=""
                    oninvalid="this.setCustomValidity('Por favor ingrese su fecha de nacimiento')"
                    oninput="setCustomValidity('')" title="Por favor selecciona tu fecha de nacimiento"
                    placeholder="Fecha de Nacimiento" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="curp">CURP</label>
                <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP" required=""
                    oninvalid="this.setCustomValidity('Por favor ingrese su curp correctamente')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu CURP"
                    pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="name">Sexo</label>
                <div class="controls">
                    <select name="sex" id="sex" required="" class="form-control" title="Por favor selecciona tu sexo"
                        required="" oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
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
                    <select name="marital_status" id="marital_status" required="" class="form-control"
                        title="Por favor selecciona tu estado civil" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
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
                <input type="text" class="form-control" id="address" name="address" placeholder="Calle #Número"
                    required="" oninvalid="this.setCustomValidity('Por favor ingrese su domicilio')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu dirección" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="zip">Código Postal</label>
                <input type="text" class="form-control" id="zip" name="zip" onchange="getZipCode()" required=""
                    onkeypress="ValidateNumbers(event);"
                    oninvalid="this.setCustomValidity('Por favor ingrese su código postal')"
                    oninput="setCustomValidity('')"
                    title="Al escribir puedes esperar y se rellanará la información por ti si existe información con este código"
                    placeholder="Código Postal" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="suburb">Colonia</label>
                <div class="controls">
                    <input type="text" class="form-control" id="suburb" name="suburb" placeholder="Colonia" required=""
                        oninvalid="this.setCustomValidity('Por favor ingrese su colonia')"
                        oninput="setCustomValidity('')" title="Por favor escribe tu colonia" />
                    <select name="suburb_selector" id="suburb_selector" class="form-control" style="display: none"
                        onchange="onChangeSuburb()" title="Seleccionar alguna colonia disponible">
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
                <input type="text" class="form-control" id="state" name="state" placeholder="Estado" required=""
                    oninvalid="this.setCustomValidity('Por favor ingrese su estado')" oninput="setCustomValidity('')"
                    title="Por favor escribe tu estado" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="city">Ciudad</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad" required=""
                    oninvalid="this.setCustomValidity('Por favor ingrese su ciudad')" oninput="setCustomValidity('')"
                    title="Por favor escribe tu ciudad" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="municipality">Municipio</label>
                <input type="text" class="form-control" id="municipality" name="municipality" placeholder="Municipio"
                    required="" oninvalid="this.setCustomValidity('Por favor ingrese su municipio')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu municipio" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="tel" maxlength="10" pattern="[0-9]{10}" class="form-control" id="phone" name="phone"
                    onkeypress="ValidateNumbers(event);" required=""
                    oninvalid="this.setCustomValidity('Por favor ingrese su teléfono')" oninput="setCustomValidity('')"
                    placeholder="Teléfono" title="Por favor escribe tu teléfono" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="cellphone">Teléfono Celular</label>
                <input type="tel" maxlength="10" pattern="[0-9]{10}" class="form-control" id="cellphone"
                    onkeypress="ValidateNumbers(event);" required=""
                    oninvalid="this.setCustomValidity('Por favor ingrese su celular')" oninput="setCustomValidity('')"
                    name="cellphone" title="Por favor escribe tu celular" placeholder="Teléfono Celular" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required=""
                    oninvalid="this.setCustomValidity('Por favor ingrese su correo electrónico')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu correo electrónico" />
            </div>
        </div>
    </div>

    <hr />

    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="career">Carrera de egreso</label>
                <div class="controls">
                    <select name="career" id="career" required="" class="form-control" title="Selecciona tu carrera"
                        required="" oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
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
                    <select name="specialty" id="specialty" required="" class="form-control" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')" title="Selecciona tu especialidad">
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
                    <select name="qualified" id="qualified" required="" class="form-control" title="¿Estás titulado?"
                        required="" oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
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
                    <select name="month" id="month" required="" class="form-control" title="Por favor seleccione un mes"
                        required="" oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
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
                <input pattern="[0-9]{4}" title="Por favor ingrese un año correcto de 4 dígitos" type="text" id="year"
                    name="year" readonly class="yearpicker form-control" required=""
                    oninvalid="this.setCustomValidity('Por favor ingrese un año correcto')"
                    oninput="setCustomValidity('')" />
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
                        max="100" min="0" readonly placeholder="%" title="Dominio del inglés" required />
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
                    <select name="another_language" id="another_language" class="form-control"
                        title="Seleccione alguna otra lengua si es hablador de esa lengua" required=""
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
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
                        class="form-control" value="0" max="100" min="0" readonly placeholder="%" required
                        title="Dominio de otra lengua" />
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
                <textarea class="form-control" id="software" name="software" rows="3" required
                    oninvalid="this.setCustomValidity('Por favor mencione al menos un software')"
                    oninput="setCustomValidity('')"
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