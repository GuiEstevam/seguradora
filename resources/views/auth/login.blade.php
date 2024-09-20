<x-guest-layout>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />
  <x-slot name="logo">
    <a href="/">
      <img src="{{ asset('img/nova-logo.png') }}" alt="Logo" class="w-20 h-20 fill-current text-gray-500">
    </a>
  </x-slot>
  <form method="POST" action="{{ route('login2') }}">
    @csrf
    {{-- Empresa --}}
    <div>
      <x-input-label for="enterprise_id" :value="__('Empresa')" />
      <x-text-input id="enterprise_id" class="block mt-1 w-full" type="text" name="enterprise_id" :value="old('enterprise_id')"
        required autofocus autocomplete="enterprise_id" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <!-- Email Address -->
    <div>
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
        autofocus autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" :value="__('Senha')" />

      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
        autocomplete="current-password" />

      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
      <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox"
          class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
          name="remember">
        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Lembrar de mim') }}</span>
      </label>
    </div>

    <div class="flex items-center justify-end mt-4">
      @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
          href="{{ route('password.request') }}">
          {{ __('Esqueceu sua senha?') }}
        </a>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <x-primary-button class="ml-3">
        {{ __('Log in') }}
      </x-primary-button>
    </div>
  </form>
</x-guest-layout>
