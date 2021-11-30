@foreach($hebergements as $heb)
  <div id="editModal-{{ $heb['id'] }}" class="h-0 opacity-0 transition duration-200 fixed inset-0 overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <div class="absolute inset-0 overflow-hidden">
      <!-- Background overlay, show/hide based on slide-over state. -->
      <div class="absolute inset-0" aria-hidden="true"></div>

      <div class="fixed inset-y-0 pl-16 max-w-full right-0 flex">
        <div class="w-screen max-w-md">
          <form class="h-full divide-y divide-gray-200 flex flex-col bg-gray-300 bg-opacity-75 backdrop-filter backdrop-blur-md shadow-xl">
            <div class="flex-1 h-0 overflow-y-auto">
              <div class="py-6 px-4 bg-teal-700 sm:px-6">
                <div class="flex items-center justify-between">
                  <h2 class="text-lg font-medium text-white" id="slide-over-title">
                    Editer Hébergement
                  </h2>
                  <div class="ml-3 h-7 flex items-center">
                    <button data-modal-close type="button" class="bg-teal-700 rounded-md text-teal-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                      <span class="sr-only">Close panel</span>
                      <!-- Heroicon name: outline/x -->
                      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </button>
                  </div>
                </div>
                <div class="mt-1">
                  <p class="text-sm text-teal-300">
                    {{ $heb['description'] }}
                  </p>
                </div>
              </div>

              <div class="mt-5 mx-3 md:mt-3 md:col-span-2">
                <form action="#" method="POST">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                      <label for="nom" class="block text-xs font-medium text-gray-700">Nom</label>
                      <input type="text" name="nom" id="nom" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                      <label for="type" class="block text-xs font-medium text-gray-700">Type</label>
                      <input type="text" name="type" id="type" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                      <label for="nombre-place" class="block text-xs font-medium text-gray-700">Nombre place</label>
                      <input type="text" name="nombre-place" id="nombre-place" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                      <label for="surface" class="block text-xs font-medium text-gray-700">Surface</label>
                      <input type="text" name="surface" id="surface" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                      <label for="internet" class="block text-xs font-medium text-gray-700">Internet</label>
                      <input type="text" name="internet" id="internet" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                      <label for="annee" class="block text-xs font-medium text-gray-700">Année</label>
                      <input type="text" name="annee" id="annee" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                      <label for="secteur" class="block text-xs font-medium text-gray-700">Secteur</label>
                      <input type="text" name="secteur" id="secteur" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                      <label for="orientation" class="block text-xs font-medium text-gray-700">Orientation</label>
                      <input type="text" name="orientation" id="orientation" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                      <label for="etat" class="block text-xs font-medium text-gray-700">État</label>
                      <input type="text" name="etat" id="etat" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                      <label for="description" class="block text-xs font-medium text-gray-700">Description</label>
                      <input type="text" name="description" id="description" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                      <label for="illustration" class="block text-xs font-medium text-gray-700">Illustration</label>
                      <input type="text" name="illustration" id="illustration" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                      <label for="tarif" class="block text-xs font-medium text-gray-700">Tarif</label>
                      <input type="text" name="tarif" id="tarif" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" />
                    </div>
                  </div>
                </form>
              </div>

            </div>
            <div class="flex-shrink-0 px-4 py-4 flex justify-end">
              <button
                  data-modal-close
                  type="button"
                  class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500"
              >
                Annuler
              </button>
              <button
                  type="submit"
                  class="ml-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500"
              >
                Sauvegarder
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach
