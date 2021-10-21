{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('auth.layout', ['title' => 'S\'inscrire', 'page_type' => 'register', 'body_classes' => ''])

@section('content')
<div class="flex flex-col justify-center">
  <div class="z-0 block">
    <img class="absolute inset-0 object-cover w-full h-full" src="https://images.unsplash.com/photo-1519681393784-d120267933ba?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80" alt="" />
  </div>
  <div class="z-10 backdrop-filter backdrop-blur-2xl min-h-screen lg:pt-24 md:pt-16 pt-10 sm:px-6 lg:px-8">
    <div class="top-0 left-0  absolute">
      <a href="/" class="bg-white bg-opacity-75 backdrop-filter p-5 backdrop-blur-md text-center rounded-lg"><i class="fad fa-home fa-2x text-gray-900"></i></a>
    </div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <img class="mx-auto h-12 w-auto" src="@asset('logo_light')" alt="VVA">
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        Connectez-vous<br> à votre compte
      </h2>
    </div>
  
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="bg-white bg-opacity-75 backdrop-filter backdrop-blur-md py-8 px-4 shadow sm:rounded-2xl sm:px-10">
        <form action="#" method="POST" class="space-y-6">
          <div class="bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-sky-400 focus-within:border-sky-400 mt-1">
            <label for="email" class="block text-xs font-medium text-gray-700">Adresse e-mail</label>
            <input type="email" name="email" id="email" autocomplete="email" required="" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="exemple@gmail.com" value="@if(isset($_COOKIE['remember-me'])) {{ $_COOKIE["remember-me"] }} @endif">
          </div>

          <div x-data="{ show: true }" class="bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-sky-400 focus-within:border-sky-400 mt-1">
            <label for="password" class="block text-xs font-medium text-gray-700">Mot de passe</label>
            <div class="relative flex items-center">
              <input :type="show ? 'password' : 'text'" name="password" id="password" autocomplete="current-password" required="" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="pwd#@$123">
              <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                <button type="button" @click="show = !show" :class="{ 'block': !show, 'hidden': show }" class="transform hover:scale-110 duration-150">
                  <i class="fad fa-eye fa-lg text-gray-500"></i>
                </button>
                <button type="button" @click="show = !show" :class="{ 'hidden': !show, 'block': show }" class="transform hover:scale-110 duration-150">
                  <i class="fad fa-eye-slash fa-lg text-gray-500"></i>
                </button>
              </div>
            </div>
          </div>

          <div class="flex items-center justify-between">
            <div class="flex items-center">
              <input id="remember-me" name="remember-me" type="checkbox" class="w-4 h-4 cursor-pointer shadow-sm text-blue-500 transition duration-150 border-transparent rounded focus:ring-blue-400" @if(isset($_COOKIE['remember-me'])) checked @endif/>
              <label for="remember-me" class="block ml-2 cursor-pointer select-none text-sm text-gray-900">
                Se souvenir de moi
              </label>
            </div>

            <div class="text-sm">
              <a href="/login/mdp-oublie" class="font-medium duration-150 border-b-2 border-gray-200 hover:border-blue-300 text-blue-600 hover:text-blue-500">
                Mot de passe oublié ?
              </a>
            </div>
          </div>

          <div class="relative group transform hover:scale-105 hover:shadow duration-150 rounded-lg">
            <div class="absolute -inset-0 bg-gradient-to-r from-sky-400 to-sky-500 hover:from-sky-500 hover:to-sky-600 rounded-lg filter blur opacity-50 group-hover:opacity-75 transition duration-150 group-hover:duration-150"></div>
            <button
              type="submit"
              name="login"
              class="relative flex justify-center w-full px-2 py-2 text-sm font-medium text-white bg-gradient-to-br from-sky-400 to-sky-500 rounded-lg shadow-sm hover:from-sky-500 hover:to-sky-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
            >
              Se connecter
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div aria-live="assertive" class="fixed z-50 inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start">
  <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
    <!--
      Notification panel, dynamically insert this into the live region when it needs to be displayed

      Entering: "transform ease-out duration-300 transition"
        From: "translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        To: "translate-y-0 opacity-100 sm:translate-x-0"
      Leaving: "transition ease-in duration-100"
        From: "opacity-100"
        To: "opacity-0"
    -->
    @if(isset($flash)) {!! $flash !!} @endif
  </div>
</div>
@endsection

@section('script')
<script>
  $("#alert").show().delay(2500).fadeOut();
</script>
@endsection