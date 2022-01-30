@foreach($hebergements as $heb)
  <div id="edit-{{ $heb['id'] }}" class="fixed inset-0 invisible overflow-hidden duration-200 ransition" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <div class="absolute inset-0 overflow-hidden">
      <!-- Background overlay, show/hide based on slide-over state. -->
      <div id="background" class="absolute inset-0" aria-hidden="true"></div>

      <div id="foreground" class="fixed inset-y-0 right-0 flex max-w-full pl-16 opacity-0">
        <div class="w-screen max-w-md">
          <form class="flex flex-col h-full bg-gray-300 bg-opacity-75 divide-y divide-gray-200 shadow-xl backdrop-blur-md">
            <div class="flex-1 h-0 overflow-y-auto">
              <div class="px-4 py-6 bg-teal-700 sm:px-6">
                <div class="flex items-center justify-between">
                  <h2 class="text-lg font-medium text-white" id="slide-over-title">
                    Editer Hébergement
                  </h2>
                  <div class="flex items-center ml-3 h-7">
                    <button data-modal-close type="button" class="text-teal-200 bg-teal-700 rounded-md hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                      <span class="sr-only">Close panel</span>
                      <!-- Heroicon name: outline/x -->
                      <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
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

              <div class="mx-3 mt-5 md:mt-3 md:col-span-2">
                <form action="#" method="POST">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 px-3 py-2 mt-1 transition duration-150 bg-white border border-transparent rounded-lg shadow-sm sm:col-span-3 focus:shadow focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400">
                      <label for="nom" class="block text-xs font-medium text-gray-700">Nom</label>
                      <input type="text" name="nom" id="nom" required class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 px-3 py-2 mt-1 transition duration-150 bg-white border border-transparent rounded-lg shadow-sm sm:col-span-3 focus:shadow focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400">
                      <label for="type" class="block text-xs font-medium text-gray-700">Type</label>
                      <input type="text" name="type" id="type" required class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 px-3 py-2 mt-1 transition duration-150 bg-white border border-transparent rounded-lg shadow-sm sm:col-span-3 focus:shadow focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400">
                      <label for="nombre-place" class="block text-xs font-medium text-gray-700">Nombre place</label>
                      <input type="text" name="nombre-place" id="nombre-place" required class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 px-3 py-2 mt-1 transition duration-150 bg-white border border-transparent rounded-lg shadow-sm sm:col-span-3 focus:shadow focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400">
                      <label for="surface" class="block text-xs font-medium text-gray-700">Surface</label>
                      <input type="text" name="surface" id="surface" required class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 px-3 py-2 mt-1 transition duration-150 bg-white border border-transparent rounded-lg shadow-sm sm:col-span-3 focus:shadow focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400">
                      <label for="internet" class="block text-xs font-medium text-gray-700">Internet</label>
                      <input type="text" name="internet" id="internet" required class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 px-3 py-2 mt-1 transition duration-150 bg-white border border-transparent rounded-lg shadow-sm sm:col-span-3 focus:shadow focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400">
                      <label for="annee" class="block text-xs font-medium text-gray-700">Année</label>
                      <input type="text" name="annee" id="annee" required class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 px-3 py-2 mt-1 transition duration-150 bg-white border border-transparent rounded-lg shadow-sm sm:col-span-3 focus:shadow focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400">
                      <label for="secteur" class="block text-xs font-medium text-gray-700">Secteur</label>
                      <input type="text" name="secteur" id="secteur" required class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 px-3 py-2 mt-1 transition duration-150 bg-white border border-transparent rounded-lg shadow-sm sm:col-span-3 focus:shadow focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400">
                      <label for="orientation" class="block text-xs font-medium text-gray-700">Orientation</label>
                      <input type="text" name="orientation" id="orientation" required class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 px-3 py-2 mt-1 transition duration-150 bg-white border border-transparent rounded-lg shadow-sm sm:col-span-3 focus:shadow focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400">
                      <label for="etat" class="block text-xs font-medium text-gray-700">État</label>
                      <input type="text" name="etat" id="etat" required class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 px-3 py-2 mt-1 transition duration-150 bg-white border border-transparent rounded-lg shadow-sm sm:col-span-3 focus:shadow focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400">
                      <label for="description" class="block text-xs font-medium text-gray-700">Description</label>
                      <input type="text" name="description" id="description" required class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 px-3 py-2 mt-1 transition duration-150 bg-white border border-transparent rounded-lg shadow-sm sm:col-span-3 focus:shadow focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400">
                      <label for="illustration" class="block text-xs font-medium text-gray-700">Illustration</label>
                      <input type="text" name="illustration" id="illustration" required class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 focus:ring-0 sm:text-sm" />
                    </div>

                    <div class="col-span-6 px-3 py-2 mt-1 transition duration-150 bg-white border border-transparent rounded-lg shadow-sm sm:col-span-3 focus:shadow focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400">
                      <label for="tarif" class="block text-xs font-medium text-gray-700">Tarif</label>
                      <input type="text" name="tarif" id="tarif" required class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 focus:ring-0 sm:text-sm" />
                    </div>
                  </div>
                </form>
              </div>

            </div>
            <div class="flex justify-end px-4 py-4 shrink-0">
              <button
                  data-modal-close
                  type="button"
                  class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500"
              >
                Annuler
              </button>
              <button
                  type="submit"
                  class="inline-flex justify-center px-4 py-2 ml-4 text-sm font-medium text-white bg-teal-600 border border-transparent rounded-md shadow-sm hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500"
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
