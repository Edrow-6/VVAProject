<!DOCTYPE html>
<html lang="fr">
<head>
  @include('components.head')
</head>
<body @unless(empty($body_classes)) class="{{ $body_classes }}" @endunless>
  <div class="relative h-screen overflow-hidden bg-gray-100 flex flex-col">
    @include('dashboard.components.navbar')

    <div class="min-h-0 flex-1 flex overflow-hidden">
      @include('dashboard.components.sidebar')
  
      <!-- Main -->
      <main class="min-w-0 flex-1 border-t border-gray-200 xl:flex">
        @yield('content')
      </main>
    </div>
  </div>

  @include('dashboard.components.addEntry-button')
  @include('components.flash')
  @include('components.scripts')

  <script>
    tippy("#stats", {
      content: "Statistiques",
      placement: "left",
      theme: "translucent",
    });
    tippy("#lodgings", {
      content: "Hébergements",
      placement: "left",
      theme: "translucent",
    });
    tippy("#bookings", {
      content: "Réservations",
      placement: "left",
      theme: "translucent",
    });
    tippy("#users", {
        content: "Utilisateurs",
        placement: "left",
        theme: "translucent",
    });
    tippy("#add-entry", {
        content: "Créer",
        placement: "left",
        theme: "translucent",
    });
  </script>
</body>
</html>