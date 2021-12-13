{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('home.layout', ['title' => 'Hébergements', 'page_type' => 'lodging', 'body_classes' => 'bg-gray-100'])

@section('content')
  <div class="min-h-screen">
    <main>
      <div class="relative pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
        <div class="relative max-w-7xl mx-auto">
          <div class="text-center">
            <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
              Nos Hébergements
            </h2>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
              Venez vivre une expérience unique dans un de nos nombreux logements !
            </p>
          </div>
          <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
            @foreach($hebergements as $heb)
            <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
              <div class="flex-shrink-0">
                <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80" alt="">
              </div>
              <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                <div class="flex-1">
                  <p class="text-sm font-medium text-sky-600">
                    <a href="#" class="hover:underline">
                      @foreach($types_heb as $type) @if($heb['id_type'] == $type['id'])
                        {{ $type['nom'] }}
                      @endif @endforeach
                        @if($heb['etat'] == 'En rénovation')
                          <span class="ml-3 inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-yellow-200 text-yellow-800">{{ $heb['etat'] }}</span>
                        @elseif($heb['etat'] == 'Disponible')
                          <span class="ml-3 inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-green-200 text-green-800">{{ $heb['etat'] }}</span>
                        @elseif($heb['etat'] == 'Réservé')
                          <span class="ml-3  inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-red-200 text-red-800">{{ $heb['etat'] }}</span>
                        @endif
                    </a>
                  </p>
                  <a href="#" class="block mt-2">
                    <p class="text-xl font-semibold text-gray-900">
                      {{ $heb['nom'] }}
                    </p>
                    <p class="mt-3 text-base text-gray-500">
                      {{ $heb['description'] }}
                    </p>
                  </a>
                </div>
                <div class="mt-6 flex items-center">
                  <div class="flex-shrink-0">
                    <a href="#">
                      <span class="sr-only">Places</span>
                      <i class="fal fa-users fa-lg"></i>
                    </a>
                  </div>
                  <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">
                      <a href="#" class="hover:underline">
                        {{ $heb['nb_place'] }} places
                      </a>
                    </p>
                  </div>

                  <div class="flex-shrink-0 ml-7">
                    <a href="#">
                      <span class="sr-only">Tarif</span>
                      <i class="fal fa-money-bill-wave-alt fa-lg"></i>
                    </a>
                  </div>
                  <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">
                      <a href="#" class="hover:underline">
                        {{ $heb['tarif_semaine'] }} € / pers.
                      </a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          </div>
        </div>
      </div>

      <!-- More main page content here... -->
    </main>
  </div>
@endsection

