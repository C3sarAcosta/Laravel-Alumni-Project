<head>
    <title>Registro</title>
    <link rel="icon" href="{{asset ('backend/img/school/favicon.ico')}}">
    <script src="{{asset ('backend/lib/adminlte/plugins/yearpicker/jquery.min.js')}}"></script>
    <link rel='stylesheet' href="{{asset ('backend/lib/adminlte/plugins/yearpicker/yearpicker.css')}}" />
    <script src="{{asset ('backend/lib/adminlte/plugins/yearpicker/yearpicker.js')}}"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        * {
            overflow-x: hidden;
        }

        .logo-size {
            width: 150px;
            height: 100px;
            margin-top: 15px;
        }
    </style>
</head>
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href=" {{route('welcome')}} ">
                <img class="logo-size" src="{{asset('backend/img/school/SSE2.png')}}" alt="SSE-Logo">
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        <div class="alert alert-info text-justify" role="alert">
            El correo electrónico y el número de control son datos únicos que no se pueden repetir! Si llegas a tener
            una alerta que estos datos ya han sido registrados cuando no es así, te invitamos a comunicarte con el
            departamento de Vinculación para solucionar este detalle.
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input class="d-none" id="role" name="role" value="graduate" />
            <div>
                <x-jet-label for="name" value="{{ __('Nombre') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    title="Porfavor ingrese su nombre" oninvalid="this.setCustomValidity('Por favor ingrese su nombre')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu nombre" autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Correo Electrónico') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    title="Porfavor ingrese un correo electrónico"
                    oninvalid="this.setCustomValidity('Por favor ingrese su correo electrónico')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu correo electrónico" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="control_number" value="{{ __('Número de Control') }}" />
                <x-jet-input autocomplete="off" title="Porfavor ingrese un número de control correcto"
                    id="control_number" pattern="^[C]?[B]?[0-9]{8,10}" maxlength="10"
                    oninvalid="this.setCustomValidity('Por favor ingrese su número de control y asegura que sea correcta la notación')"
                    oninput="setCustomValidity('')" title="Por favor escribe tu número de control"
                    class="block mt-1 w-full" type="text" name="control_number" :value="old('control_number')"
                    required />
            </div>

            <div class="mt-4">
                <x-jet-label for="year" value="{{ __('Año de Egreso') }}" />
                <x-jet-input title="Porfavor ingrese un año correcto de 4 dígitos" type="text" id="year" name="year"
                    class="yearpicker block mt-1 w-full" readonly
                    oninvalid="this.setCustomValidity('Por favor ingrese un año correcto')"
                    oninput="setCustomValidity('')" :value="old('year')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"
                    oninvalid="this.setCustomValidity('Por favor ingrese una contraseña')"
                    oninput="setCustomValidity('')" title="Por favor ingresa una contraseña" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    oninvalid="this.setCustomValidity('Por favor confirma esa contraseña')"
                    oninput="setCustomValidity('')" title="Por favor repite esa contraseña" name="password_confirmation"
                    required autocomplete="new-password" />
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
<script src="{{ asset('backend/js/functions.js') }}" type="text/javascript"> </script>