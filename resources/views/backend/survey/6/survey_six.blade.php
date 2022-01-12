@extends('graduate.graduate_master')

@section('TopTitle')Participación Social @endsection

@section('title_section')Participación social de los egresados @endsection

@section('graduate_content')
<form method="post" action=" {{ route('survey.six.store') }} ">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="organization_selector">¿Pertenece a organizaciones sociales?</label>
                <div class="controls">
                    <select name="organization_selector" id="organization_selector" onchange="changeSelect()"
                        title="¿Pertenece a alguna organización?" class="form-control" required
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($constants['YES_NO'] as $option)
                        <option value="{{ $option }}" @if(old('organization_selector')==$option) selected @endif>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="organization">Mencionar organizaciones</label>
                <input id="organization" name="organization" type="text" class="form-control"
                    @if(old('organization_selector')==$constants['YES_NO']['No']) disabled="" @endif
                    title="Mencione esas organizaciones" placeholder="Mencione cuáles organizaciones pertenece"
                    value="{{old('organization')}}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="agency_selector">¿Pertenece a organismos de profesionistas?</label>
                <div class="controls">
                    <select name="agency_selector" id="agency_selector" onchange="changeSelect()" class="form-control"
                        title="¿Pertenece a algún organismo profesionista?" required
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($constants['YES_NO'] as $option)
                        <option value="{{ $option }}" @if(old('agency_selector')==$option) selected @endif>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="agency">Mencionar organismos</label>
                <input id="agency" name="agency" type="text" class="form-control"
                    @if(old('agency_selector')==$constants['YES_NO']['No']) disabled="" @endif
                    title="Mencione esos organismos" placeholder="Mencione cuáles organismos pertenece"
                    value="{{old('agency')}}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="association_selector">¿Pertenece a asociaciones de egresados?</label>
                <div class="controls">
                    <select name="association_selector" id="association_selector" onchange="changeSelect()"
                        title="¿Pertenece a alguna asociaciones de egresados?" class="form-control" required
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($constants['YES_NO'] as $option)
                        <option value="{{ $option }}" @if(old('association_selector')==$option) selected @endif>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="association">Mencionar asosiación</label>
                <input id="association" name="association" type="text" class="form-control"
                    @if(old('association_selector')==$constants['YES_NO']['No']) disabled="" @endif
                    title="Mencione esas asosiaciones" placeholder="Mencione cuáles asociaciones pertenece"
                    value="{{old('association')}}">
            </div>
        </div>
    </div>
    <div class="row mt-2 d-flex justify-content-sm-center">
        <div class="col-4">
            <input type="submit" class="btn btn-block bg-gradient-primary" value="Guardar Encuesta">
        </div>
    </div>
</form>

<div class="row mt-3 pb-2 d-flex justify-content-sm-center">
    <div class="col-4">
        <a href="{{ route('graduate.index') }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>

<script src="{{ asset('backend/js/functions.js') }}" type="text/javascript"> </script>

@endsection