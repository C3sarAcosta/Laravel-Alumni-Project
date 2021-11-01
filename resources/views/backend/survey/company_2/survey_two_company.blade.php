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
                        <select name="career[]" required="" class="form-control">
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
                        <select name="level[]" required="" class="form-control">
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
                        <input type="text" name="amount[]" class="form-control" placeholder="Cantidad">
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
        <div class="col-6">
            <div class="form-group">
                <label>Requisito que establece para la contratación de personal a nivel licenciatura.</label>
                <div class="controls">
                    <select name="requirements" id="requirements" required="" class="form-control">
                        <option value="" selected="" disabled="">
                            Seleccione el principal requisito
                        </option>
                        @foreach ($requirements as $requirement)
                        <option value="{{ $requirement }}">{{ $requirement }}</option>
                        @endforeach
                    </select>
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
                            <select name="career[]" required="" class="form-control">
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
                            <select name="level[]" required="" class="form-control">
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
                            <input type="text" name="amount[]" class="form-control" placeholder="Cantidad">
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