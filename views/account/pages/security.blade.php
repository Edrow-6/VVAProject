{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('account.layout', ['title' => 'Sécurité | Compte', 'page_type' => 'security', 'body_classes' => 'bg-gray-200'])

@section('content')
<form class="lg:col-span-9" action="/settings/security" method="post">
  <!-- Section mot de passe -->
  <div class="pt-6 px-4 sm:p-6 lg:pb-8">
    <div>
      <h2 class="text-xl leading-6 font-medium text-white">Mot de passe</h2>
      <p class="mt-1 text-sm text-gray-100">
        Vous pouvez définir un nouveau mot de passe pour votre compte.
      </p>
    </div>

    <div class="mt-6 flex flex-col lg:flex-row">
      <div class="flex-grow space-y-6">
        
        <div class="grid grid-cols-6 gap-6">
          <div class="col-span-6 sm:col-span-2">
            <label for="old-password" class="text-sm font-medium text-gray-100">Ancien mot de passe</label>
            <div class="mt-1 relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
                </svg>
              </div>
              <input type="password" name="old-password" id="old-password" autocomplete="old-pwd" pattern="[A-Za-z0-9-_.]{5,20}" class="focus:ring-blue-500 focus:border-blue-500 transition duration-150 block w-full rounded-md pl-10 sm:text-sm border-gray-400 border-opacity-75 text-white placeholder-gray-100 bg-white bg-opacity-30 shadow-sm" required>
            </div>
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="new-password" class="text-sm font-medium text-gray-100">Nouveau mot de passe</label>
            <div class="mt-1 relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z" />
                </svg>
              </div>
              <input type="password" name="new-password" id="new-password" autocomplete="new-pwd" pattern="[A-Za-z0-9-_.]{5,20}" class="focus:ring-blue-500 focus:border-blue-500 transition duration-150 block w-full rounded-md pl-10 sm:text-sm border-gray-400 border-opacity-75 text-white placeholder-gray-100 bg-white bg-opacity-30 shadow-sm" required>
            </div>
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="email-address" class="text-sm font-medium text-gray-100">Confirmer le nouveau mot de passe</label>
            <div class="mt-1 relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                </svg>
              </div>
              <input type="password" name="confirm-password" id="confirm-password" autocomplete="confirm-pwd" pattern="[A-Za-z0-9-_.]{5,20}" class="focus:ring-blue-500 focus:border-blue-500 transition duration-150 block w-full rounded-md pl-10 sm:text-sm border-gray-400 border-opacity-75 text-white placeholder-gray-100 bg-white bg-opacity-30 shadow-sm" required>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="mt-4 pt-4 flex justify-end">
    <button type="button" class="button-white py-2 px-4">
      Annuler
    </button>
    <button type="submit" name="save-account" class="button-blue ml-5 px-4 py-2">
      Sauvegarder
    </button>
  </div>
</form>
@endsection