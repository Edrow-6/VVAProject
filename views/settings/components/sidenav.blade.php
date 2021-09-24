<aside class="py-3 px-2 sm:px-6 lg:py-0 lg:px-0 lg:col-span-3">
  <nav class="space-y-1 lg:ml-7">
    <a href="/settings/account" class="@if($page == 'account') bg-gray-50 text-blue-700 hover:text-blue-700 hover:bg-white @else text-gray-900 hover:text-gray-900 hover:bg-gray-50 @endif group rounded-md px-3 py-2 flex items-center text-sm font-medium" aria-current="page">
      <svg class="@if($page == 'account') text-blue-500 group-hover:text-blue-500 @else text-gray-400 group-hover:text-gray-500 @endif flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <span class="truncate">
        Compte
      </span>
    </a>

    <a href="/settings/security" class="@if($page == 'security') bg-gray-50 text-blue-700 hover:text-blue-700 hover:bg-white @else text-gray-900 hover:text-gray-900 hover:bg-gray-50 @endif group rounded-md px-3 py-2 flex items-center text-sm font-medium">
      <svg class="@if($page == 'security') text-blue-500 group-hover:text-blue-500 @else text-gray-400 group-hover:text-gray-500 @endif flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
      </svg>
      <span class="truncate">
        Sécurité
      </span>
    </a>

    <a href="/settings/billing" class="@if($page == 'billing') bg-gray-50 text-blue-700 hover:text-blue-700 hover:bg-white @else text-gray-900 hover:text-gray-900 hover:bg-gray-50 @endif group rounded-md px-3 py-2 flex items-center text-sm font-medium">
      <svg class="@if($page == 'billing') text-blue-500 group-hover:text-blue-500 @else text-gray-400 group-hover:text-gray-500 @endif flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
      </svg>
      <span class="truncate">
        Paiement & Facturation
      </span>
    </a>
  </nav>
</aside>