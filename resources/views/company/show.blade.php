@extends('company.company_master')

@section('TopTitle')Perfil @endsection

@section('title_section')Modificar Perfil @endsection

@section('company_content')
<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            @livewire('profile.update-profile-information-form')

            <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="mt-10 sm:mt-0">
                @livewire('profile.update-password-form')
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
    $(".content-header").css("display", "none");
});
</script>
@endsection