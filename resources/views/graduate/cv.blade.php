@extends('graduate.graduate_master')

@section('TopTitle')CV @endsection

@section('title_section')Agregar Currículum @endsection

@section('graduate_content')
<form class="pb-3" method="post" action="{{ route('graduate.pdf.store') }}" enctype="multipart/form-data">
    @csrf
    <input id="user_id" name="user_id" value=" {{ Auth::user()->id }} " style="display: none">
    <div class="row d-flex justify-content-sm-center">
        <div class="col-4">
            <div class="form-group">
                <label for="exampleInputFile">Agregar CV</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="exampleInputFile"
                            value="{{ asset('storage/pdf/'. $user->cv) }}">
                        <label class="custom-file-label" for="exampleInputFile">
                            {{ $user->cv == null ? 'Elige tu archivo' : $user->cv }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-4">
                    @if ($user->cv != null || $user->cv !='')
                    <input type="submit" class="btn btn-block bg-gradient-primary" value="Actualizar CV">
                    @else
                    <input type="submit" class="btn btn-block bg-gradient-primary" value="Subir CV">
                    @endif
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <a href="{{ route('graduate.index') }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
                </div>
            </div>
        </div>
        @if ($user->cv != (null || ''))
        <div class="col-6">
            <iframe src="{{ asset("storage/pdf/".$user->cv)}}" style="width:100%; height:700px;"
                frameborder="0"></iframe>
        </div>
        @endif
    </div>


</form>



@section('scripts')
<!-- bs-custom-file-input -->
<script src="{{ asset('backend/lib/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script type="text/javascript">
    $(function () {
    bsCustomFileInput.init();
});
</script>
@endsection

@endsection