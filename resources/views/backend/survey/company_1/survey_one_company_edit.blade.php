@extends('company.company_master')

@section('TopTitle')Datos generales @endsection

@section('title_section')Datos generales de la empresa u organismo @endsection

@section('company_content')
<form method="post" action="{{ route('survey.one.company.update') }}">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="business_name">Razón Social</label>
                <input type="text" class="form-control" id="business_name" name="business_name"
                    title="Por favor escriba el nombre de la empresa" required
                    oninvalid="this.setCustomValidity('Por favor ingrese el nombre de su empresa')"
                    oninput="setCustomValidity('')" placeholder="Razón Social" value="{{ $userData->business_name }}" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Por favor escriba su correo electrónico"
                    required oninvalid="this.setCustomValidity('Por favor ingrese su correo electrónico')"
                    oninput="setCustomValidity('')" placeholder="Correo electrónico"
                    value="{{ $userData->email }}" disabled />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="address">Domicilio</label>
                <input type="text" class="form-control" id="address" name="address"
                    title="Por favor escriba la dirección de la empresa" required
                    oninvalid="this.setCustomValidity('Por favor ingrese la dirección de la empresa')"
                    oninput="setCustomValidity('')" placeholder="Calle #Número" value="{{ $userData->address }}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="zip">Código Postal</label>{{-- <a id="help_zipcode"><i class="fas fa-info-circle"></i></a> --}}
                <input type="text" class="form-control" id="zip" name="zip" onchange="getZipCode()"
                    onkeypress="ValidateNumbers(event);" title="Por favor escriba su código postal" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su código postal')"
                    oninput="setCustomValidity('')" placeholder="Código Postal" value="{{ $userData->zip }}" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="suburb">Colonia</label>
                <div class="controls">
                    <input type="text" class="form-control" id="suburb" name="suburb"
                        title="Por favor escriba su colonia" required
                        oninvalid="this.setCustomValidity('Por favor ingrese su colonia')"
                        oninput="setCustomValidity('')" placeholder="Colonia" value="{{ $userData->suburb }}" />
                    <select name="suburb_selector" id="suburb_selector" class="form-control" style="display: none"
                        onchange="onChangeSuburb()">
                        <option value="" selected="" disabled="">
                            Selecciona una colonia
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="state">Estado</label>
                <input type="text" class="form-control" id="state" name="state" title="Por favor escriba su estado"
                    required oninvalid="this.setCustomValidity('Por favor ingrese su estado')"
                    oninput="setCustomValidity('')" placeholder="Estado" value="{{ $userData->state }}" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="city">Ciudad</label>
                <input type="text" class="form-control" id="city" name="city" title="Por favor escriba su ciudad"
                    required oninvalid="this.setCustomValidity('Por favor ingrese su ciudad')"
                    oninput="setCustomValidity('')" placeholder="Ciudad" value="{{ $userData->city }}" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="municipality">Municipio</label>
                <input type="text" class="form-control" id="municipality" name="municipality"
                    title="Por favor escriba su municipio" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su municipio')" oninput="setCustomValidity('')"
                    placeholder="Municipio" value="{{ $userData->municipality }}" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="tel" maxlength="10" pattern="[0-9]{10}" class="form-control" id="phone" name="phone"
                    onkeypress="ValidateNumbers(event);" title="Por favor escriba su teléfono" required
                    oninvalid="this.setCustomValidity('Por favor ingrese su teléfono')" oninput="setCustomValidity('')"
                    placeholder="Teléfono" value="{{ $userData->phone }}" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="business_structure">Su empresa u organismo es</label>
                <div class="controls">
                    <select name="business_structure" id="business_structure" class="form-control"
                        title="Por favor mencione el tipo de empresa" required
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ( $constants['BUSINESS_STRUCTURE'] as $business_structure)
                        <option value="{{ $business_structure }}" {{ $userData->business_structure ==
                            $business_structure ? 'selected' : ''
                            }}>
                            {{ $business_structure }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="company_size">Tamaño de la empresa u organismo</label>
                <div class="controls">
                    <select name="company_size" id="company_size" class="form-control"
                        title="Por favor mencione el tamaño de la empresa" required
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($constants['COMPANY_SIZE'] as $company_size)
                        <option value="{{ $company_size }}" 
                                {{ $userData->company_size == $company_size ? 'selected' : ''}}>
                            {{ $company_size }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="business_activity_selector">Actividad económica de la empresa u organismo</label>
                <div class="controls">
                    <select name="business_activity_selector" id="business_activity_selector" class="form-control"
                        title="Por favor mencione el tipo de actividad" required
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($constants['BUSINESS_ACTIVITY'] as $activity)
                        <option value="{{ $activity }}" {{ $userData->business_activity_selector == $activity ?
                            'selected' : ''
                            }}>
                            {{ $activity }}
                        </option>
                        @endforeach
                    </select>
                </div>
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

<script src="{{ asset('backend/js/functions.js') }}" type="text/javascript"> </script>
@endsection