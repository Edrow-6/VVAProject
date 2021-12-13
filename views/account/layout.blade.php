<!DOCTYPE html>
<html lang="fr">
<head>
    @include('components.head')
</head>
<body @unless(empty($body_classes)) class="{{ $body_classes }}" @endunless>
    <div class="bg-svg-lines">
        <div x-data="{ mainMenu: false }" class="relative pb-32 overflow-hidden">
          @include('account.components.navbar')
          <header class="relative py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <h1 class="text-3xl font-bold text-white">
                Compte
                <span class="text-sm">
                  @if($page_type == 'settings')
                    / paramètres
                  @elseif($page_type == 'security')
                    / sécurité
                  @elseif($page_type == 'billing')
                    / facturation
                  @endif
                </span>
              </h1>
            </div>
          </header>
        </div>

        <main class="relative -mt-32">
          <div class="max-w-screen-xl mx-auto pb-6 px-4 sm:px-6 lg:pb-16 lg:px-8">
            <div class="bg-white bg-opacity-25 backdrop-blur-4xl py-4 px-4 shadow rounded-xl overflow-hidden">
              <div class="divide-y divide-white divide-opacity-25 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x-2">
                @include('account.components.sidenav')
        
                @yield('content')
              </div>
            </div>
          </div>
        </main>
      </div>

    @include('components.footer')
    @include('components.flash')
    @include('components.scripts')
</body>
</html>