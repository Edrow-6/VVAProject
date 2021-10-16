{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('settings.layout', ['page_type' => 'security', 'body_classes' => 'bg-gray-100'])

@section('content')
<form class="divide-y divide-gray-200 lg:col-span-9" action="#" method="POST">
  <!-- Section mot de passe -->
  <div class="py-6 px-4 sm:p-6 lg:pb-8">
    <div>
      <h2 class="text-lg leading-6 font-medium text-gray-900">Mot de passe</h2>
      <p class="mt-1 text-sm text-gray-500">
        Vous pouvez définir un nouveau mot de passe pour votre compte.
      </p>
    </div>

    <div class="mt-6 flex flex-col lg:flex-row">
      <div class="flex-grow space-y-6">
        
        <div class="grid grid-cols-6 gap-6">
          <div class="col-span-6 sm:col-span-2">
            <label for="old-password" class="block text-sm font-medium text-gray-700">Ancien mot de passe</label>
            <input type="password" name="old-password" id="old-password" autocomplete="old-pwd" pattern="[A-Za-z0-9-_.]{5,20}" value="" class="mt-1 block transition duration-100 w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="new-password" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
            <input type="password" name="new-password" id="new-password" autocomplete="new-pwd" pattern="[A-Za-z0-9-_.]{5,20}" value="" class="mt-1 block transition duration-100 w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirmer nouveau mot de passe</label>
            <input type="password" name="confirm-password" id="confirm-password"" autocomplete="confirm-pwd" pattern="[A-Za-z0-9-_.]{5,20}" value="" class="mt-1 block transition duration-100 w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="pt-4 divide-y divide-gray-200">
    <div class="pb-4 px-4 flex justify-end sm:px-6">
      <button type="button" class="bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
        Annuler
      </button>
      <button type="submit" name="save-security" class="ml-5 bg-sky-700 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
        Sauvegarder
      </button>
    </div>
  </div>
</form>
@endsection