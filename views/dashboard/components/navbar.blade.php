<!-- Top nav-->
<header x-data="{ mainMenu: false }" class="relative flex items-center h-16 bg-blue-900 shrink-0">
  <!-- Logo area -->
  <div class="absolute inset-y-0 left-0 lg:static lg:shrink-0">
    <a href="#" class="flex items-center justify-center w-16 h-16 bg-blue-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-600 lg:w-20">
      <img class="z-10 w-auto h-8" src="@asset('logo_light')" alt="VVA">
      <div class="absolute flex justify-center w-full">
        <svg class="text-blue-900 shrink-0" width="80" height="64" xmlns="http://www.w3.org/2000/svg">
          <g>
            <rect transform="rotate(39, 56.6667, 4.66666)" stroke-width="0" id="svg_3" height="64" width="136.81097" y="-27.33333" x="-11.73882" fill="currentColor" opacity="1"/>
          </g>
        </svg>
      </div>
    </a>
  </div>

  <!-- Menu button area -->
  <div class="absolute inset-y-0 right-0 flex items-center pr-4 sm:pr-6 lg:hidden">
    <!-- Mobile menu button -->
    <button type="button" @click="mainMenu = !mainMenu" class="inline-flex items-center justify-center p-2 -mr-2 text-blue-200 rounded-md hover:text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-600">
      <span class="sr-only">Ouvrir le menu principal</span>
      <!-- Heroicon name: outline/menu -->
      <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>

  <!-- Desktop nav area -->
  <div class="hidden lg:min-w-0 lg:flex-1 lg:flex lg:items-center lg:justify-between">
    <div class="flex-1 min-w-0">
      <div class="relative max-w-2xl text-white focus-within:text-blue-200">
        <label for="search" class="sr-only">Rechercher</label>
        <input id="search" type="search" placeholder="Rechercher ({{ $type_compte }})" class="block w-full pl-12 placeholder-white transition duration-75 bg-blue-900 border-transparent focus:border-transparent sm:text-sm focus:ring-0">
        <div class="absolute inset-y-0 left-0 flex items-center justify-center pl-4 pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
      </div>
    </div>
    <div class="flex items-center pr-4 ml-10 space-x-10 shrink-0">
      <div class="flex items-center">
        <a href="#" class="p-1 text-blue-200 transition duration-75 rounded-md shrink-0 hover:bg-blue-800 hover:text-white focus:outline-none focus:bg-blue-900 focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-900 focus:ring-white">
          <span class="sr-only">Voir les notifications</span>
          <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
        </a>

        <div x-data="{ userMenu: false }" class="relative ml-4 shrink-0">
          @auth
            <div>
              <button type="button" data-dropdown="user-menu" class="flex text-sm text-white transition duration-75 rounded-md focus:outline-none focus:bg-blue-900 focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-900 focus:ring-white" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Ouvrir le menu utilisateur</span>
                <img class="w-8 h-8 rounded-full" src="{{ $avatar }}" alt="">
                <svg :class="{ 'rotate-180': userMenu, 'rotate-0': !userMenu }" class="text-white transition-transform duration-200 ml-1 h-5 w-5 mt-1.5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>

            <div id="user-menu" class="absolute right-0 z-30 w-48 py-1 mt-2 origin-top-right scale-95 bg-white rounded-md shadow-lg opacity-0 ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu" tabindex="-1" cloak>
              <!-- Active: "bg-gray-100", Not Active: "" -->
              <a href="/" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Retourner à l'accueil</a>
              <a href="/my-bookings" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Mes réservations</a>
              <a href="/account/settings" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Mon compte</a>
              <a href="/auth/logout" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Se déconnecter</a>
            </div>
          @endauth
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide this `div` based on menu open/closed state -->

  <div x-show="mainMenu" class="fixed inset-0 z-40 lg:hidden" role="dialog" aria-modal="true" cloak>
    <div
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="hidden sm:block sm:fixed sm:inset-0 sm:bg-gray-600 sm:bg-opacity-75" aria-hidden="true"
    ></div>

    <nav
        x-transition:enter="transition ease-out duration-150 sm:ease-in-out sm:duration-300"
        x-transition:enter-start="ransform opacity-0 scale-110 sm:translate-x-full sm:scale-100 sm:opacity-100"
        x-transition:enter-end="opacity-100 scale-100 sm:translate-x-0 sm:scale-100 sm:opacity-100"
        x-transition:leave="transition ease-in duration-150 sm:ease-in-out sm:duration-300"
        x-transition:leave-start="opacity-100 scale-100 sm:translate-x-0 sm:scale-100 sm:opacity-100"
        x-transition:leave-end="opacity-0 scale-110 sm:translate-x-full sm:scale-100 sm:opacity-100"
        class="fixed inset-0 z-40 w-full h-full bg-white sm:inset-y-0 sm:left-auto sm:right-0 sm:max-w-sm sm:w-full sm:shadow-lg" aria-label="Global"
    >
      <div class="flex items-center justify-between h-16 px-4 sm:px-6">
        <a href="#">
          <img class="block w-auto h-8" src="@asset('logo_dark')" alt="VVA">
        </a>
        <button type="button" @click="mainMenu = !mainMenu" class="inline-flex items-center justify-center p-2 -mr-2 text-gray-400 rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-600">
          <span class="sr-only">Close main menu</span>
          <!-- Heroicon name: outline/x -->
          <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="px-4 mx-auto mt-2 max-w-8xl sm:px-6">
        <div class="relative text-gray-400 focus-within:text-gray-500">
          <label for="search" class="sr-only">Rechercher</label>
          <input id="search" type="search" placeholder="Rechercher" class="block w-full pl-10 placeholder-gray-500 border-gray-300 rounded-md focus:border-blue-600 focus:ring-blue-600">
          <div class="absolute inset-y-0 left-0 flex items-center justify-center pl-3">
            <i class="far fa-search"></i>
          </div>
        </div>
      </div>
      <div class="px-2 py-3 mx-auto max-w-8xl sm:px-4">
        <a href="/dashboard" class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-100">Statistiques</a>
        <a href="/dashboard/lodgings" class="block py-2 pl-5 pr-3 text-base font-medium text-gray-500 rounded-md hover:bg-gray-100">Hébergements</a>
        <a href="/dashboard/bookings" class="block py-2 pl-5 pr-3 text-base font-medium text-gray-500 rounded-md hover:bg-gray-100">Réservations</a>
        <a href="/dashboard/users" class="block py-2 pl-5 pr-3 text-base font-medium text-gray-500 rounded-md hover:bg-gray-100">Utilisateurs</a>
      </div>
      <div class="pt-4 pb-3 border-t border-gray-200">
        <div class="flex items-center px-4 mx-auto max-w-8xl sm:px-6">
          <div class="shrink-0">
            <img class="w-10 h-10 rounded-full" src="{{ $avatar }}" alt="">
          </div>
          <div class="flex-1 min-w-0 ml-3">
            <div class="text-base font-medium text-gray-800 truncate">{{ $nom.' '.$prenom }}</div>
            <div class="text-sm font-medium text-gray-500 truncate">{{ $email }}</div>
          </div>
          <a href="#" class="p-2 ml-auto text-gray-400 bg-white shrink-0 hover:text-gray-500">
            <span class="sr-only">View notifications</span>
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
          </a>
        </div>
        <div class="px-2 mx-auto mt-3 space-y-1 max-w-8xl sm:px-4">
          <a href="/" class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-50">Retourner à l'accueil</a>

          <a href="/account/settings" class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-50">Mon compte</a>

          <a href="/auth/logout" class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-50">Se déconnecter</a>
        </div>
      </div>
    </nav>
  </div>
</header>