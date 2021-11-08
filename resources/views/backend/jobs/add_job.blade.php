@extends('company.company_master')

@section('TopTitle')Trabajo @endsection

@section('title_section')Agregar un trabajo @endsection

@section('company_content')
<div class="row">
    <form method="POST" action="{{ route('company.add.job') }}">
        <input value="{{ Auth::user()->id }}" style="display:none;">
        <div class="row">
            <div class="col-6">
                <label for="">Agregar título del trabajo</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" placeholder="Ejemplo: Ingeniero en sistemas especializado en redes">
            </div>
            <div class="col-6">
                <label for="">Agregar </label>
            </div>
        </div>
    </form>
</div>

@endsection