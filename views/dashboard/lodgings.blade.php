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
                  <button data-modal="createModal" type="button" class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                    <i class="far fa-calendar-plus mr-2.5 text-gray-400"></i>
                    <span>Créer</span>
                  </button>
                  <button type="button" class="hidden sm:inline-flex -ml-px relative items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                    <i class="far fa-edit mr-2.5 text-gray-400"></i>
                    <span>Editer</span>
                  </button>
                  <button type="button" class="hidden sm:inline-flex -ml-px relative items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                    <svg class="mr-2.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                      <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                    <span>Archiver</span>
                  </button>
                </span>

                <span class="hidden lg:flex space-x-3">
                  <button type="submit" name="delete-selected" class="button-delete group px-4 py-2 inline-flex items-center">
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
                <a href="#" class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                  <span class="sr-only">Liste</span>
                  <i class="fas fa-th-list"></i>
                </a>
                <a href="#" class="-ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                  <span class="sr-only">Carte</span>
                  <i class="fas fa-table py-1"></i>
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
              <table x-data="selectAllData()" class="min-w-full divide-y-2 divide-gray-300 table-auto">
                <thead class="bg-gray-200 font-semibold text-xs">
                  <tr>
                    <th scope="col" class="px-3 py-3 text-center text-gray-500 uppercase tracking-wider">
                      ○
                    </th>
                    <th scope="col" class="pr-2 border-r border-gray-300 py-3 text-center text-xs text-gray-500 uppercase tracking-wider">
                      <input @click="toggleCheckboxes()" id="check-all-lodg" name="check-item" type="checkbox" class="focus:ring-sky-500 h-4 w-4 text-sky-600 border-gray-300 rounded">
                    </th>
                    <th scope="col" class="px-3 py-3 text-left text-gray-500 uppercase tracking-wider">
                      Nom
                    </th>
                    <th scope="col" class="px-0 py-3 text-center text-gray-500 uppercase tracking-wider">
                      Nombre place
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
                    <td class="px-0 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                      <button data-modal="editModal-{{ $heb['id'] }}" type="button" class="text-gray-500 hover:text-gray-600 w-5"><i class="far fa-ellipsis-v fa-lg"></i></button>
                      <div x-data="{ userMenu: false }" class="ml-4 relative flex-shrink-0">
                        <div>
                          <button type="button" @click="userMenu = !userMenu" class="transition duration-75 bg-transparent rounded-md flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Ouvrir le menu utilisateur</span>
                            <img class="h-8 w-8 rounded-full" src="@asset('avatar')" alt="">
                            <i :class="{ 'rotate-180': userMenu, 'rotate-0': !userMenu }" class="fal fa-angle-down fa-lg text-gray-400 mx-2 transform transition-transform duration-200 group-hover:text-gray-500"></i>
                          </button>
                        </div>

                        <div x-show="userMenu"
                             @click.away="userMenu = false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="z-20 origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                             role="menu"
                             aria-orientation="vertical"
                             aria-labelledby="user-menu-button"
                             tabindex="-1"
                             x-cloak
                        >
                          <!-- Active: "bg-gray-100", Not Active: "" -->
                          <a href="/my-bookings" class="block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Mes réservations</a>
                          <a href="/settings/account" class="block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Paramètres</a>
                          <a href="/auth/logout" class="block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Déconnexion</a>
                        </div>
                      </div>
                    </td>
                    <td class="pr-2 border-r py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                      <input value="{{ $heb['id'] }}" id="check-lodg" name="check-item" type="checkbox" class="focus:ring-sky-500 h-4 w-4 text-sky-600 border-gray-300 rounded">
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 text-left">
                      {{ $heb['nom'] }}
                    </td>
                    <td class="px-0 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                      {{ $heb['nb_place'] }}
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                      @foreach($types_heb as $type) @if($heb['id_type'] == $type['id'])
                        {{ $type['nom'] }}
                      @endif @endforeach
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 text-left">
                      {{ $heb['surface'] }} m²
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                      @if($heb['internet'] == 'oui')
                        <i class="fad fa-check-circle fa-lg text-emerald-500"></i>
                      @else
                        <i class="fad fa-times-circle fa-lg text-red-500"></i>
                      @endif
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                      {{ $heb['annee'] }}
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                      {{ $heb['secteur'] }}
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                      {{ $heb['orientation'] }}
                    </td>
                    <td class="px-0 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                      @if($heb['etat'] == 'En rénovation')
                      <span class="inline-flex items-center px-1.5 py-0.5 rounded text-sm font-medium bg-yellow-200 text-yellow-800">{{ $heb['etat'] }}</span>
                      @elseif($heb['etat'] == 'Disponible')
                      <span class="inline-flex items-center px-1.5 py-0.5 rounded text-sm font-medium bg-green-200 text-green-800">{{ $heb['etat'] }}</span>
                      @elseif($heb['etat'] == 'Réservé')
                      <span class="inline-flex items-center px-1.5 py-0.5 rounded text-sm font-medium bg-red-200 text-red-800">{{ $heb['etat'] }}</span>
                      @endif
                    </td>
                    <td class="px-0 py-4 whitespace-nowrap text-sm text-gray-500 text-left relative" x-data="{ open: false }">
                      <div class="block text-center cursor-pointer py-2" @mouseover="open = true" @mouseover.away="open = false">
                        <i class="mr-1 text-blue-300 align-text-top fas fa-angle-left"></i><i class="text-xl text-blue-400 fas fa-eye"></i>
                      </div>
                      <div
                              x-show="open"
                              class="z-20 origin-left right-16 bottom-0 absolute w-48 rounded-md shadow-lg py-1 bg-blue-100 border-2 border-blue-300"
                              x-transition:enter="transition-transform transition-opacity ease-out duration-300"
                              x-transition:enter-start="opacity-0 transform -translate-x-2"
                              x-transition:enter-end="opacity-100 transform translate-x-0"
                              x-transition:leave="transition ease-in duration-100"
                              x-transition:leave-end="opacity-0 transform -translate-x-3"
                      >
                        <p class="px-2 py-1 font-semibold text-blue-500 select-none whitespace-normal">
                          {{ $heb['description'] }}
                        </p>
                      </div>
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                      <img class="h-10 w-10 rounded-md" src="{{ $lodging_picture }}" alt="">
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 text-left">
                      {{ $heb['tarif_semaine'] }} €
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
    @include('dashboard.components.create-modal')

  </section>
@endsection

@section('script')
<script>
  function selectAllData() {
    return {
      selectall: false,

      toggleCheckboxes() {
        this.selectall = !this.selectall;

        checkboxes = document.querySelectorAll('[id^=check-lodg]');
        [...checkboxes].map((el) =>{
          el.checked = this.selectall;
        })
      }
    }
  }
</script>
@endsection