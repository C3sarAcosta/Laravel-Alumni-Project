@extends('graduate.graduate_master')

@section('TopTitle')Expéctativas y Actualización @endsection

@section('title_section')Expéctativas de desarrollo, superación profesional y de actualización @endsection

@section('graduate_content')

<form method="post" action=" {{ route('survey.five.store') }} ">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="courses_selector">¿Le gustaria tomar cursos de actualización?</label>
                <div class="controls">
                    <select name="courses_selector" id="courses_selector" onchange="changeSelect()" class="form-control"
                        title="¿Le interesa tomar cursos?" required
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option selected="" disabled="">Selecciona una opción</option>
                        @foreach ($constants['YES_NO'] as $option)
                        <option value="{{ $option }}" @if(old('courses_selector')==$option) selected @endif>
                            {{ $option}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="courses">Mencionar cursos</label>
                <input id="courses" name="courses" type="text" class="form-control"
                    @if(old('courses_selector')==$constants['YES_NO']['No']) disabled="" @endif
                    title="Mencionar los cursos, como cursos de marketing"
                    placeholder="Mencione cuáles serían de su agrado" value="{{old('courses')}}">
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-6">
            <div class="form-group">
                <label for="master_selector">¿Le gustaria tomar algún posgrado?</label>
                <div class="controls">
                    <select id="master_selector" name="master_selector" onchange="changeSelect()" class="form-control"
                        title="¿Le interesa tomar algún posgrado?" required
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($constants['YES_NO'] as $option)
                        <option value="{{ $option }}" @if(old('master_selector')==$option) selected @endif>{{ $option }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="master">Posgrado</label>
                <input id="master" name="master" type="text" class="form-control"
                    @if(old('master_selector')==$constants['YES_NO']['No']) disabled="" @endif
                    title="Mencionar los posgrados, como ejemplo en mecatrónica"
                    placeholder="Mencione cuál sería de su agrado" value="{{old('master')}}">
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
        <a href="{{ route('graduate.index') }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>

<script src="{{ asset('backend/js/functions.js') }}" type="text/javascript"> </script>

@endsection