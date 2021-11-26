<!-- Narrow sidebar-->
<nav aria-label="Sidebar" class="hidden lg:block lg:flex-shrink-0 lg:bg-sky-800 lg:overflow-y-auto">
  <div class="relative w-20 flex flex-col p-3 space-y-3">
    <a href="/dashboard" id="stats" class="@if($page_type == 'stats') bg-black border-b-4 bg-opacity-25 @else hover:bg-sky-700 @endif text-white flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-md">
      <span class="sr-only">Statistiques</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
      </svg>
    </a>

    <a href="/dashboard/lodgings" id="lodgings" class="@if($page_type == 'lodgings') bg-black border-b-4 bg-opacity-25 @else hover:bg-sky-700 @endif text-white flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-md">
      <span class="sr-only">Hébergements</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
      </svg>
    </a>

    <a href="/dashboard/bookings" id="bookings" class="@if($page_type == 'bookings') bg-black border-b-4 bg-opacity-25 @else hover:bg-sky-700 @endif text-white  flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-md">
      <span class="sr-only">Réservations</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
      </svg>
    </a>

    <a href="/dashboard/users" id="users" class="@if($page_type == 'users') bg-black border-b-4 bg-opacity-25 @else hover:bg-sky-700 @endif text-white  flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-md">
      <span class="sr-only">Utilisateurs</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
      </svg>
    </a>
  </div>
</nav>