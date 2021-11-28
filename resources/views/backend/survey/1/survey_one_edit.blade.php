@extends('student.student_master')

@section('TopTitle')Perfil del Egresado @endsection

@section('title_section')Perfil del Egresado @endsection

@section('student_content')
<form method="post" action=" {{ route('survey.one.update') }} " onsubmit="return validateSubmit();">
    @csrf
    <input id="user_id" name="user_id" value=" {{ Auth::user()->id }} " style="display: none">
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="name">Nombre(s)</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required
                    oninvalid="this.setCustomValidity('Por favor ingrese sus nombres o nombre')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu nombre(s)"
                    value="{{ $userData->first_name }}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="fathers_surname">Apellido Paterno</label>
                <input type="text" class="form-control" id="fathers_surname" name="fathers_surname" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su apellido parterno')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu apellido paterno"
                    placeholder="Apellido Paterno" value="{{ $userData->fathers_surname }}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="mothers_surname">Apellido Materno</label>
                <input type="text" class="form-control" id="mothers_surname" name="mothers_surname" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su apellido materno')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu apellido materno"
                    placeholder="Apellido Materno" value="{{ $userData->mothers_surname }}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="control_number">Número de Control</label>
                <input type="text" class="form-control" id="control_number" name="control_number" required
                    pattern="[0-9]{8,10}" maxlength="10" onkeypress="ValidateNumbers(event);"
                    oninvalid="this.setCustomValidity('Por favor ingrese su número de control')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu número de control"
                    placeholder="Número de Control" value="{{ Auth::user()->control_number }}" disabled/>
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label>Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="birthday" name="birthday" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su fecha de nacimiento')"
                    oninput="setCustomValidity('')" title="Por favor selecciona tu fecha de nacimiento"
                    placeholder="Fecha de Nacimiento" value="{{ $userData->birthday }}" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="curp">CURP</label>
                <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su curp')" oninput="setCustomValidity('')"
                    title="Por favor escribe tu CURP" value="{{ $userData->curp }}" disabled
                    pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="name">Sexo</label>
                <div class="controls">
                    <select name="sex" id="sex" required class="form-control" title="Por favor selecciona tu sexo"
                        required oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">
                            Selecciona un sexo
                        </option>
                        <option {{ ($userData->sex == "FEMENINO") ? "selected" : "" }} value="FEMENINO">
                            FEMENINO
                        </option>
                        <option {{ ($userData->sex == "MASCULINO") ? "selected" : "" }} value="MASCULINO">
                            MASCULINO
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="marital_status">Estado Civil</label>
                <div class="controls">
                    <select name="marital_status" id="marital_status" required class="form-control"
                        title="Por favor selecciona tu estado civil" required
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">
                            Selecciona un estado civil
                        </option>
                        @foreach ($consts['MaritalStatus'] as $status)
                        <option value="{{ $status }}" {{ ($userData->marital_status == $status) ? "selected" : "" }}>
                            {{ $status }}
                        </option>
                        @endforeach
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
                    required oninvalid="this.setCustomValidity('Por favor ingrese su domicilio')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu dirección"
                    value="{{ $userData->address }}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="zip">Código Postal <a id="help_zipcode" style="cursor: pointer;"><i class="fas fa-info-circle"></i></a></label>
                <input type="text" class="form-control" id="zip" name="zip" onchange="getZipCode()" required
                    onkeypress="ValidateNumbers(event);"
                    oninvalid="this.setCustomValidity('Por favor ingrese su código postal')"
                    oninput="setCustomValidity('')"
                    title="Al escribir puedes esperar y se rellanará la información por ti si existe información con este código"
                    placeholder="Código Postal" value="{{ $userData->zip_code }}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="suburb">Colonia</label>
                <div class="controls">
                    <input type="text" class="form-control" id="suburb" name="suburb" placeholder="Colonia" required
                        oninvalid="this.setCustomValidity('Por favor ingrese su colonia')"
                        oninput="setCustomValidity('')" title="Por favor escribe tu colonia"
                        value="{{ $userData->suburb }}" />
                    <select name="suburb_selector" id="suburb_selector" class="form-control"
                        title="Seleccionar alguna colonia disponible" style="display: none" onchange="onChangeSuburb()">
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
                <input type="text" class="form-control" id="state" name="state" placeholder="Estado" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su estado')" oninput="setCustomValidity('')"
                    title="Por favor escribe tu estado" value="{{ $userData->state }}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="city">Ciudad</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su ciudad')" oninput="setCustomValidity('')"
                    title="Por favor escribe tu ciudad" value="{{ $userData->city }}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="municipality">Municipio</label>
                <input type="text" class="form-control" id="municipality" name="municipality" placeholder="Municipio"
                    required oninvalid="this.setCustomValidity('Por favor ingrese su municipio')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu municipio"
                    value="{{ $userData->municipality }}" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="tel" maxlength="10" pattern="[0-9]{10}" class="form-control" id="phone" name="phone"
                    onkeypress="ValidateNumbers(event);" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su teléfono')" oninput="setCustomValidity('')"
                    placeholder="Teléfono" title="Por favor escribe tu teléfono" value="{{ $userData->phone }}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="cellphone">Teléfono Celular</label>
                <input type="tel" maxlength="10" pattern="[0-9]{10}" class="form-control" id="cellphone"
                    onkeypress="ValidateNumbers(event);" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su celular')" oninput="setCustomValidity('')"
                    name="cellphone" title="Por favor escribe tu celular" placeholder="Teléfono Celular"
                    value="{{ $userData->cellphone }}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su correo electrónico')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu correo electrónico" disabled
                    value="{{ $userData->email }}" />
            </div>
        </div>
    </div>

    <hr />

    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="career">Carrera de egreso</label>
                <div class="controls">
                    <select name="career" id="career" required class="form-control" title="Selecciona tu carrera"
                        required oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')"
                        onchange="onChangeCareer()">
                        Selecciona tu carrera
                        </option>
                        @foreach ($careers as $career)
                        <option value="{{ $career }}" {{ $userData->career == $career ? "selected" : "" }}>
                            {{ $career }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="specialty">Especialidad</label>
                <div class="controls">
                    <select name="specialty" id="specialty" required class="form-control" required
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')" title="Selecciona tu especialidad">
                        <option value="" selected="" disabled="">
                            Selecciona tu especialidad
                        </option>
                        @foreach ($specialties_data as $specialty)
                        <option value="{{ $specialty }}" {{ $userData->specialty == $specialty ? "selected" : "" }}>
                            {{ $specialty }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="qualified">Titulado</label>
                <div class="controls">
                    <select name="qualified" id="qualified" class="form-control" title="¿Estás titulado?" required
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">
                            Selecciona una opción
                        </option>
                        @foreach ($consts['YesNoQuestion'] as $option)
                        <option value="{{ $option }}" {{ ($userData->qualified == $option) ? "selected" : "" }}>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="month">Período de egreso</label>
                <div class="controls">
                    <select name="month" id="month" required class="form-control" title="Por favor seleccione un mes"
                        required oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">
                            Selecciona un mes
                        </option>
                        @foreach ($consts['Month'] as $month)
                        <option value="{{ $month }}" {{ ($userData->month == $month) ? "selected" : "" }}>
                            {{ $month }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="year">Año de Egreso</label>
                <input pattern="[0-9]{4}" title="Por favor ingrese un año correcto de 4 dígitos" type="text" id="year"
                    name="year" maxlength="4" class="form-control" required onkeypress="ValidateNumbers(event);"
                    oninvalid="this.setCustomValidity('Por favor ingrese un año correcto')"
                    oninput="setCustomValidity('')" value="{{ $userData->year }}" />
            </div>
        </div>
    </div>

    <hr />

    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="percent_english">Porcentaje de dominio de la lengua extranjera inglés</label>
                <div class="input-group">
                    <span class="input-group-prepend minus">
                        <button type="button" class="btn btn-outline-secondary btn-number">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input type="text" class="form-control" id="percent_english" name="percent_english" max="100"
                        min="0" readonly placeholder="%" title="Dominio del inglés" required
                        value="{{ $userData->percent_english }}" />
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
                        title="Seleccione alguna otra lengua si es hablador de esa lengua" required
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">
                            Selecciona una lengua
                        </option>
                        @foreach ($languages as $language)
                        <option value="{{ $language }}" {{ ($userData->another_language == $language)?"selected":"" }}>
                            {{$language}}
                        </option>
                        @endforeach
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
                    <input type="text" id="percent_another_language" name="percent_another_language" required
                        class="form-control" max="100" min="0" readonly placeholder="%" title="Dominio de otra lengua"
                        value="{{ $userData->percent_another_language }}" />
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
                    placeholder="Ejemplo: Microsoft Office (Excel, PowerPoint, Word), PowerBI, Wordpress, Adobe Photoshop, Google(Gmail, Docs, Hangouts), Canva, Jira, etc.">{{ $userData->software }}</textarea>
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

<script src="{{ asset('backend/js/functions.js') }}" type="text/javascript"> </script>

<script type="text/javascript">
    function onChangeCareer() {
    $("#specialty")
            .empty()
            .append(`<option value="" selected="" disabled="">Selecciona tu especialidad</option>`);
    var specialties = <?php echo $specialties;?>;
    var career = $("#career").val();

    const filter_specialties = specialties.filter(v => v.name === career);

    filter_specialties.forEach(function (data) {
        var option = new Option(data["specialty"], data["specialty"]);
        $("#specialty").append(option);
    });
}
</script>

@section('scripts')
<script type="text/javascript">
    function validateSubmit(){
      if($("#software").val() == null || $("#software").val().trim() == ''){
          toastr.error('Por favor no puede dejar paquetes computacionales con un valor vacío.');
          return false;
       }

      if($("#year").val() == null || $("#year").val().trim() == ''){
          toastr.error('Por favor ingrese su año de egreso.');
          return false;
       }

      if($("#birthday").val() == null || $("#birthday").val().trim() == ''){
          toastr.error('Por favor ingrese su fecha de nacimiento.');
          return false;
       }           
    return true;  
}
</script>
@endsection

@endsection