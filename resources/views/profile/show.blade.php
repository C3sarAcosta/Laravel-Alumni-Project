@if (Auth::user()->is_admin == 1)
@include('admin.index')
@else
@include('student.show')
@endif