<!DOCTYPE html>
<html lang="fr">
<head>
    @include('components.head')
</head>
<body @unless(empty($body_classes)) class="{{ $body_classes }}" @endunless>
    <div>
        <div x-data="{ mainMenu: false }" class="relative bg-sky-700 pb-32 overflow-hidden">
          <!-- Menu open: "bg-sky-900", Menu closed: "bg-transparent" -->
          <nav :class="{ 'bg-sky-900': mainMenu, 'bg-transparent': !mainMenu }" class="relative z-10 border-b border-teal-500 border-opacity-25 lg:bg-transparent lg:border-none">
            <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
              <div class="relative h-16 flex items-center justify-between lg:border-b lg:border-sky-800">
                <div class="px-2 flex items-center lg:px-0">
                  <div class="flex-shrink-0">
                    <a href="/">
                      <img class="block h-8 w-auto" src="@asset('logo_teal_light')" alt="VVA">
                    </a>
                  </div>
                  <div class="hidden lg:block lg:ml-6 lg:space-x-4">
                    <div class="flex">
                      <!-- Current: "bg-black bg-opacity-25", Default: "hover:bg-sky-800" -->
                      <a href="#" class="bg-black bg-opacity-25 rounded-md py-2 px-3 text-sm font-medium text-white">Hébergements</a>
      
                      <a href="#" class="hover:bg-sky-800 rounded-md py-2 px-3 text-sm font-medium text-white">Autre</a>
      
                    </div>
                  </div>
                </div>
                <div class="flex-1 px-2 flex justify-center lg:ml-6 lg:justify-end">
                  <div class="max-w-lg w-full lg:max-w-xs">
                    <label for="search" class="sr-only">Rechercher</label>
                    <div class="relative text-sky-100 focus-within:text-gray-400">
                      <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                        <!-- Heroicon name: solid/search -->
                        <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                      </div>
                      <input id="search" name="search" class="block w-full bg-sky-700 bg-opacity-50 py-2 pl-10 pr-3 border border-transparent rounded-md leading-5 placeholder-sky-100 focus:outline-none focus:bg-white focus:ring-white focus:border-white focus:placeholder-gray-500 focus:text-gray-900 sm:text-sm" placeholder="Rechercher" type="search">
                    </div>
                  </div>
                </div>
                <div class="flex lg:hidden">
                  <!-- Mobile menu button -->
                  <button type="button" @click="mainMenu = !mainMenu" class="p-2 rounded-md inline-flex items-center justify-center text-sky-200 hover:text-white hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Ouvrir le menu principal</span>

                    <svg :class="{ 'hidden': mainMenu, 'block': !mainMenu }" class="flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    
                    <svg :class="{ 'block': mainMenu, 'hidden': !mainMenu }" class="hidden flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
                <div class="hidden lg:block lg:ml-4">
                  <div class="flex items-center">
                    <button class="flex-shrink-0 rounded-full p-1 text-sky-200 hover:bg-sky-800 hover:text-white focus:outline-none focus:bg-sky-900 focus:ring-2 focus:ring-offset-2 focus:ring-offset-sky-900 focus:ring-white">
                      <span class="sr-only">Voir les notifications</span>
                      <i class="far fa-bell fa-lg"></i>
                    </button>
      
                    <!-- Menu déroulant du profil -->
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
                        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                        x-cloak
                      >
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        <a href="/dash" class="block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Tableau de bord</a>
      
                        <a href="/settings/account" class="block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Paramètres</a>
      
                        <a href="/auth/logout" class="block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Déconnexion</a>
                      </div>
                      @endauth
      
      
                  {{--  <div 
                    class="absolute z-10 -left-auto transform -translate-x-1/2 mt-3 px-2 w-screen max-w-sm sm:px-0"
                  >
                    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                      <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                        <a href="/dash" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                          <svg class="flex-shrink-0 h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                          </svg>
                          <div class="ml-4">
                            <p class="text-base font-medium text-gray-900">
                              Tableau de Bord
                            </p>
                            <p class="mt-1 text-sm text-gray-500">
                              Permet de voir et de gérer vos commandes et vos réservations.
                            </p>
                          </div>
                        </a>
                      </div>
                      <div class="px-5 py-5 bg-gray-50 space-y-6 sm:flex sm:space-y-0 sm:space-x-10 sm:px-8 justify-center">
                        <div class="flow-root">
                          <a href="/settings/account" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100 transition ease-in-out duration-150">
                            <i class="fad fa-cog fa-spin fa-swap-opacity fa-lg flex-shrink-0 text-gray-400"></i>
                            <span class="ml-3">Paramètres</span>
                          </a>
                        </div>
                
                        <div class="flow-root">
                          <a href="/auth/logout" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100 transition ease-in-out duration-150">
                            <i class="fad fa-sign-out fa-lg flex-shrink-0 text-gray-400"></i>
                            <span class="ml-3">Déconnexion</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>--}}
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
      
            <!-- Menu mobile, afficher/masquer en fonction de l'état du menu. -->
            <div x-show="mainMenu" class="bg-sky-900 lg:hidden" id="mobile-menu" x-cloak>
              <div class="pt-2 pb-3 px-2 space-y-1">
                <!-- Current: "bg-black bg-opacity-25", Default: "hover:bg-sky-800" -->
                <a href="#" class="bg-black bg-opacity-25 block rounded-md py-2 px-3 text-base font-medium text-white">Hébergements</a>
      
                <a href="#" class="hover:bg-sky-800 block rounded-md py-2 px-3 text-base font-medium text-white">Autre</a>
              </div>
              <div class="pt-4 pb-3 border-t border-sky-800">
                <div class="flex items-center px-4">
                  <div class="flex-shrink-0">
                    <img class="rounded-full h-10 w-10" src="{{ $avatar }}" alt="">
                  </div>
                  <div class="ml-3">
                    <div class="text-base font-medium text-white">{{ $prenom.' '.$nom }}</div>
                    <div class="text-sm font-medium text-sky-200">{{ $email }}</div>
                  </div>
                  <button class="ml-auto flex-shrink-0 rounded-full p-1 text-sky-200 hover:bg-sky-800 hover:text-white focus:outline-none focus:bg-sky-900 focus:ring-2 focus:ring-offset-2 focus:ring-offset-sky-900 focus:ring-white">
                    <span class="sr-only">Voir les notifications</span>
                    <i class="far fa-bell fa-lg"></i>
                  </button>
                </div>
                <div class="mt-3 px-2">
                  <a href="/dash" class="block rounded-md py-2 px-3 text-base font-medium text-sky-200 hover:text-white hover:bg-sky-800">Tableau de bord</a>
      
                  <a href="/settings/account" class="block rounded-md py-2 px-3 text-base font-medium text-sky-200 hover:text-white hover:bg-sky-800">Paramètres</a>
      
                  <a href="/auth/logout" class="block rounded-md py-2 px-3 text-base font-medium text-sky-200 hover:text-white hover:bg-sky-800">Déconnexion</a>
                </div>
              </div>
            </div>
          </nav>
          <!-- Menu open: "bottom-0", Menu closed: "inset-y-0" -->
          <div :class="{ 'bottom-0': mainMenu, 'inset-y-0': !mainMenu }" class="absolute flex justify-center inset-x-0 left-1/2 transform -translate-x-1/2 w-full overflow-hidden lg:inset-y-0" aria-hidden="true">
            <div class="flex-grow bg-sky-900 bg-opacity-75"></div>
            <svg class="flex-shrink-0" width="1750" height="308" viewBox="0 0 1750 308" xmlns="http://www.w3.org/2000/svg">
              <path opacity=".75" d="M1465.84 308L16.816 0H1750v308h-284.16z" fill="#075985" />
              <path opacity=".75" d="M1733.19 0L284.161 308H0V0h1733.19z" fill="#0c4a6e" />
            </svg>
            <div class="flex-grow bg-sky-800 bg-opacity-75"></div>
          </div>
          <header class="relative py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <h1 class="text-3xl font-bold text-white">
                Paramètres
              </h1>
            </div>
          </header>
        </div>

        <main class="relative -mt-32">
          <div class="max-w-screen-xl mx-auto pb-6 px-4 sm:px-6 lg:pb-16 lg:px-8">
            <div class="bg-white rounded-lg shadow overflow-hidden">
              <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
                @include('settings.components.sidenav')
        
                @yield('content')
              </div>
            </div>
          </div>
        </main>
      
      </div>

    @include('components.footer')
    @include('components.scripts')
</body>
</html>