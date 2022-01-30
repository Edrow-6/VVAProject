{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('auth.layout', ['title' => 'S\'inscrire', 'page_type' => 'register', 'body_classes' => ''])

@section('content')
  <div class="flex flex-col justify-center bg-svg-patterns">
    <div class="z-10 min-h-screen lg:pt-24 md:pt-16 pt-10 sm:px-6 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="/">
          <img class="mx-auto h-12 w-auto drop-shadow-md" src="@asset('logo_light')" alt="VVA">
        </a>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-100 drop-shadow-lg">
          Connectez-vous<br> à votre compte
        </h2>
      </div>

      <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white bg-opacity-25 backdrop-blur-4xl py-4 px-4 shadow rounded-xl">
          <a id="back" href="/" class="inline-flex items-center p-2 -mt-8 -ml-8 absolute border border-transparent rounded-full transition duration-150 shadow-md text-blue-400 hover:text-blue-600 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
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
              <div class="mt-1 flex rounded-md shadow-sm">
                <div class="relative flex items-stretch grow focus-within:z-10">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
                    </svg>
                  </div>
                  <input type="password" name="password" id="password" class="focus:ring-blue-500 focus:border-blue-500 transition duration-150 block w-full rounded-none rounded-l-md pl-10 border-gray-400 border-opacity-75 sm:text-sm text-white placeholder-gray-100 bg-white bg-opacity-30 shadow-sm" placeholder="pwd#@$123" required>
                </div>
                <button id="togglePassView" type="button" class="-ml-px relative transition duration-150 inline-flex items-center px-2 py-2 text-sm font-medium rounded-r-md border-gray-400 border-opacity-75 text-gray-700 bg-white bg-opacity-50 hover:bg-opacity-75">
                  <svg id="eye-opened" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                  <svg id="eye-dashed" xmlns="http://www.w3.org/2000/svg" class="hidden h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                  </svg>
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
              <span class="drop-shadow">Se connecter</span>
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
  </script>
@endsection