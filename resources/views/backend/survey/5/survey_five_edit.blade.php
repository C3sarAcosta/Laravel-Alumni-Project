@extends('graduate.graduate_master')

@section('TopTitle')Expéctativas y Actualización @endsection

@section('title_section')Expéctativas de desarrollo, superación profesional y de actualización @endsection

@section('graduate_content')
<form method="post" action=" {{ route('survey.five.update') }} ">
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
                        <option value="" disabled="">Selecciona una opción</option>
                        @foreach ($constants['YES_NO'] as $option)
                        <option value="{{ $option }}" 
                            @if(is_null(old('courses_selector'))) 
                                @if($userData->courses_yes_no == $option) selected @endif
                            @else
                                @if(old('courses_selector') == $option) selected @endif
                            @endif>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="courses">Mencionar cursos</label>
                <textarea rows="1" id="courses" name="courses" type="text" class="form-control"
                    title="Mencionar los cursos, como cursos de marketing"
                    placeholder="Mencione cuáles serían de su agrado"
                    @if(!is_null(old('courses_selector')))
                        @if(old('courses_selector') == $constants['YES_NO']['No']) disabled @endif
                    @else
                        @if(is_null(old('courses')))
                            @if($userData->courses_yes_no == $constants['YES_NO']['No']) disabled @endif
                        @else
                            @if(old('courses_selector') == $constants['YES_NO']['No']) disabled @endif
                        @endif
                    @endif>{{ is_null(old('courses')) ? $userData->courses : old('courses') }}</textarea>
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
                        <option value="" disabled="">Selecciona una opción</option>
                        @foreach ($constants['YES_NO'] as $option)
                        <option value="{{ $option }}" 
                            @if(is_null(old('master_selector'))) 
                                {{$userData->master_yes_no == $option ? "selected" : "" }}
                            @else
                                @if(old('master_selector') == $option) selected @endif
                            @endif>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="master">Posgrado</label>
                <textarea rows="1" id="master" name="master" type="text" class="form-control"
                    title="Mencionar los posgrados, como ejemplo en mecatrónica"
                    placeholder="Mencione cuál sería de su agrado"
                    @if(!is_null(old('master_selector')))
                        @if(old('master_selector') == $constants['YES_NO']['No']) disabled @endif
                    @else
                        @if(is_null(old('master')))
                            @if($userData->master_yes_no == $constants['YES_NO']['No']) disabled @endif
                        @else
                            @if(old('master_selector') == $constants['YES_NO']['No']) disabled @endif
                        @endif
                    @endif>{{ is_null(old('master')) ? $userData->master : old('master') }}</textarea>
            </div>
        </div>
    </div>
    <div class="row mt-2 d-flex justify-content-sm-center">
        <div class="col-4">
            <input type="submit" class="btn btn-block bg-gradient-primary" value="Actualizar Encuesta">
        </div>
    </div>
</form>

<div class="row mt-3 pb-2 d-flex justify-content-sm-center">
    <div class="col-4">
        <a href="{{ route('graduate.index') }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>

<script src="{{ asset('backend/js/functions.js') }}" type="text/javascript"></script>

@endsection