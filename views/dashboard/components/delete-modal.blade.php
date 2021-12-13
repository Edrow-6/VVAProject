@foreach($hebergements as $heb)
  <div id="deleteModal-{{ $heb['id'] }}" class="invisible fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div id="background" class="opacity-0 backdrop-blur-sm fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      {{-- Cet élément sert à inciter le navigateur à centrer le contenu de la popup. --}}
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div id="foreground" class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95 inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
        <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
          <button data-modal-close type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <span class="sr-only">Fermer</span>
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="sm:flex sm:items-start">
          <div class="mx-auto shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
          </div>
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
              Supprimer {{ $heb['nom'] }} ?
            </h3>
            <div class="mt-2">
              <p class="text-sm text-gray-500">
                Êtes-vous sûr de vouloir supprimer cet hébergement ? Toutes ses informations seront définitivement supprimées. Cette action est irréversible.
              </p>
            </div>
          </div>
        </div>
        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
          <form action="/dashboard/lodgings" method="post">
            <button type="submit" name="delete" value="{{ $heb['id'] }}" class="button-red w-full inline-flex justify-center px-4 py-2 sm:ml-3 sm:w-auto">
              Supprimer
            </button>
          </form>
          <button data-modal-close type="button" class="button-white-outline mt-3 w-full inline-flex justify-center px-4 py-1.5 sm:mt-0 sm:w-auto">
            Annuler
          </button>
        </div>
      </div>
    </div>
  </div>
@endforeach
