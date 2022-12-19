<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


            <!-- Email Address -->
            <div>
                <span class="ml-2 text-md text-gray-700">Seu JWT token foi gerado com sucesso</span><br>
                <span class="ml-2 text-sm text-gray-600">Basta copiar e colar o token nas suas requisições.<br></span>
                <span class="ml-2 text-sm text-gray-600">Envie o token por POST receber privilegios.</span>

            </div>

            <!-- Password -->
            <div class="mt-4">
            <textarea style="width:100%;margin-top:5px;height:170px;background:#ffffda;">{{ $_COOKIE['token'] }}</textarea>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="token-id" class="inline-flex items-center">
                    <input id="token-id" checked type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="token-id" >
                    <span class="ml-2 text-sm text-gray-600">Envie o token para receber privilegios.</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">

                <a href="./login">
                <x-button class="ml-3">
                    {{ __('Minha Conta') }}
                </x-button>
                </a>
            </div>
    </x-auth-card>
</x-guest-layout>
