@extends('student.student_master')

@section('TopTitle')Expéctativas y Actualización @endsection

@section('title_section')Expéctativas de desarrollo, superación profesional y de actualización @endsection

@section('student_content')
<form method="post" action=" {{ route('survey.five.store') }} " onsubmit="return validateSubmit();">
    @csrf
    <input id="user_id" name="user_id" value=" {{ Auth::user()->id }} " style="display: none">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="courses_selector">¿Le gustaria tomar cursos de actualización?</label>
                <div class="controls">
                    <select name="courses_selector" id="courses_selector" onchange="changeSelect()" class="form-control"
                        title="¿Le interesa tomar cursos?" required
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($consts['YesNoQuestion'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="courses">Mencionar cursos</label>
                <input id="courses" name="courses" type="text" class="form-control" disabled=""
                    title="Mencionar los cursos, como cursos de marketing"
                    placeholder="Mencione cuáles serían de su agrado">
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-6">
            <div class="form-group">
                <label for="master_selector">¿Le gustaria tomar algún postgrado?</label>
                <div class="controls">
                    <select id="master_selector" name="master_selector" onchange="changeSelect()" class="form-control"
                        title="¿Le interesa tomar algún postgrado?" required
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($consts['YesNoQuestion'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="master">Postgrado</label>
                <input id="master" name="master" type="text" class="form-control" disabled=""
                    title="Mencionar los postgrados, como ejemplo en mecatrónica"
                    placeholder="Mencione cuál sería de su agrado">
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
        <a href="{{ URL::previous() }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>

<script src="{{ asset('backend/js/functions.js') }}" type="text/javascript"> </script>

@section('scripts')
<script type="text/javascript">

function validateSubmit(){
    if($("#courses_selector").val() == "SÍ"){
      if($("#courses").val() == null || $("#courses").val().trim() == ''){
          toastr.error('Por favor mencione los cursos, es obligatorio si selecciona sí.');
          return false;
       }
    }
    if($("#master_selector").val() == "SÍ"){
      if($("#master").val() == null || $("#master").val().trim() == ''){
          toastr.error('Por favor mencione los postgrados, es obligatorio si selecciona sí.');
          return false;
       }
    }
    return true;  
}
</script>
@endsection

@endsection