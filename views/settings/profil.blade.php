{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('layouts.app', ['page_type' => 'profil', 'body_classes' => 'bg-gray-100'])

@section('content')
@include('components.navbar')

<div class="lg:grid lg:grid-cols-12 lg:gap-x-5 mt-6 mb-6">
  <aside class="py-6 px-2 sm:px-6 lg:py-0 lg:px-0 lg:col-span-3">
    <nav class="space-y-1 ml-7">
      <!-- Current: "bg-gray-50 text-blue-700 hover:text-blue-700 hover:bg-white", Default: "text-gray-900 hover:text-gray-900 hover:bg-gray-50" -->
      <a href="#" class="bg-gray-50 text-blue-700 hover:text-blue-700 hover:bg-white group rounded-md px-3 py-2 flex items-center text-sm font-medium" aria-current="page">
        <!--
          Heroicon name: outline/user-circle

          Current: "text-blue-500 group-hover:text-blue-500", Default: "text-gray-400 group-hover:text-gray-500"
        -->
        <svg class="text-blue-500 group-hover:text-blue-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="truncate">
          Compte
        </span>
      </a>

      <a href="#" class="text-gray-900 hover:text-gray-900 hover:bg-gray-50 group rounded-md px-3 py-2 flex items-center text-sm font-medium">
        <!-- Heroicon name: outline/key -->
        <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
        </svg>
        <span class="truncate">
          Mot de passe
        </span>
      </a>

      <a href="#" class="text-gray-900 hover:text-gray-900 hover:bg-gray-50 group rounded-md px-3 py-2 flex items-center text-sm font-medium">
        <!-- Heroicon name: outline/credit-card -->
        <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
        </svg>
        <span class="truncate">
          Plan & Facturation
        </span>
      </a>
    </nav>
  </aside>

  <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9 mr-6">
    <form action="#" method="POST">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
          <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Profil</h3>
            <p class="mt-1 text-sm text-gray-500">Ces informations seront affichées publiquement ; faites donc attention à ce que vous partagez.</p>
          </div>

          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3 sm:col-span-2"> {{-- Nouveau = col-span-3 --}}
              <label for="company-website" class="block text-sm font-medium text-gray-700">
                Pseudonyme
              </label>
              <div class="mt-1 rounded-md shadow-sm flex">
                <span class="bg-gray-50 border border-r-0 border-gray-300 rounded-l-md px-3 inline-flex items-center text-gray-500 sm:text-sm">
                  vva.dawbee.fr/
                </span>
                <input type="text" name="username" id="username" autocomplete="username" class="focus:ring-blue-500 focus:border-blue-500 flex-grow block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
              </div>
            </div>
          </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
          <button type="submit" class="bg-blue-500 border border-transparent transform hover:scale-105 hover:shadow duration-150 rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
            Sauvegarder
          </button>
        </div>
      </div>
    </form>

    <form action="#" method="POST">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
          <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Informations personnelles</h3>
            <p class="mt-1 text-sm text-gray-500">Utilisez une adresse permanente où vous pouvez recevoir des e-mails.</p>
          </div>

          <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
              <label for="first-name" class="block text-sm font-medium text-gray-700">Prénom</label>
              <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="last-name" class="block text-sm font-medium text-gray-700">Nom</label>
              <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="col-span-6 sm:col-span-4">
              <label for="email-address" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
              <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
          </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
          <button type="submit" class="bg-blue-500 border border-transparent transform hover:scale-105 hover:shadow duration-150 rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
            Sauvegarder
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

