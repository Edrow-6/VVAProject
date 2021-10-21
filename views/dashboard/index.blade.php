{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('dashboard.layout', ['title' => 'Tableau de Bord', 'page_type' => 'dashboard', 'body_classes' => 'bg-gray-100'])

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
                  <button type="button" class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                    <svg class="mr-2.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                    </svg>
                    <span>Créer</span>
                  </button>
                  <button type="button" class="hidden sm:inline-flex -ml-px relative items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                    <!-- Heroicon name: solid/pencil -->
                    <svg class="mr-2.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
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
                  <button type="button" class="hidden sm:inline-flex -ml-px relative items-center px-4 py-2 rounded-md border-2 border-red-400 bg-white text-sm font-medium text-red-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                    <svg class="mr-2.5 h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <span>Supprimer</span>
                  </button>
                </span>

                <span class="-ml-px relative block sm:shadow-sm lg:hidden">
                  <div>
                    <button type="button" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 sm:rounded-md sm:px-3" id="menu-2-button" aria-expanded="false" aria-haspopup="true">
                      <span class="sr-only sm:hidden">Plus</span>
                      <span class="hidden sm:inline">Plus</span>
                      <svg class="h-5 w-5 text-gray-400 sm:ml-2 sm:-mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                    </button>
                  </div>

                  <!--
                    Dropdown menu, show/hide based on menu state.

                    Entering: "transition ease-out duration-100"
                      From: "transform opacity-0 scale-95"
                      To: "transform opacity-100 scale-100"
                    Leaving: "transition ease-in duration-75"
                      From: "transform opacity-100 scale-100"
                      To: "transform opacity-0 scale-95"
                  -->
                  <div class="origin-top-right absolute right-0 mt-2 w-36 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-2-button" tabindex="-1">
                    <div class="py-1" role="none">
                      <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                      <a href="#" class="text-gray-700 block sm:hidden px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-2-item-0">
                        Archiver
                      </a>
                      <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-2-item-1">
                        Supprimer
                      </a>
                    </div>
                  </div>
                </span>
              </span>
            </div>

            <!-- Right buttons -->
            <nav aria-label="Pagination">
              <span class="relative z-0 inline-flex shadow-sm rounded-md">
                <a href="#" class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                  <span class="sr-only">Next</span>
                  <!-- Heroicon name: solid/chevron-up -->
                  <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                  </svg>
                </a>
                <a href="#" class="-ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                  <span class="sr-only">Previous</span>
                  <!-- Heroicon name: solid/chevron-down -->
                  <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
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
              <table x-data="selectAllData()" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="pl-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      <input @click="toggleCheckboxes()" id="check-all-lodg" name="check-item" type="checkbox" class="focus:ring-sky-500 h-4 w-4 text-sky-600 border-gray-300 rounded">
                    </th>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Nom
                    </th>
                    <th scope="col" class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Nombre place
                    </th>
                    <th scope="col" class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Type
                    </th>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Surface
                    </th>
                    <th scope="col" class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Internet
                    </th>
                    <th scope="col" class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Année
                    </th>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Secteur
                    </th>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Orientation
                    </th>
                    <th scope="col" class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      État
                    </th>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Description
                    </th>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Photo
                    </th>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Tarif Semaine
                    </th>
                    <th scope="col" class="relative px-3 py-3">
                      <span class="sr-only">Afficher</span>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <!-- font-medium text-gray-900 -->
                  @foreach($hebergements as $heb)
                  <tr>
                    <td class="pl-3 py-4 whitespace-nowrap text-sm text-gray-500">
                      <input value="{{ $heb['id'] }}" id="check-lodg" name="check-item" type="checkbox" class="focus:ring-sky-500 h-4 w-4 text-sky-600 border-gray-300 rounded">
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 text-left">
                      {{ $heb['nom'] }}
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
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
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                      @if($heb['etat'] == 'En rénovation')
                      <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-yellow-200 text-yellow-800">{{ $heb['etat'] }}</span>
                      @elseif($heb['etat'] == 'Disponible')
                      <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-green-200 text-green-800">{{ $heb['etat'] }}</span>
                      @elseif($heb['etat'] == 'Réservé')
                      <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-red-200 text-red-800">{{ $heb['etat'] }}</span>
                      @endif
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 text-left">
                      {{ $heb['description'] }}
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                      <img class="h-10 w-10 rounded-md" src="{{ $avatar }}" alt="">
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 text-left">
                      {{ $heb['tarif_semaine'] }} €
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <button data-modal="editModal-{{ $heb['id'] }}" type="button" class="text-teal-600 hover:text-teal-900">Editer</button>
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

    @foreach($hebergements as $heb)
    <div id="editModal-{{ $heb['id'] }}" class="hidden fixed inset-0 overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
      <div class="absolute inset-0 overflow-hidden">
        <!-- Background overlay, show/hide based on slide-over state. -->
        <div class="absolute inset-0" aria-hidden="true"></div>
    
        <div class="fixed inset-y-0 pl-16 max-w-full right-0 flex">
          <div class="w-screen max-w-md">
            <form class="h-full divide-y divide-gray-200 flex flex-col bg-white shadow-xl">
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
                <form>
                  <input type="text">
                  <input type="text">
                  <input type="text">
                  <input type="text">
                  <input type="text">
                  <input type="text">
                  <input type="text">
                  <input type="text">
                  <input type="text">
                  <input type="text">
                  <input type="text">
                  <input type="text">
                </form>
              </div>
              <div class="flex-shrink-0 px-4 py-4 flex justify-end">
                <button data-modal-close type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                  Annuler
                </button>
                <button type="submit" class="ml-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                  Sauvegarder
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach

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
  // Couleurs lignes tableaux
  $("tbody tr:nth-child(odd)").addClass("bg-white");
  $("tbody tr:nth-child(even)").addClass("bg-gray-100");
</script>
@endsection