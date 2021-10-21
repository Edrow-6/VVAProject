{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('auth.layout', ['title' => 'Se connecter', 'page_type' => 'login', 'body_classes' => ''])

@section('content')
<div class="flex flex-col justify-center">
  <div class="z-0 block">
    <img class="absolute inset-0 object-cover w-full h-full" src="https://images.unsplash.com/photo-1519681393784-d120267933ba?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80" alt="" />
  </div>
  <div class="z-10 backdrop-filter backdrop-blur-2xl min-h-screen lg:pt-24 md:pt-16 pt-10 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <a href="/">
        <img class="mx-auto h-12 w-auto" src="@asset('logo_light')" alt="VVA">
      </a>
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        Connectez-vous<br> à votre compte
      </h2>
    </div>
  
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="bg-white bg-opacity-75 backdrop-filter backdrop-blur-md py-8 px-4 shadow sm:rounded-2xl sm:px-10">
        <a id="back" href="/" class="inline-flex items-center p-2 -mt-12 -ml-14 absolute border border-transparent rounded-full transition duration-150 shadow-md text-sky-400 hover:text-sky-600 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
          <i class="far fa-arrow-left w-5 h-5 text-center" style="line-height: 19px"></i>
        </a>
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
                  <i class="fad fa-eye text-gray-500"></i>
                </button>
                <button type="button" @click="show = !show" :class="{ 'hidden': !show, 'block': show }" class="transform hover:scale-110 duration-150">
                  <i class="fad fa-eye-slash text-gray-500"></i>
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
    @if(isset($flash)) {!! $flash !!} @endif
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