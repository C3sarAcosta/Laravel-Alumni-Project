@extends('graduate.graduate_master')

@section('TopTitle')Perfil del Egresado @endsection

@section('title_section')Perfil del Egresado @endsection

@section('graduate_content')
<form method="post" action=" {{ route('survey.one.store') }} ">
    @csrf
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="name">Nombre(s)</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required
                    oninvalid="this.setCustomValidity('Por favor ingrese sus nombres o nombre')"
                    oninput="setCustomValidity('')" title=" Por favor escribe tu nombre(s)"
                    value="{{old('name')}}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="fathers_surname">Apellido Paterno</label>
                <input type="text" class="form-control" id="fathers_surname" name="fathers_surname" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su apellido parterno')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu apellido paterno"
                    placeholder="Apellido Paterno" value="{{old('fathers_surname')}}"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="mothers_surname">Apellido Materno</label>
                <input type="text" class="form-control" id="mothers_surname" name="mothers_surname" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su apellido materno')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu apellido materno"
                    placeholder="Apellido Materno" value="{{old('mothers_surname')}}"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="control_number">Número de Control</label>
                <input type="text" class="form-control" id="control_number" name="control_number" required
                    pattern="[0-9]{8,10}" maxlength="10" onkeypress="ValidateNumbers(event);"
                    oninvalid="this.setCustomValidity('Por favor ingrese su número de control')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu número de control"
                    placeholder="Número de Control" value="{{ Auth::user()->control_number }}" disabled />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label>Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="birthday" name="birthday" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su fecha de nacimiento')"
                    oninput="setCustomValidity('')" title="Por favor selecciona tu fecha de nacimiento"
                    placeholder="Fecha de Nacimiento"
                    value="{{old('birthday')}}" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="curp">CURP <a id="help_curp" style="cursor: pointer;" class="text-warning"><i
                            class="fas fa-exclamation-triangle"></i></a></label>
                <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su curp correctamente')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu CURP"
                    pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" 
                    value="{{old('curp')}}"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label>Sexo</label>
                <div class="controls">
                    <select name="sex" id="sex" required class="form-control" title="Por favor selecciona tu sexo"
                        required oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">
                            Selecciona un sexo
                        </option>
                        <option value="FEMENINO" @if(old('sex')=="FEMENINO") selected @endif>
                            FEMENINO
                        </option>
                        <option value="MASCULINO" @if(old('sex')=="MASCULINO") selected @endif>
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
                        @foreach ($constants['MARITAL_STATUS'] as $status)
                        <option value="{{ $status }}" @if(old('marital_status')==$status) selected @endif>
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
                <input type="text" class="form-control" id="address" name="address" placeholder="Calle #Número" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su domicilio')" oninput="setCustomValidity('')"
                    title="Por favor escribe tu dirección" value="{{old('address')}}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="zip">Código Postal</label> {{--<a id="help_zipcode" style="cursor: pointer;"><i
                        class="fas fa-info-circle"></i></a> --}}
                <input type="text" class="form-control" id="zip" name="zip" onchange="getZipCode()" required
                    onkeypress="ValidateNumbers(event);" maxlength="20"
                    oninvalid="this.setCustomValidity('Por favor ingrese su código postal')"
                    oninput="setCustomValidity('')"
                    title="Al escribir puedes esperar y se rellanará la información por ti si existe información con este código"
                    placeholder="Código Postal" value="{{old('zip')}}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="suburb">Colonia</label>
                <div class="controls">
                    <input type="text" class="form-control" id="suburb" name="suburb" placeholder="Colonia" required
                        oninvalid="this.setCustomValidity('Por favor ingrese su colonia')"
                        oninput="setCustomValidity('')" title="Por favor escribe tu colonia" value="{{old('suburb')}}"/>
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
                <input type="text" class="form-control" id="state" name="state" placeholder="Estado" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su estado')" oninput="setCustomValidity('')"
                    title="Por favor escribe tu estado" value="{{old('state')}}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="city">Ciudad</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su ciudad')" oninput="setCustomValidity('')"
                    title="Por favor escribe tu ciudad" value="{{old('city')}}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="municipality">Municipio</label>
                <input type="text" class="form-control" id="municipality" name="municipality" placeholder="Municipio"
                    required oninvalid="this.setCustomValidity('Por favor ingrese su municipio')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu municipio"
                    value="{{old('municipality')}}" />
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="tel" maxlength="10" pattern="[0-9]{10}" class="form-control" id="phone" name="phone"
                    onkeypress="ValidateNumbers(event);" placeholder="Teléfono" title="Por favor escribe tu teléfono"
                    value="{{old('phone')}}" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="cellphone">Teléfono Celular</label>
                <input type="tel" maxlength="10" pattern="[0-9]{10}" class="form-control" id="cellphone"
                    onkeypress="ValidateNumbers(event);" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su celular')" oninput="setCustomValidity('')"
                    name="cellphone" title="Por favor escribe tu celular" placeholder="Teléfono Celular" value="{{old('cellphone')}}"/>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="user_email">Correo electrónico</label>
                <input type="text" class="form-control" id="user_email" name="user_email"
                    placeholder="Correo Electrónico" value="{{ Auth::user()->email }}" disabled />
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
                        oninput="setCustomValidity('')" onchange="onChangeCareer()">
                        <option value="" selected="" disabled="">
                            Selecciona tu carrera
                        </option>
                        @foreach ($careers as $career)
                        <option value="{{ $career->name }}">
                            {{ $career->name }}
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
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="qualified">Titulado</label>
                <div class="controls">
                    <select name="qualified" id="qualified" required class="form-control" title="¿Estás titulado?"
                        required oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">
                            Selecciona una opción
                        </option>
                        @foreach ($constants['YES_NO'] as $option)
                        <option value="{{ $option }}" @if(old('qualified')==$option) selected @endif>
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
                        @foreach ($constants['MONTH'] as $month)
                        <option value="{{ $month }}" @if(old('month')==$month) selected @endif>{{ $month }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="year">Año de Egreso</label>
                <input pattern="[0-9]{4}" title="Por favor ingrese un año correcto de 4 dígitos" type="text" id="year"
                    name="year" readonly class="yearpicker form-control" required
                    oninvalid="this.setCustomValidity('Por favor ingrese un año correcto')"
                    oninput="setCustomValidity('')" value="{{old('year')}}"/>
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
                        title="Seleccione alguna otra lengua si es hablador de esa lengua" required
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">
                            Selecciona una lengua
                        </option>
                        @foreach ($languages as $language)
                        <option value="{{ $language->name }}" @if(old('another_language')==$language->name) selected @endif>{{ $language->name }}</option>
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
                    placeholder="Ejemplo: Microsoft Office (Excel, PowerPoint, Word), PowerBI, Wordpress, Adobe Photoshop, Google(Gmail, Docs, Hangouts), Canva, Jira, etc.">{{ old('software') }}</textarea>
            </div>
        </div>
    </div>

    <div class="row mt-2 d-flex justify-content-sm-center">
        <div class="col-4">
            <input type="submit" id="buttonsubmit" class="btn btn-block bg-gradient-primary" value="Guardar Encuesta">
        </div>
    </div>
</form>

<div class="row mt-3 pb-2 d-flex justify-content-sm-center">
    <div class="col-4">
        <a href="{{ route('graduate.index') }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>

<script src="{{ asset('backend/js/functions.js') }}" type="text/javascript"> </script>

<script type="text/javascript">
    function onChangeCareer() {
    $("#specialty")
            .empty()
            .append(`<option value="" selected="" disabled="">Selecciona tu especialidad</option>`);
    var specialties = @php echo $specialties; @endphp;
    var career = $("#career").val();

    const filter_specialties = specialties.filter(v => v.name === career);

    filter_specialties.forEach(function (data) {
        var option = new Option(data["specialty"], data["specialty"]);
        $("#specialty").append(option);
    });
}
</script>

@endsection