<nav class="bg-gray-100 shadow top-0 z-10 transition-spacing duration-200">
  <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex px-2 lg:px-0">
        <div class="shrink-0 flex items-center">
          <a href="/">
            <img class="h-8 w-auto" src="@asset('logo_teal_dark')" alt="VVA">
          </a>
        </div>
        <div class="hidden lg:ml-6 lg:flex lg:space-x-8">
          <!-- Current: "border-teal-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
          <a href="/" class="@if($page_type == 'home') border-teal-500 text-gray-900 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif transition duration-75 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
          </a>
          <a href="/blog" class="@if($page_type == 'blog') border-teal-500 text-gray-900 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif transition duration-75 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-semibold">
            Blog
          </a>
          <a href="/lodging" class="@if($page_type == 'lodging') border-teal-500 text-gray-900 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif transition duration-75 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-semibold">
            Hébergements
          </a>
          <a href="/about" class="@if($page_type == 'about') border-teal-500 text-gray-900 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif transition duration-75 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-semibold">
            A propos
          </a>
          <a href="/faq" class="@if($page_type == 'faq') border-teal-500 text-gray-900 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif transition duration-75 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-semibold">
            FAQ
          </a>
        </div>
      </div>
      <div class="flex-1 flex items-center justify-center px-2 lg:ml-6 lg:justify-end">
        <div class="max-w-lg w-full lg:max-w-xs">
          <label for="search" class="sr-only">Rechercher</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
            <input id="search" name="search" class="transition duration-75 block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-teal-500 focus:border-teal-500 sm:text-sm" placeholder="Rechercher" type="search">
          </div>
        </div>
      </div>
      <div class="flex items-center lg:hidden">
        <!-- Mobile menu button -->
        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-teal-500" aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Ouvrir le menu principal</span>
          <!--
            Icon when menu is closed.

            Heroicon name: outline/menu

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <!--
            Icon when menu is open.

            Heroicon name: outline/x

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:ml-4 lg:flex lg:items-center">
        <button class="shrink-0 bg-transparent p-1 text-gray-400 rounded-md transition duration-75 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
          <span class="sr-only">Voir les notifications</span>
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
        </button>

        <!-- Menu déroulant du profil -->
        @auth
          <div x-data="{ userMenu: false }" class="ml-4 relative shrink-0">
            <div>
<<<<<<< HEAD
              <button data-dropdown="user-menu" type="button" @click="userMenu = !userMenu" class="transition duration-75 bg-transparent rounded-md flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500" aria-expanded="false" aria-haspopup="true">
=======
              <button type="button" @click="userMenu = !userMenu" class="transition duration-75 bg-transparent rounded-md flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
>>>>>>> dev
                <span class="sr-only">Ouvrir le menu utilisateur</span>
                <img class="h-8 w-8 rounded-full" src="{{ $avatar }}" alt="">
                <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-180': userMenu, 'rotate-0': !userMenu }" class="h-5 w-5 text-gray-400 mx-2 transition-transform duration-200 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>

<<<<<<< HEAD
            <div id="user-menu" class="opacity-0 scale-95 z-20 origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu" tabindex="-1" cloak>
=======
            <div x-show="userMenu"
                 @click.away="userMenu = false"
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="z-20 origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                 role="menu"
                 aria-orientation="vertical"
                 aria-labelledby="user-menu-button"
                 tabindex="-1"
                 x-cloak
            >
>>>>>>> dev
              <!-- Active: "bg-gray-100", Not Active: "" -->
              @auth('admin')
                <a href="/dashboard" class="block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Tableau de bord</a>
              @elseauth('gestion')
                <a href="/dashboard" class="block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Tableau de bord</a>
              @endauth
              <a href="/my-bookings" class="block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Mes réservations</a>
              <a href="/settings/account" class="block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Mon compte</a>
              <a href="/auth/logout" class="block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Se déconnecter</a>
            </div>
          </div>
        @else
          <div class="shrink-0 md:ml-4">
            <a href="/auth/login" class="button-blue flex items-center px-4 py-2">
              <i class="fad fa-sign-in-alt -ml-1 mr-2"></i>
              <span class="drop-shadow">Se connecter</span>
            </a>
          </div>
        @endauth
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="lg:hidden" id="mobile-menu">
    <div class="pt-2 pb-3 space-y-1">
      <!-- Current: "bg-teal-50 border-teal-500 text-teal-700", Default: "border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800" -->
      <a href="/blog" class="bg-teal-50 border-teal-500 text-teal-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Blog</a>
      <a href="/lodgings" class="border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Hébergements</a>
      <a href="/about" class="border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">A propos</a>
      <a href="/faq" class="border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">FAQ</a>
    </div>
    <div class="pt-4 pb-3 border-t border-gray-200">
      <div class="flex items-center px-4">
        <div class="shrink-0">
          <img class="h-10 w-10 rounded-full" src="{{ $avatar }}" alt="">
        </div>
        <div class="ml-3">
          <div class="text-base font-medium text-gray-800">{{ $nom.' '.$prenom }}</div>
          <div class="text-sm font-medium text-gray-500">{{ $email }}</div>
        </div>
        <button class="ml-auto shrink-0 bg-white p-1 text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
          <span class="sr-only">Voir les notifications</span>
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
        </button>
      </div>
      <div class="mt-3 space-y-1">
        <a href="/dashboard" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Tableau de bord</a>
        <a href="/account/settings" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Mon compte</a>
        <a href="/auth/logout" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Se déconnecter</a>
      </div>
    </div>
  </div>
</nav>