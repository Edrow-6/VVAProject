{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('layouts.app', ['page_type' => 'security', 'body_classes' => 'bg-gray-100'])

@section('content')
@include('components.navbar')

<div class="lg:grid lg:grid-cols-12 lg:gap-x-5 mt-6 min-h-screen">
  @include('settings.components.sidenav')

  <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9 lg:mr-6">
    <form action="#" method="POST">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
          <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Mot de passe</h3>
            <p class="mt-1 text-sm text-gray-500">Modifiez votre mot de passe et ne l'oubliez pas.</p>
          </div>

          <div class="grid grid-cols-6 gap-6">

            <div class="col-span-6 sm:col-span-2">
              <label for="phone-number" class="block text-sm font-medium text-gray-700">Ancien mot de passe</label>
              <input type="password" name="old-password" id="old-password" autocomplete="old-pwd" pattern="[A-Za-z0-9-_.]{5,20}" value="" class="mt-1 block transition duration-100 w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="col-span-6 sm:col-span-2">
              <label for="phone-number" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
              <input type="password" name="new-password" id="new-password" autocomplete="new-pwd" pattern="[A-Za-z0-9-_.]{5,20}" value="" class="mt-1 block transition duration-100 w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="col-span-6 sm:col-span-2">
              <label for="phone-number" class="block text-sm font-medium text-gray-700">Confirmer nouveau mot de passe</label>
              <input type="password" name="confirm-password" id="confirm-password"" autocomplete="confirm-pwd" pattern="[A-Za-z0-9-_.]{5,20}" value="" class="mt-1 block transition duration-100 w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
          </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
          <button type="submit" name="save" class="bg-blue-500 border border-transparent transform hover:scale-105 hover:shadow duration-150 rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
            Sauvegarder
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection