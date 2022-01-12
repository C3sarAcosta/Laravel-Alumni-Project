@extends('graduate.graduate_master')

@section('TopTitle')Comentarios y Sugerencias @endsection

@section('title_section')Comentarios y sugerencias @endsection

@section('graduate_content')
<form method="post" action=" {{ route('survey.seven.store') }} ">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="comments">Comentarios</label>
                <textarea id="comments" name="comments" class="form-control" rows="8"
                    placeholder="Escribe aquí sus comentarios"
                    required 
                    oninvalid="this.setCustomValidity('Por favor es importante tu opinión')"
                    oninput="setCustomValidity('')"></textarea>
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
        <a href="{{ URL::previous() }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>
@endsection