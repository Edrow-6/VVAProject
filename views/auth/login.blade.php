{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('auth.layout', ['title' => 'Se connecter', 'page_type' => 'login', 'body_classes' => ''])

@section('content')
<div class="flex flex-col justify-center bg-svg-patterns">
  <div class="z-10 min-h-screen lg:pt-24 md:pt-16 pt-10 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <a href="/">
        <img class="mx-auto h-12 w-auto filter drop-shadow-md" src="@asset('logo_light')" alt="VVA">
      </a>
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-100 filter drop-shadow-lg">
        Connectez-vous<br> à votre compte
      </h2>
    </div>
  
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="bg-white bg-opacity-25 backdrop-filter backdrop-blur-4xl py-4 px-4 shadow rounded-xl">
        <a id="back" href="/" class="inline-flex items-center p-2 -mt-8 -ml-8 absolute border border-transparent rounded-full transition duration-150 shadow-md text-blue-400 hover:text-blue-600 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
          <i class="far fa-arrow-left w-5 h-5 text-center" style="line-height: 19px"></i>
        </a>
        <form action="/auth/login" method="POST" class="space-y-6 mt-2">
          <div>
            <label for="email" class="block text-sm font-medium text-gray-100">Adresse e-mail</label>
            <div class="mt-1 relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd" />
                </svg>
              </div>
              <input type="email" name="email" id="email" class="focus:ring-blue-500 focus:border-blue-500 transition duration-150 block w-full rounded-md pl-10 sm:text-sm border-gray-400 border-opacity-75 text-white placeholder-gray-100 bg-white bg-opacity-30 shadow-sm" placeholder="vous@exemple.fr" value="@if(isset($_COOKIE['remember-me'])) {{ $_COOKIE["remember-me"] }} @endif" required>
            </div>
          </div>

          <div>
            <label for="password" class="block text-sm font-medium text-gray-100">Mot de passe</label>
            <div x-data="{ show: true }" class="mt-1 flex rounded-md shadow-sm">
              <div class="relative flex items-stretch flex-grow focus-within:z-10">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
                  </svg>
                </div>
                <input :type="show ? 'password' : 'text'"  name="password" id="password" class="focus:ring-blue-500 focus:border-blue-500 transition duration-150 block w-full rounded-none rounded-l-md pl-10 border-gray-400 border-opacity-75 sm:text-sm text-white placeholder-gray-100 bg-white bg-opacity-30 shadow-sm" placeholder="pwd#@$123" required>
              </div>
              <button type="button" @click="show = !show" :class="{ 'block': show, 'hidden': !show }" class="-ml-px relative transition duration-150 inline-flex items-center px-4 py-2 text-sm font-medium rounded-r-md border-gray-400 border-opacity-75 text-gray-700 bg-white bg-opacity-50 hover:bg-opacity-75">
                <i class="far fa-eye fa-lg text-white"></i>
              </button>
              <button type="button" @click="show = !show" :class="{ 'hidden': show, 'block': !show }"  class="-ml-px relative transition duration-150 inline-flex items-center px-4 py-2 text-sm font-medium rounded-r-md border-gray-400 border-opacity-75 text-gray-700 bg-white bg-opacity-50 hover:bg-opacity-75">
                <i class="far fa-eye-slash fa-lg text-white"></i>
              </button>
            </div>
          </div>

          <div class="flex items-center justify-between">
            <div class="flex items-center">
              <input id="remember-me" name="remember-me" type="checkbox" class="w-4 h-4 cursor-pointer bg-white bg-opacity-50 shadow-sm text-blue-500 transition duration-150 border-transparent rounded focus:ring-blue-400" @if(isset($_COOKIE['remember-me'])) checked @endif/>
              <label for="remember-me" class="block ml-2 cursor-pointer select-none text-sm text-white">
                Se souvenir de moi
              </label>
            </div>

            <div class="text-sm">
              <a href="/login/mdp-oublie" class="font-medium duration-150 border-b-2 border-gray-200 hover:border-blue-300 text-blue-200 hover:text-blue-300">
                Mot de passe oublié ?
              </a>
            </div>
          </div>

          <button type="submit" name="login" class="button-blue w-full px-2 py-2">
            <span class="filter drop-shadow">Se connecter</span>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  tippy("#back", {
    content: "Retourner à l'accueil",
    placement: "right",
    theme: "translucent",
  });
  // Cache les notifications au bout de x seconde(s)
  $("#alert").show().delay(2500).fadeOut();
</script>
@endsection