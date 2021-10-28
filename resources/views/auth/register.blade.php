<head>
    <title>Registro</title>
    <link rel="icon" href="{{asset ('backend/img/school/favicon.ico')}}">
    <script src="{{asset ('backend/lib/adminlte/plugins/yearpicker/jquery.min.js')}}"></script>
    <link rel='stylesheet' href="{{asset ('backend/lib/adminlte/plugins/yearpicker/yearpicker.css')}}" />
    <script src="{{asset ('backend/lib/adminlte/plugins/yearpicker/yearpicker.js')}}"></script>
</head>
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href=" {{route('welcome')}} "><img style="width: 100px; height:70px;"
                    src="{{asset('backend/img/school/SSE2.png')}}" alt=""></a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <x-jet-label for="name" value="{{ __('Nombre') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Correo Electrónico') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>


            <div class="mt-4">
                <x-jet-label for="nc" value="{{ __('Número de Control') }}" />
                <x-jet-input pattern="[0-9]{8}" autocomplete="off"
                    title="Porfavor ingrese un número de control correcto de 8 dígitos" id="nc"
                    class="block mt-1 w-full" type="text" name="nc" :value="old('nc')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="year" value="{{ __('Año de Egreso') }}" />
                <x-jet-input autocomplete="off" pattern="[0-9]{4}" title="Porfavor ingrese un año correcto de 4 dígitos"
                    type="text" id="year" name="year" class="yearpicker block mt-1 w-full"
                    :value="old('year_graduated')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="year" value="{{ __('Carrera') }}" />
                <select name="id_career" id="id_career"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                    :value="old('id_career')" required>
                    <option value="1">Ingeniería Industrial</option>
                    <option value="2">Ingeniería Electromecánica</option>
                    <option value="3">Ingeniería Sistemas Computacionales</option>
                    <option value="4">Ingeniería Gestión Empresarial</option>
                    <option value="5">Ingeniería Energías Renovables</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>


            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms" />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of
                                Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy
                                Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Ya te encuentras registrado?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Registrar') }}
                </x-jet-button>
            </div>
        </form>

    </x-jet-authentication-card>
</x-guest-layout>

<script type="application/javascript">
    $(document).ready(function () {
        $(".yearpicker").yearpicker({
          startYear: 1990,
          endYear: new Date().getFullYear(),
        });
    });
</script>