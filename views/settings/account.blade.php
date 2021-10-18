{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('settings.layout', ['page_type' => 'account', 'body_classes' => 'bg-gray-200'])

@section('content')
<form class="divide-y divide-gray-200 lg:col-span-9" action="#" method="POST" enctype="multipart/form-data">
  <!-- Section compte -->
  <div class="py-6 px-4 sm:p-6 lg:pb-8">
    <div>
      <h2 class="text-lg leading-6 font-medium text-gray-900">Compte</h2>
      <p class="mt-1 text-sm text-gray-500">
        Ces informations ne seront pas affichées publiquement.
      </p>
    </div>

    <div class="mt-6 flex flex-col lg:flex-row">
      <div class="flex-grow space-y-6">
        
        <div class="grid grid-cols-6 gap-6">
          <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-sky-400 focus-within:border-sky-400 mt-1">
            <label for="first-name" class="block text-xs font-medium text-gray-700">Prénom</label>
            <input type="text" name="first-name" id="first-name" autocomplete="given-name" value="{{ $prenom }}" required="" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
          </div>

          <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-sky-400 focus-within:border-sky-400 mt-1">
            <label for="last-name" class="block text-xs font-medium text-gray-700">Nom de famille</label>
            <input type="text" name="last-name" id="last-name" autocomplete="family-name" value="{{ $nom }}" required="" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
          </div>

          <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-sky-400 focus-within:border-sky-400 mt-1">
            <label for="email-address" class="block text-xs font-medium text-gray-700">Adresse e-mail</label>
            <input type="email" name="email-address" id="email-address" autocomplete="email" value="{{ $email }}" required="" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
          </div>

          <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-sky-400 focus-within:border-sky-400 mt-1">
            <label for="phone-number" class="block text-xs font-medium text-gray-700">Numéro de téléphone</label>
            <input type="tel" name="phone-number" id="phone-number" autocomplete="number" pattern="[0-9]{10,10}" value="{{ $numero_tel }}" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
          </div>
        </div>

      </div>

      <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
        <p class="text-sm font-medium text-gray-700" aria-hidden="true">
          Photo
        </p>
        <div class="mt-1 lg:hidden">
          <div class="flex items-center">
            <div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-12 w-12" aria-hidden="true">
              <img class="rounded-full h-full w-full" src="{{ $avatar }}" alt="">
            </div>
            <div class="ml-5 rounded-md shadow-sm">
              <div class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-sky-500">
                <label for="user-photo" class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                  <span>Changer</span>
                  <span class="sr-only"> photo d'utilisateur</span>
                </label>
                <input id="user-photo" name="user-photo" type="file" class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
              </div>
            </div>
          </div>
        </div>

        <div class="hidden relative rounded-full overflow-hidden lg:block">
          <img class="relative rounded-full w-40 h-40" src="{{ $avatar }}" alt="">
          <label for="user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
            <span>Changer</span>
            <span class="sr-only"> photo d'utilisateur</span>
            <input type="file" id="user-photo" name="user-photo" accept="image/png, image/jpeg, image/gif" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
          </label>
        </div>
      </div>
    </div>
  </div>

  <!-- Section Vie privée -->
  <div class="pt-6 divide-y divide-gray-200">
    <div class="px-4 sm:px-6">
      <div>
        <h2 class="text-lg leading-6 font-medium text-gray-900">Vie privée</h2>
        <p class="mt-1 text-sm text-gray-500">
          Quel option souhaitez vous activer ou désactiver.
        </p>
      </div>
      <ul class="mt-2 divide-y divide-gray-200">
        <li class="py-4 flex items-center justify-between">
          <div class="flex flex-col">
            <p class="text-sm font-medium text-gray-900" id="privacy-option-1-label">
              Cookies
            </p>
            <p class="text-sm text-gray-500" id="privacy-option-1-description">
              Permet de stocker des clés/variables utilisées pour l'utilisation du site.
            </p>
          </div>
          <!-- Activé: "bg-teal-500", Désactivé: "bg-gray-200" -->
          <button type="button" class="bg-teal-500 ml-4 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500" role="switch" aria-checked="true" aria-labelledby="privacy-option-1-label" aria-describedby="privacy-option-1-description">
            <!-- Activé: "translate-x-5", Désactivé: "translate-x-0" -->
            <span aria-hidden="true" class="translate-x-5 inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
          </button>
        </li>
      </ul>
    </div>
    <div class="mt-4 py-4 px-4 flex justify-end sm:px-6">
      <button type="button" class="bg-white border border-gray-300 rounded-md shadow-sm py-1.5 px-4 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
        Annuler
      </button>
      <div class="ml-5 relative group transform hover:scale-105 hover:shadow duration-150 rounded-md">
        <div class="absolute -inset-0 bg-gradient-to-r from-sky-600 to-sky-700 hover:from-sky-700 hover:to-sky-800 rounded-lg filter blur opacity-50 group-hover:opacity-75 transition duration-150 group-hover:duration-150"></div>
        <button
          type="submit"
          name="save-account"
          class="relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-gradient-to-br from-sky-600 to-sky-700 rounded-md shadow-sm hover:from-sky-700 hover:to-sky-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
        >
          Sauvegarder
        </button>
      </div>
    </div>
  </div>
</form>
@endsection



