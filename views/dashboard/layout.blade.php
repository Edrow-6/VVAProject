<!DOCTYPE html>
<html lang="fr">
<head>
  @include('components.head')
</head>
<body @unless(empty($body_classes)) class="{{ $body_classes }}" @endunless>
  <div class="relative h-screen overflow-hidden bg-gray-100 flex flex-col">
    <!-- Top nav-->
    <header x-data="{ mainMenu: false }" class="flex-shrink-0 relative h-16 bg-sky-900 flex items-center">
      <!-- Logo area -->
      <div class="absolute inset-y-0 left-0 lg:static lg:flex-shrink-0">
        <a href="#" class="flex items-center justify-center h-16 w-16 bg-sky-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-600 lg:w-20">
          <img class="h-8 w-auto z-10" src="@asset('logo_light')" alt="VVA">
          <div class="absolute flex justify-center w-full"> 
            <svg class="flex-shrink-0" width="80" height="64" xmlns="http://www.w3.org/2000/svg">
              <g>
                <title>Slide</title>
                <rect transform="rotate(39, 56.6667, 4.66666)" stroke-width="0" id="svg_3" height="64" width="136.81097" y="-27.33333" x="-11.73882" fill="#0c4a6e" opacity="1"/>
              </g>
             </svg>
          </div>
        </a>
      </div>
  
      <!-- Menu button area -->
      <div class="absolute inset-y-0 right-0 pr-4 flex items-center sm:pr-6 lg:hidden">
        <!-- Mobile menu button -->
        <button type="button" @click="mainMenu = !mainMenu" class="-mr-2 inline-flex items-center justify-center p-2 rounded-md text-sky-200 hover:text-white hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-600">
          <span class="sr-only">Ouvrir le menu principal</span>
          <!-- Heroicon name: outline/menu -->
          <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
  
      <!-- Desktop nav area -->
      <div class="hidden lg:min-w-0 lg:flex-1 lg:flex lg:items-center lg:justify-between">
        <div class="min-w-0 flex-1">
          <div class="max-w-2xl relative text-white focus-within:text-sky-200">
            <label for="search" class="sr-only">Rechercher</label>
            <input id="search" type="search" placeholder="Rechercher ({{ $test }})" class="block w-full border-transparent pl-12 placeholder-white bg-sky-900 focus:border-transparent sm:text-sm focus:ring-0">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center justify-center pl-4">
              <i class="far fa-search"></i>
            </div>
          </div>
        </div>
        <div class="ml-10 pr-4 flex-shrink-0 flex items-center space-x-10">
          <div class="flex items-center">
            <a href="#" class="flex-shrink-0 rounded-full p-1 text-sky-200 hover:bg-sky-800 hover:text-white focus:outline-none focus:bg-sky-900 focus:ring-2 focus:ring-offset-2 focus:ring-offset-sky-900 focus:ring-white">
              <span class="sr-only">Voir les notifications</span>
              <i class="far fa-bell fa-lg"></i>
            </a>
  
            <div x-data="{ userMenu: false }" class="relative flex-shrink-0 ml-4">
              @auth
              <div>
                <button type="button" @click="userMenu = !userMenu" class="rounded-full flex text-sm text-white focus:outline-none focus:bg-sky-900 focus:ring-2 focus:ring-offset-2 focus:ring-offset-sky-900 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="sr-only">Ouvrir le menu utilisateur</span>
                  <img class="rounded-full h-8 w-8" src="{{ $avatar }}" alt="">
                  <svg :class="{ 'rotate-180': userMenu, 'rotate-0': !userMenu }" class="text-white transform transition-transform duration-200 ml-1 h-5 w-5 mt-1.5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>
      
              <div
                x-show="userMenu" 
                x-transition:enter="transition ease-out duration-100" 
                x-transition:enter-start="transform opacity-0 scale-95" 
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75" 
                x-transition:leave-start="transform opacity-100 scale-100" 
                x-transition:leave-end="transform opacity-0 scale-95" 
                class="origin-top-right absolute z-30 right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                x-cloak
              >
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <a href="/" class="block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Retourner ?? l'accueil</a>
      
                <a href="/settings/account" class="block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Param??tres</a>
      
                <a href="/auth/logout" class="block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">D??connexion</a>
              </div>
              @endauth
            </div>
          </div>
        </div>
      </div>
  
      <!-- Mobile menu, show/hide this `div` based on menu open/closed state -->
  
      <div x-show="mainMenu" class="fixed inset-0 z-40 lg:hidden" role="dialog" aria-modal="true" x-cloak>
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
          x-transition:enter-end="transform opacity-100 scale-100 sm:translate-x-0 sm:scale-100 sm:opacity-100"
          x-transition:leave="transition ease-in duration-150 sm:ease-in-out sm:duration-300"
          x-transition:leave-start="transform opacity-100 scale-100 sm:translate-x-0 sm:scale-100 sm:opacity-100" 
          x-transition:leave-end="transform opacity-0 scale-110 sm:translate-x-full sm:scale-100 sm:opacity-100" 
          class="fixed z-40 inset-0 h-full w-full bg-white sm:inset-y-0 sm:left-auto sm:right-0 sm:max-w-sm sm:w-full sm:shadow-lg" aria-label="Global"
        >
          <div class="h-16 flex items-center justify-between px-4 sm:px-6">
            <a href="#">
              <img class="block h-8 w-auto" src="@asset('logo_dark')" alt="VVA">
            </a>
            <button type="button" @click="mainMenu = !mainMenu" class="-mr-2 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-600">
              <span class="sr-only">Close main menu</span>
              <!-- Heroicon name: outline/x -->
              <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <div class="mt-2 max-w-8xl mx-auto px-4 sm:px-6">
            <div class="relative text-gray-400 focus-within:text-gray-500">
              <label for="search" class="sr-only">Rechercher</label>
              <input id="search" type="search" placeholder="Rechercher" class="block w-full border-gray-300 rounded-md pl-10 placeholder-gray-500 focus:border-blue-600 focus:ring-blue-600">
              <div class="absolute inset-y-0 left-0 flex items-center justify-center pl-3">
                <i class="far fa-search"></i>
              </div>
            </div>
          </div>
          <div class="max-w-8xl mx-auto py-3 px-2 sm:px-4">
            <a href="/dash" class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:bg-gray-100">Statistiques</a>
  
            <a href="/dash/lodgings" class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">H??bergements</a>
  
            <a href="/dash/bookings" class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">R??servations</a>
          </div>
          <div class="border-t border-gray-200 pt-4 pb-3">
            <div class="max-w-8xl mx-auto px-4 flex items-center sm:px-6">
              <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" src="{{ $avatar }}" alt="">
              </div>
              <div class="ml-3 min-w-0 flex-1">
                <div class="text-base font-medium text-gray-800 truncate">{{ $prenom.' '.$nom }}</div>
                <div class="text-sm font-medium text-gray-500 truncate">{{ $email }}</div>
              </div>
              <a href="#" class="ml-auto flex-shrink-0 bg-white p-2 text-gray-400 hover:text-gray-500">
                <span class="sr-only">View notifications</span>
                <i class="far fa-bell fa-lg"></i>
              </a>
            </div>
            <div class="mt-3 max-w-8xl mx-auto px-2 space-y-1 sm:px-4">
              <a href="/" class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:bg-gray-50">Retourner ?? l'accueil</a>

              <a href="/settings/account" class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:bg-gray-50">Param??tres</a>
  
              <a href="/auth/logout" class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:bg-gray-50">D??connexion</a>
            </div>
          </div>
        </nav>
      </div>
    </header>
  
    <!-- Bottom section -->
    <div class="min-h-0 flex-1 flex overflow-hidden">
      <!-- Narrow sidebar-->
      <nav aria-label="Sidebar" class="hidden lg:block lg:flex-shrink-0 lg:bg-sky-800 lg:overflow-y-auto">
        <div class="relative w-20 flex flex-col p-3 space-y-3">
          <a href="/dash" id="stats" class="bg-black bg-opacity-25 text-white flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg">
            <span class="sr-only">Statistiques</span>
            <i class="far fa-user-chart fa-lg"></i>
          </a>
  
          <a href="/dash/lodgings" id="lodgings" class="text-white hover:bg-sky-700 flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg">
            <span class="sr-only">H??bergements</span>
            <i class="far fa-house-user fa-lg"></i>
          </a>
  
          <a href="/dash/bookings" id="bookings" class="text-white hover:bg-sky-700 flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg">
            <span class="sr-only">R??servations</span>
            <i class="far fa-address-book fa-lg"></i>
          </a>

        </div>
      </nav>
  
      <!-- Main area -->
      <main class="min-w-0 flex-1 border-t border-gray-200 xl:flex">
        @yield('content')
      </main>
    </div>
  </div>

  @include('components.scripts')

  <script>
    tippy("#stats", {
      content: "Statistiques",
      placement: "left",
      theme: "translucent",
    });
    tippy("#lodgings", {
      content: "H??bergements",
      placement: "left",
      theme: "translucent",
    });
    tippy("#bookings", {
      content: "R??servations",
      placement: "left",
      theme: "translucent",
    });
  </script>
</body>
</html>