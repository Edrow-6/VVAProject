{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('dashboard.layout', ['title' => 'Hébergements | T2B', 'page_type' => 'lodgings', 'body_classes' => 'bg-gray-100'])

@section('content')
  <section aria-labelledby="message-heading" class="flex flex-col flex-1 h-full min-w-0 overflow-hidden xl:order-last">
    <div class="flex-1 min-h-0 overflow-y-auto">
      <!-- Thread section-->
      <div class="flex flex-col py-4 sm:px-6 lg:px-8">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle sm:px-3 lg:px-4">
            <table id="lodgings-table" class="min-w-full bg-white border-b border-gray-200 divide-y-2 divide-gray-300 shadow table-auto">
              <thead class="text-xs font-semibold bg-gray-200">
                <tr>
                  <th scope="col" class="px-3 py-3 tracking-wider text-center text-gray-500 uppercase">
                    ○
                  </th>
                  <th scope="col" class="px-3 py-3 tracking-wider text-left text-gray-500 uppercase">
                    Nom
                  </th>
                  <th scope="col" class="px-0 py-3 tracking-wider text-center text-gray-500 uppercase">
                    Places
                  </th>
                  <th scope="col" class="px-3 py-3 tracking-wider text-center text-gray-500 uppercase">
                    Type
                  </th>
                  <th scope="col" class="px-3 py-3 tracking-wider text-left text-gray-500 uppercase">
                    Surface
                  </th>
                  <th scope="col" class="px-3 py-3 tracking-wider text-center text-gray-500 uppercase">
                    Internet
                  </th>
                  <th scope="col" class="px-3 py-3 tracking-wider text-center text-gray-500 uppercase">
                    Année
                  </th>
                  <th scope="col" class="px-3 py-3 tracking-wider text-left text-gray-500 uppercase">
                    Secteur
                  </th>
                  <th scope="col" class="px-3 py-3 tracking-wider text-left text-gray-500 uppercase">
                    Orientation
                  </th>
                  <th scope="col" class="px-0 py-3 tracking-wider text-center text-gray-500 uppercase">
                    État
                  </th>
                  <th scope="col" class="px-0 py-3 tracking-wider text-center text-gray-500 uppercase">
                    Description
                  </th>
                  <th scope="col" class="px-3 py-3 tracking-wider text-center text-gray-500 uppercase">
                    Image
                  </th>
                  <th scope="col" class="px-3 py-3 tracking-wider text-left text-gray-500 uppercase">
                    Tarif Semaine
                  </th>
                </tr>
              </thead>
              <tbody>
                <!-- font-medium text-gray-900 -->
                @foreach ($hebergements as $heb)
                  <tr class="odd:bg-white even:bg-blue-50">
                    <td class="px-0 py-2 text-center text-gray-500 whitespace-nowrap">
                      <div class="relative flex items-center px-2">
                        <div>
                          <button type="button" data-dropdown="action-menu" class="flex items-center text-sm transition duration-75 bg-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Actions</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-gray-400 fill-gray-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                          </button>
                        </div>

                        <div id="action-menu" class="absolute z-20 flex px-2 space-x-2 scale-95 bg-white rounded-full shadow-lg opacity-0 left-9 ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="horizontal" aria-labelledby="action-menu" tabindex="-1" cloak>
                          <button data-modal="edit-{{ $heb['id'] }}" type="button" id="edit" class="block px-1 py-2 text-gray-500 transition duration-100 hover:text-gray-600" role="menuitem" tabindex="-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                              <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                            </svg>
                          </button>
                          <button data-modal="archive-{{ $heb['id'] }}" type="button" id="archive" class="block px-1 py-2 text-gray-500 transition duration-100 hover:text-yellow-600" role="menuitem" tabindex="-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                              <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                          </button>
                          <button data-modal="delete-{{ $heb['id'] }}" type="button" id="delete" class="block px-1 py-2 text-gray-500 transition duration-100 hover:text-red-600" role="menuitem" tabindex="-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </div>
                      </div>
                    </td>
                    <td id="editable" class="px-3 py-2 text-sm text-left text-gray-500 whitespace-nowrap">
                      <span id="editable-{{ $heb['id'] }}">{{ $heb['nom'] }}</span>
                    </td>
                    <td id="editable" class="px-0 py-2 text-sm text-center text-gray-500 whitespace-nowrap">
                      <span id="editable-{{ $heb['id'] }}">{{ $heb['nb_place'] }}</span>
                    </td>
                    <td class="px-3 py-2 text-sm text-center text-gray-500 whitespace-nowrap">
                      @foreach ($types_heb as $type)
                        @if ($heb['id_type'] == $type['id'])
                          {{ $type['nom'] }}
                        @endif
                      @endforeach
                    </td>
                    <td class="px-3 py-2 text-sm text-left text-gray-500 whitespace-nowrap">
                      <span id="editable-{{ $heb['id'] }}">{{ $heb['surface'] }}</span> m²
                    </td>
                    <td class="px-3 py-2 text-sm text-center text-gray-500 whitespace-nowrap">
                      <div class="flex items-center justify-center">
                        @if ($heb['internet'] == 'oui')
                          <span class="sr-only">Oui</span>
                          <svg xmlns="http://www.w3.org/2000/svg" id="internet-on" class="w-6 h-6 stroke-emerald-500 fill-emerald-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                        @elseif ($heb['internet'] == 'non')
                        <span class="sr-only">Non</span>
                          <svg xmlns="http://www.w3.org/2000/svg" id="internet-off" class="w-6 h-6 stroke-red-500 fill-red-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                        @endif
                      </div>
                    </td>
                    <td id="editable" class="px-3 py-2 text-sm text-center text-gray-500 whitespace-nowrap">
                      <span id="editable-{{ $heb['id'] }}">{{ $heb['annee'] }}</span>
                    </td>
                    <td class="px-3 py-2 text-sm text-center text-gray-500 whitespace-nowrap">
                      {{ $heb['secteur'] }}
                    </td>
                    <td class="px-3 py-2 text-sm text-center text-gray-500 whitespace-nowrap">
                      {{ $heb['orientation'] }}
                    </td>
                    <td class="px-0 py-2 text-sm text-center text-gray-500 whitespace-nowrap">
                      @if ($heb['etat'] == 'En rénovation')
                        <span class="inline-flex items-center px-1.5 py-0.5 rounded text-sm font-medium bg-yellow-200 text-yellow-800">{{ $heb['etat'] }}</span>
                      @elseif($heb['etat'] == 'Disponible')
                        <span class="inline-flex items-center px-1.5 py-0.5 rounded text-sm font-medium bg-green-200 text-green-800">{{ $heb['etat'] }}</span>
                      @elseif($heb['etat'] == 'Réservé')
                        <span class="inline-flex items-center px-1.5 py-0.5 rounded text-sm font-medium bg-red-200 text-red-800">{{ $heb['etat'] }}</span>
                      @endif
                    </td>
                    <td class="relative px-0 py-2 text-sm text-left text-gray-500 whitespace-nowrap">
                      <div data-dropdown="comment-popup" class="flex items-center justify-center py-2 text-center cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 -mr-1 text-blue-300" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                        </svg>
                      </div>
                      <div id="comment-popup" class="absolute bottom-0 z-20 w-56 py-1 origin-left transform -translate-x-2 bg-blue-100 border-2 border-blue-300 rounded-md shadow-lg opacity-0 right-16" cloak>
                        <p class="px-1.5 py-0.5 font-semibold text-blue-500 select-none whitespace-normal">
                          {{ $heb['description'] }}
                        </p>
                      </div>
                    </td>
                    <td class="px-3 py-2 text-sm text-center text-gray-500 whitespace-nowrap">
                      <img class="w-10 h-10 rounded-md" src="{{ $lodging_picture }}" alt="">
                    </td>
                    <td id="editable" class="px-3 py-2 text-sm text-left text-gray-500 whitespace-nowrap">
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

    @include('dashboard.components.edit-modal')
    @include('dashboard.components.archive-modal')
    @include('dashboard.components.delete-modal')
  </section>
@endsection

@section('script')
  <script>
    const lodgingTable = new simpleDatatables.DataTable('#lodgings-table', {
      columns: [
        { select: [0,10,11], sortable: false },
        { select: 1 },
        { select: 2 },
        { select: 3 },
        { select: 4 },
        { select: 5 },
        { select: 6 },
        { select: 7 },
        { select: 8 },
        { select: 9 },
        { select: 12 }
      ],
      labels: {
        placeholder: 'Rechercher...',
        perPage: '{select}',
        noRows: 'Aucun hébergement trouvé',
        noResults: 'Aucun résultat ne correspond à votre recherche',
        info: 'Affichage de {start} à {end} sur {rows} hébergements'
      },
      perPageSelect: [10,20,30,40,50],
      prevText: '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>',
      nextText: '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>'
    });
    tippy("#edit", {
      content: "Modifier",
      placement: "top"
    });
    tippy("#archive", {
      content: "Archiver",
      placement: "top"
    });
    tippy("#delete", {
      content: "Supprimer",
      placement: "top"
    });
    tippy("#internet-on", {
      content: "Oui",
      placement: "left"
    });
    tippy("#internet-off", {
      content: "Non",
      placement: "left"
    });
    tippy('.dataTable-dropdown', {
      content: 'hébergements par page',
      placement: 'right'
    });
  </script>
@endsection
