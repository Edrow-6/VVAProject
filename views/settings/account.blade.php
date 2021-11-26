{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('settings.layout', ['title' => 'Paramètres Compte', 'page_type' => 'account', 'body_classes' => 'bg-gray-200'])

@section('content')
<form class="lg:col-span-9" action="/settings/account" method="post" enctype="multipart/form-data">
  <!-- Section compte -->
  <div class="py-6 px-4 sm:p-6 lg:pb-8 filter">
    <div>
      <h2 class="text-xl leading-6 font-bold text-white">Compte</h2>
      <p class="mt-1 text-sm text-gray-100">
        Ces informations ne seront pas affichées publiquement.
      </p>
    </div>

    <div class="mt-6 flex flex-col lg:flex-row">
      <div class="flex-grow space-y-6">
        
        <div class="grid grid-cols-6 gap-6">
          <div class="col-span-6 sm:col-span-3">
            <label for="first-name" class="text-sm font-medium text-gray-100">Prénom</label>
            <div class="mt-1 relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                </svg>
              </div>
              <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="focus:ring-blue-500 focus:border-blue-500 transition duration-150 block w-full rounded-md pl-10 sm:text-sm border-gray-400 border-opacity-75 text-white placeholder-gray-100 bg-white bg-opacity-30 shadow-sm" value="{{ $prenom }}" required>
            </div>
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label for="last-name" class="text-sm font-medium text-gray-100">Nom de famille</label>
            <div class="mt-1 relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
              </div>
              <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="focus:ring-blue-500 focus:border-blue-500 transition duration-150 block w-full rounded-md pl-10 sm:text-sm border-gray-400 border-opacity-75 text-white placeholder-gray-100 bg-white bg-opacity-30 shadow-sm" value="{{ $nom }}" required>
            </div>
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label for="email-address" class="text-sm font-medium text-gray-100">Adresse e-mail</label>
            <div class="mt-1 relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd" />
                </svg>
              </div>
              <input type="email" name="email-address" id="email-address" autocomplete="email" class="focus:ring-blue-500 focus:border-blue-500 transition duration-150 block w-full rounded-md pl-10 sm:text-sm border-gray-400 border-opacity-75 text-white placeholder-gray-100 bg-white bg-opacity-30 shadow-sm" value="{{ $email }}" required>
            </div>
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label for="phone-number" class="text-sm font-medium text-gray-100">Numéro de téléphone</label>
            <div class="mt-1 relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                </svg>
              </div>
              <input type="tel" name="phone-number" id="phone-number" autocomplete="number" pattern="[0-9]{10,10}" class="focus:ring-blue-500 focus:border-blue-500 transition duration-150 block w-full rounded-md pl-10 sm:text-sm border-gray-400 border-opacity-75 text-white placeholder-gray-100 bg-white bg-opacity-30 shadow-sm" value="{{ $numero_tel }}">
            </div>
          </div>
        </div>

      </div>

      <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
        <div class="text-sm font-medium text-white text-center mb-2" aria-hidden="true">
          <span class="px-2 py-1 cursor-default">Photo</span>
        </div>
        <div class="mt-1 lg:hidden">
          <div class="flex items-center">
            <div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-12 w-12" aria-hidden="true">
              <img class="rounded-full h-full w-full" src="@asset('avatar')" alt="">
            </div>
            <div class="ml-5 rounded-md shadow-sm">
              <div class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-sky-500">
                <label for="user-photo" class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                  <span>Changer</span>
                  <span class="sr-only"> photo d'utilisateur</span>
                </label>
                <input disabled id="user-photo" name="user-photo" type="file" class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
              </div>
            </div>
          </div>
        </div>

        <div class="hidden relative rounded-full overflow-hidden lg:block">
          <img class="relative rounded-full w-32 h-32" src="@asset('avatar')" alt="">
          <label for="user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-50 transition duration-150 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 backdrop-filter backdrop-blur-sm focus-within:opacity-100">
            <span class="font-semibold">Changer</span>
            <span class="sr-only"> photo d'utilisateur</span>
            <input type="file" id="user-photo" name="user-photo" accept="image/png, image/jpeg, image/gif" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
          </label>
        </div>
      </div>
    </div>
  </div>

  <!-- Section Vie privée -->
  <div class="pt-6">
    <div class="px-4 sm:px-6">
      <div>
        <h2 class="text-xl leading-6 font-medium text-white">Vie privée</h2>
        <p class="mt-1 text-sm text-gray-100">
          Quel option souhaitez vous activer ou désactiver.
        </p>
      </div>
      <ul class="mt-2 divide-y divide-gray-200">
        <li class="py-4 flex items-center justify-between">
          <div class="flex flex-col">
            <p class="text-sm font-medium text-white" id="cookies-label">
              Cookies
            </p>
            <p class="text-sm text-gray-100" id="cookies-desc">
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
    <div class="mt-4 pt-4 flex justify-end">
      <button type="button" class="button-white py-2 px-4">
        Annuler
      </button>
      <button type="submit" name="save-account" class="button-blue ml-5 px-4 py-2">
        Sauvegarder
      </button>
    </div>
  </div>
</form>
@endsection

@section('script')
<script>
  // Cache les notifications au bout de x seconde(s)
  $("#alert").show().delay(2500).fadeOut();
</script>
@endsection



