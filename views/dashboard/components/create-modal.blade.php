<div id="createModal" class="hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    -->
    <div class="inline-block align-bottom bg-white bg-opacity-75 backdrop-filter backdrop-blur-md rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
      <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
        <button data-modal-close type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
          <span class="sr-only">Close</span>
          <!-- Heroicon name: outline/x -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="sm:flex sm:items-start">
        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-teal-100 sm:mx-0 sm:h-10 sm:w-10">
          <i class="far fa-calendar-plus text-teal-600"></i>
        </div>
        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
          <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
            Créer un hébergement
          </h3>
          <div class="mt-2">

                <div class="mt-5 md:mt-0 md:col-span-2">
                  <form id="create" action="#" method="POST">
                    <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                        <label for="nom" class="block text-xs font-medium text-gray-700">Nom</label>
                        <input type="text" name="nom" id="nom" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                      </div>

                      <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                        <label for="type" class="block text-xs font-medium text-gray-700">Type</label>
                        <select name="type" id="type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-400 focus:border-teal-400 sm:text-sm rounded-md">
                          @foreach($types_heb as $type)
                            <option value="{{ $type['id'] }}">{{ $type['nom'] }}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                        <label for="nombre-place" class="block text-xs font-medium text-gray-700">Nombre place</label>
                        <input type="text" name="nombre-place" id="nombre-place" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                      </div>

                      <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                        <label for="surface" class="block text-xs font-medium text-gray-700">Surface</label>
                        <input type="text" name="surface" id="surface" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                      </div>

                      <div class="col-span-6 sm:col-span-3 flex items-center justify-between">
                      <span class="flex-grow flex flex-col">
    <span class="text-sm font-medium text-gray-900" id="availability-label">Internet</span>
  </span>
                      <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
                      <button type="button" class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" role="switch" aria-checked="false">
                        <span class="sr-only">Use setting</span>
                        <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                        <span class="translate-x-0 pointer-events-none relative inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200">
                        <!-- Enabled: "opacity-0 ease-out duration-100", Not Enabled: "opacity-100 ease-in duration-200" -->
                        <span class="opacity-100 ease-in duration-200 absolute inset-0 h-full w-full flex items-center justify-center transition-opacity" aria-hidden="true">
                          <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                            <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                        </span>
                          <!-- Enabled: "opacity-100 ease-in duration-200", Not Enabled: "opacity-0 ease-out duration-100" -->
                      <span class="opacity-0 ease-out duration-100 absolute inset-0 h-full w-full flex items-center justify-center transition-opacity" aria-hidden="true">
                        <svg class="h-3 w-3 text-indigo-600" fill="currentColor" viewBox="0 0 12 12">
                          <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
                        </svg>
                      </span>
                    </span>
                      </button>
                      </div>

                      <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                        <label for="annee" class="block text-xs font-medium text-gray-700">Année</label>
                        <input type="text" name="annee" id="annee" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                      </div>

                      <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                        <label for="secteur" class="block text-xs font-medium text-gray-700">Secteur</label>
                        <input type="text" name="secteur" id="secteur" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                      </div>

                      <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                        <label for="type" class="block text-xs font-medium text-gray-700">Type</label>
                        <select name="type" id="type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-400 focus:border-teal-400 sm:text-sm rounded-md">
                          <option value="nord">Nord</option>
                          <option value="sud">Sud</option>
                          <option value="est">Est</option>
                          <option value="ouest">Ouest</option>
                        </select>
                      </div>

                      <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                        <label for="etat" class="block text-xs font-medium text-gray-700">État</label>
                        <input type="text" name="etat" id="etat" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                      </div>

                      <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                        <label for="description" class="block text-xs font-medium text-gray-700">Description</label>
                        <input type="text" name="description" id="description" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                      </div>

                      <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                        <label for="illustration" class="block text-xs font-medium text-gray-700">Illustration</label>
                        <input type="text" name="illustration" id="illustration" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                      </div>

                      <div class="col-span-6 sm:col-span-3 bg-white focus:shadow border border-transparent rounded-lg px-3 py-2 shadow-sm transition duration-150 focus-within:ring-1 focus-within:ring-teal-400 focus-within:border-teal-400 mt-1">
                        <label for="tarif" class="block text-xs font-medium text-gray-700">Tarif</label>
                        <input type="text" name="tarif" id="tarif" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                      </div>
                    </div>
                  </form>
                </div>

          </div>
        </div>
      </div>
      <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
        <div class="sm:ml-3 relative group transform hover:scale-105 duration-150 rounded-md">
          <div class="absolute -inset-0 bg-gradient-to-r from-teal-400 to-teal-500 hover:from-teal-500 hover:to-teal-600 rounded-lg filter blur opacity-50 group-hover:opacity-75 transition duration-150 group-hover:duration-150"></div>
          <button
              type="submit"
              form="create"
              name="save-account"
              class="relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-gradient-to-br from-teal-400 to-teal-500 rounded-md shadow-sm hover:from-teal-500 hover:to-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500"
          >
            Créer
          </button>
        </div>
        <button data-modal-close type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 sm:mt-0 sm:w-auto sm:text-sm">
          Annuler
        </button>
      </div>
    </div>
  </div>
</div>