{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('dashboard.layout', ['title' => 'Hébergements | T2B', 'page_type' => 'lodgings', 'body_classes' => 'bg-gray-100'])

@section('content')
<section aria-labelledby="message-heading" class="min-w-0 flex-1 h-full flex flex-col overflow-hidden xl:order-last">
    <!-- Top section -->
    <div class="flex-shrink-0 bg-white border-b border-gray-200">
      <!-- Toolbar-->
      <div class="h-16 flex flex-col justify-center">
        <div class="px-4 sm:px-6 lg:px-8">
          <div class="py-3 flex justify-between">
            <!-- Left buttons -->
            <div>
              <span class="relative z-0 inline-flex shadow-sm rounded-md sm:shadow-none sm:space-x-3">
                <span class="inline-flex sm:shadow-sm">
                  <button type="button" id="edit-selected" class="hidden sm:inline-flex -ml-px relative items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                      <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only ml-2.5">Modifier</span>
                  </button>
                  <button type="submit" id="archive-selected" name="archive-selected" class="hidden sm:inline-flex -ml-px relative items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                      <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only ml-2.5">Archiver</span>
                  </button>
                </span>

                <span class="hidden lg:flex space-x-3">
                  <button type="submit" id="delete-selected" name="delete-selected" class="button-red-outline group px-4 py-2 inline-flex items-center">
                    <svg class="mr-2.5 h-5 w-5 text-red-500 group-hover:text-white group-focus:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <span>Supprimer</span>
                  </button>
                </span>

              </span>
            </div>

            <!-- Right buttons -->
            <nav aria-label="Pagination">
              <span class="relative z-0 inline-flex shadow-sm rounded-md">
                <a href="#" class="relative inline-flex items-center px-4 py-2 rounded-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                  <span class="sr-only">Sauvegarder</span>
                  Sauvegarder les modifications
                </a>
              </span>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="min-h-0 flex-1 overflow-y-auto">
      <!-- Thread section-->
      <div class="py-4 flex flex-col sm:px-6 lg:px-8">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-3 lg:px-4">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table x-data="selectAllData()" class="min-w-full bg-white divide-y-2 divide-gray-300 table-auto">
                <thead class="bg-gray-200 font-semibold text-xs">
                  <tr>
                    <th scope="col" class="px-3 py-3 text-center text-gray-500 uppercase tracking-wider">
                      ○
                    </th>
                    <th scope="col" class="px-3 py-3 text-left text-gray-500 uppercase tracking-wider">
                      Nom
                    </th>
                    <th scope="col" class="px-0 py-3 text-center text-gray-500 uppercase tracking-wider">
                      Places
                    </th>
                    <th scope="col" class="px-3 py-3 text-center text-gray-500 uppercase tracking-wider">
                      Type
                    </th>
                    <th scope="col" class="px-3 py-3 text-left text-gray-500 uppercase tracking-wider">
                      Surface
                    </th>
                    <th scope="col" class="px-3 py-3 text-center text-gray-500 uppercase tracking-wider">
                      Internet
                    </th>
                    <th scope="col" class="px-3 py-3 text-center text-gray-500 uppercase tracking-wider">
                      Année
                    </th>
                    <th scope="col" class="px-3 py-3 text-left text-gray-500 uppercase tracking-wider">
                      Secteur
                    </th>
                    <th scope="col" class="px-3 py-3 text-left text-gray-500 uppercase tracking-wider">
                      Orientation
                    </th>
                    <th scope="col" class="px-0 py-3 text-center text-gray-500 uppercase tracking-wider">
                      État
                    </th>
                    <th scope="col" class="px-0 py-3 text-center text-gray-500 uppercase tracking-wider">
                      Description
                    </th>
                    <th scope="col" class="px-3 py-3 text-center text-gray-500 uppercase tracking-wider">
                      Image
                    </th>
                    <th scope="col" class="px-3 py-3 text-left text-gray-500 uppercase tracking-wider">
                      Tarif Semaine
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <!-- font-medium text-gray-900 -->
                  @foreach($hebergements as $heb)
                  <tr>
                    <td class="px-0 py-2 whitespace-nowrap text-gray-500 text-center">
                      <div x-data="{ actionMenu: false }" @mouseover="actionMenu = true" @mouseover.away="actionMenu = false" class="px-2 relative flex items-center">
                        <div>
                          <button type="button" @click="actionMenu = !actionMenu" class="transition duration-75 bg-transparent rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Actions</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                          </button>
                        </div>

                        <div x-show="actionMenu"
                             @click.away="actionMenu = false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="z-20 flex space-x-2 absolute left-9 rounded-full shadow-lg px-2 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                             role="menu"
                             aria-orientation="horizontal"
                             aria-labelledby="action-menu-button"
                             tabindex="-1"
                             x-cloak
                        >
                          <button  data-modal="editModal-{{ $heb['id'] }}" type="button" id="edit" class="block py-2 px-1 text-gray-500 hover:text-gray-600 transition duration-100" role="menuitem" tabindex="-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                              <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                            </svg>
                          </button>
                          <button data-modal="archiveModal-{{ $heb['id'] }}" type="button" id="archive" class="block py-2 px-1 text-gray-500 hover:text-yellow-600 transition duration-100" role="menuitem" tabindex="-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                              <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                          </button>
                          <button data-modal="deleteModal-{{ $heb['id'] }}" type="button" id="delete" class="block py-2 px-1 text-gray-500 hover:text-red-600 transition duration-100" role="menuitem" tabindex="-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </div>
                      </div>
                    </td>
                    <td id="editable" class="px-3 py-2 whitespace-nowrap text-sm text-gray-500 text-left">
                      <span id="editable-{{ $heb['id'] }}">{{ $heb['nom'] }}</span>
                    </td>
                    <td id="editable" class="px-0 py-2 whitespace-nowrap text-sm text-gray-500 text-center">
                      <span id="editable-{{ $heb['id'] }}">{{ $heb['nb_place'] }}</span>
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-500 text-center">
                      @foreach($types_heb as $type) @if($heb['id_type'] == $type['id'])
                        {{ $type['nom'] }}
                      @endif @endforeach
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-500 text-left">
                      <span id="editable-{{ $heb['id'] }}">{{ $heb['surface'] }}</span> m²
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-500 text-center">
                      <div class="flex justify-center items-center">
                        @if($heb['internet'] == 'oui')
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                          </svg>
                        @else
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                          </svg>
                        @endif
                      </div>
                    </td>
                    <td id="editable" class="px-3 py-2 whitespace-nowrap text-sm text-gray-500 text-center">
                      <span id="editable-{{ $heb['id'] }}">{{ $heb['annee'] }}</span>
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-500 text-center">
                      {{ $heb['secteur'] }}
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-500 text-center">
                      {{ $heb['orientation'] }}
                    </td>
                    <td class="px-0 py-2 whitespace-nowrap text-sm text-gray-500 text-center">
                      @if($heb['etat'] == 'En rénovation')
                      <span class="inline-flex items-center px-1.5 py-0.5 rounded text-sm font-medium bg-yellow-200 text-yellow-800">{{ $heb['etat'] }}</span>
                      @elseif($heb['etat'] == 'Disponible')
                      <span class="inline-flex items-center px-1.5 py-0.5 rounded text-sm font-medium bg-green-200 text-green-800">{{ $heb['etat'] }}</span>
                      @elseif($heb['etat'] == 'Réservé')
                      <span class="inline-flex items-center px-1.5 py-0.5 rounded text-sm font-medium bg-red-200 text-red-800">{{ $heb['etat'] }}</span>
                      @endif
                    </td>
                    <td class="px-0 py-2 whitespace-nowrap text-sm text-gray-500 text-left relative" x-data="{ open: false }">
                      <div class="flex justify-center items-center text-center cursor-pointer py-2" @mouseover="open = true" @mouseover.away="open = false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -mr-1 text-blue-300" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                        </svg>
                      </div>
                      <div
                              x-show="open"
                              class="z-20 origin-left right-16 bottom-0 absolute w-56 rounded-md shadow-lg py-1 bg-blue-100 border-2 border-blue-300"
                              x-transition:enter="transition-transform transition-opacity ease-out duration-300"
                              x-transition:enter-start="opacity-0 transform -translate-x-2"
                              x-transition:enter-end="opacity-100 transform translate-x-0"
                              x-transition:leave="transition ease-in duration-100"
                              x-transition:leave-end="opacity-0 transform -translate-x-3"
                              x-cloak
                      >
                        <p class="px-1.5 py-0.5 font-semibold text-blue-500 select-none whitespace-normal">
                          {{ $heb['description'] }}
                        </p>
                      </div>
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-500 text-center">
                      <img class="h-10 w-10 rounded-md" src="{{ $lodging_picture }}" alt="">
                    </td>
                    <td id="editable" class="px-3 py-2 whitespace-nowrap text-sm text-gray-500 text-left">
                      <span id="editable-{{ $heb['id'] }}">{{ $heb['tarif_semaine'] }}</span> €
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('dashboard.components.edit-modal')
    @include('dashboard.components.archive-modal')
    @include('dashboard.components.delete-modal')
  </section>
@endsection

@section('script')
<script>
  // Boutons de sélection
  function selectAllData() {
    return {
      selectall: false,

      toggleCheckboxes() {
        this.selectall = !this.selectall;

          const checkboxes = document.querySelectorAll('[id^=check-lodg]');
          [...checkboxes].map((el) =>{
          el.checked = this.selectall;
        })
      }
    }
  }
  tippy("#edit", {
    content: "Modifier",
    placement: "top",
    theme: "translucent",
  });
  tippy("#archive", {
    content: "Archiver",
    placement: "top",
    theme: "translucent",
  });
  tippy("#delete", {
    content: "Supprimer",
    placement: "top",
    theme: "translucent",
  });
</script>
@endsection