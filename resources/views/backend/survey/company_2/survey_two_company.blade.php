@extends('company.company_master')

@section('TopTitle')Ubicación Laboral @endsection

@section('title_section')Ubicación laboral de los egresados @endsection

@php
$user_id_encrypt = Crypt::encrypt(Auth::user()->id);
$number_graduates = $consts['NumberGraduates'];
$congruence = $consts['Congruence'];
$requirements = $consts['Requirements'];
$levels = $consts['Level'];
@endphp

@section('company_content')
<form method="post" action="{{ route('survey.two.company.store') }}">
    @csrf
    <input id="user_id" name="user_id" value="{{ Auth::user()->id }}" style="display: none">
    <label>Número de profesionistas con nivel de licenciatura que laboran en la empresa u organismo.</label>
    <div class="row mt-2 d-flex justify-content-sm-center">
        <div class="col-4">
            <div class="form-group">
                <div class="controls">
                    <select name="number_graduates" id="number_graduates" required="" class="form-control"
                        title="Por favor seleccione el número de profesionistas"
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($number_graduates as $number)
                        <option value="{{ $number }}">{{ $number }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <label class="mb-4">Número de egresados del Instituto Tecnológico y nivel jerárquico que ocupan en su
        organización.</label>
    <div class="add_item">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Carreras</label>
                    <div class="controls">
                        <select name="career[]" class="form-control">
                            <option value="" selected="" disabled="">
                                Seleccione la carrera
                            </option>
                            @foreach ($careers as $career)
                            <option value="{{ $career }}">{{ $career }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nivel jerárquico</label>
                    <div class="controls">
                        <select name="level[]" class="form-control">
                            <option value="" selected="" disabled="">
                                Seleccione el nivel jerárquico
                            </option>
                            @foreach ($levels as $level)
                            <option value="{{ $level }}">{{ $level }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Cantidad</label>
                    <div class="controls">
                        <input type="text" name="total[]" class="form-control" placeholder="Cantidad">
                    </div>
                </div>
            </div>
            <div class="col-md-2" style="padding-top: 30px">
                <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
            </div>
        </div>
    </div>
    <hr>

    <label>Congruencia entre perfil profesional y función que desarrollan los egresados del Instituto Tecnológico en su
        empresa u organización. Del total de egresados anote el porcentaje que corresponda.</label>
    <div class="row mt-2 d-flex justify-content-sm-center">
        <div class="col-4">
            <div class="form-group">
                <div class="controls">
                    <select name="congruence" id="congruence" required="" class="form-control"
                        title="Por favor seleccione la congruencia entre el perfil y la función"
                        oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                        oninput="setCustomValidity('')">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($congruence as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label>Requisito que establece para la contratación de personal a nivel licenciatura.</label>
                <div class="d-flex">
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence1" name="competence1" type="checkbox"
                            title="Competencia #1">
                        <label class="form-check-label">Área o campo de estudio</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence2" name="competence2" type="checkbox"
                            title="Competencia #2">
                        <label class="form-check-label">Títulación</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence3" name="competence3" type="checkbox"
                            title="Competencia #3">
                        <label class="form-check-label">Experiencia Laboral/Práctica (Antes de egresar)</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence4" name="competence4" type="checkbox"
                            title="Competencia #4">
                        <label class="form-check-label">Posicionamiento de la institución de egreso</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence5" name="competence5" type="checkbox"
                            title="Competencia #5">
                        <label class="form-check-label">Conocimiento de idiomas extranjeros</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence6" name="competence6" type="checkbox"
                            title="Competencia #6">
                        <label class="form-check-label">Recomendaciones / Referencias</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence7" name="competence7" type="checkbox"
                            title="Competencia #7">
                        <label class="form-check-label">Personalidad / Actitudes</label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" id="competence8" name="competence8" type="checkbox"
                            title="Competencia #8">
                        <label class="form-check-label">Capacidad de liderazgo</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>Carrera que demanda preferentemente su empresa u organismo.</label>
                <div class="controls">
                    <select name="most_demanded_career" id="most_demanded_career" required="" class="form-control">
                        <option value="" selected="" disabled="">
                            Seleccione la carrera
                        </option>
                        @foreach ($careers as $career)
                        <option value="{{ $career }}">{{ $career }}</option>
                        @endforeach
                    </select>
                </div>
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
        <a href="{{ route('company.index', $user_id_encrypt) }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>


<div style="visibility: hidden;">
    <div id="whole_extra_item_add" class="whole_extra_item_add">
        <div id="delete_whole_extra_item_add" class="delete_whole_extra_item_add">
            <div class="form-row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Carreras</label>
                        <div class="controls">
                            <select name="career[]" class="form-control">
                                <option value="" selected="" disabled="">
                                    Seleccione la carrera
                                </option>
                                @foreach ($careers as $career)
                                <option value="{{ $career }}">{{ $career }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nivel jerárquico</label>
                        <div class="controls">
                            <select name="level[]" class="form-control">
                                <option value="" selected="" disabled="">
                                    Seleccione el nivel jerárquico
                                </option>
                                @foreach ($levels as $level)
                                <option value="{{ $level }}">{{ $level }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Cantidad</label>
                        <div class="controls">
                            <input type="text" name="total[]" class="form-control" placeholder="Cantidad">
                        </div>
                    </div>
                </div>
                <div class="col-md-2" style="padding-top: 30px">
                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function(){
        var counter = 0;
        $(document).on("click",".addeventmore", function(){
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click",".removeeventmore", function(event){          
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter--;
        });         
    });
</script>

@endsection