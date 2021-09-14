<table class="w-full table-auto min-w-max" id="liste_visites">
    <?php
//var_dump($result);
?>
    <thead>
        <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-300">
            <th class="py-3 pl-2 pr-4 text-center select-none">Id.</th>
            <th class="px-6 py-3 text-left select-none">
                <button id="ordre_0" onclick="number = 1"><span class="mr-1 font-bold text-gray-600 uppercase">Nom Prénom</span><i class="fas fa-sort"></i></button>
            </th>
            <th class="px-6 py-3 text-left select-none">
                <button id="ordre_1" onclick="number = 2"><span class="mr-1 font-bold text-gray-600 uppercase">Société</span><i class="fas fa-sort"></i></button>
            </th>
            <th class="px-4 py-3 text-center select-none">
                <button id="ordre_2" onclick="number = 3"><span class="mr-1 font-bold text-gray-600 uppercase">Motif</span><i class="fas fa-sort"></i></button>
            </th>
            <th class="px-6 py-3 text-left select-none">Lieu Rendez-vous</th>
            <th class="px-3 py-3 text-left select-none">Comm.</th>
            <th class="py-3 pl-6 pr-2 text-left select-none">
                <button id="ordre_3" onclick="number = 6"><span class="mr-1 font-bold text-gray-600 uppercase">Date d'arrivée</span><i class="fas fa-sort"></i></button>
            </th>
            <th class="py-3 pl-2 pr-6 text-left select-none">
                <button id="ordre_4" onclick="number = 7"><span class="mr-1 font-bold text-gray-600 uppercase">Date de départ</span><i class="fas fa-sort"></i></button>
            </th>
            <th class="px-3 py-3 text-center border-l border-gray-400 select-none">Statut</th>
            <th class="px-6 py-3 text-left select-none">Actions</th>
        </tr>
    </thead>

    <tbody class="text-sm font-light text-gray-600">
        @foreach($visites as $visite) {{-- {{$visite['nom']}} --}}
        <?php
        $date_arrivee_format = date("d/m/y", strtotime($visite['date_arrivee']));
        $heure_arrivee_format = date("H:i", strtotime($visite['heure_arrivee']));
        $date_depart_format = date("d/m/y", strtotime($visite['date_depart']));
        $heure_depart_format = date("H:i", strtotime($visite['heure_depart']));
        ?>
        <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-2 pl-2 pr-4 text-left">
                <div class="flex items-center">
                    @if($visite['type_id'] == null)
                        <div class="items-center font-bold text-gray-800 duration-150 transform cursor-pointer hover:scale-110" @click="showIdModal()">
                            <i class="text-2xl text-purple-500 fas fa-fingerprint animate-pulse"></i><i class="ml-1 text-purple-400 align-text-top fas fa-angle-down"></i>
                        </div>
                    @else
                        <div class="items-center font-bold text-gray-800 duration-150 transform cursor-pointer hover:scale-110" @click="showValidIdModal()">
                            <i class="text-2xl text-green-500 fas fa-fingerprint"></i><i class="ml-1 text-green-400 align-text-top fas fa-angle-down"></i>
                        </div>
                    @endif
                </div>
            </td>
            <td class="px-6 py-3 text-left">
                <div class="flex items-center">
                    <span class="font-normal capitalize">{{ $visite['nom']." ".$visite['prenom'] }}</span>
                </div>
            </td>
            <td class="px-6 py-3 text-left whitespace-nowrap">
                <div class="flex items-center">
                    @if($visite['societe'] == "")
                    <div class="text-gray-300 cursor-not-allowed select-none">
                        <i class="mr-1 fas fa-building"></i>
                        <span class="font-medium">Aucune</span>
                    </div>
                    @else
                    <a href="https://www.societe.com/cgi-bin/search?champs={{ $visite['societe'] }}" target="_blank">
                        <i class="mr-1 text-gray-500 fas fa-building"></i>
                        <span class="font-medium">{{ $visite['societe'] }}</span>
                    </a>
                    @endif
                </div>
            </td>
            <td class="px-4 py-3 text-center">
                @foreach($motifs as $motif) @if($visite['motif'] == $motif['nom'])
                <span class="px-3 py-1 text-xs font-normal select-none text-{{ $motif['couleur'] }}-600 bg-{{ $motif['couleur'] }}-200 rounded-full">{{ $visite['motif'] }}</span>
                @endif @endforeach
            </td>
            <td class="px-6 py-3 text-center whitespace-nowrap">
                <div class="flex items-center overflow-x-auto w-30">
                    <div class="mr-1.5">
                        <i class="text-gray-500 fas fa-map-pin"></i>
                    </div>
                    <span class="font-medium">{{ $visite['lieu_rdv'] }}</span>
                </div>
            </td>
            <td class="px-3 py-3 text-center whitespace-nowrap" x-data="{ open: false }">
                @if($visite['commentaires'] == "")
                <div id="no_comments" class="flex items-center ml-2 cursor-not-allowed">
                    <i class="text-xl text-blue-200 fas fa-comment-slash"></i>
                </div>
                @elseif($visite['commentaires'] == "666" || $visite['commentaires'] == "enfer" || $visite['commentaires'] == "bug" || $visite['commentaires'] == "aucun")
                <div class="flex items-center ml-2 cursor-wait" @mouseover="open = true" @mouseover.away="open = false">
                    <i class="text-xl text-red-500 fas fa-bug"></i><i class="ml-1 text-red-300 align-text-top fas fa-angle-right"></i>
                </div>
                <div
                    x-show="open"
                    class="absolute px-1 py-1 ml-12 bg-red-100 border-2 border-red-300 shadow rounded-xl"
                    style="margin-top: -1.85rem"
                    x-transition:enter="transition-transform transition-opacity ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform -translate-x-2"
                    x-transition:enter-end="opacity-100 transform translate-x-0"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-end="opacity-0 transform -translate-x-3"
                >
                    <div class="px-2 py-1 font-semibold text-red-500 select-none">
                        <i class="text-red-300 fas fa-hashtag"></i>
                        {{ $visite['commentaires'] }}
                    </div>
                </div>
                @else
                <div class="flex items-center ml-2 cursor-pointer" @mouseover="open = true" @mouseover.away="open = false">
                    <i class="text-xl text-blue-400 fas fa-comment"></i><i class="ml-1 text-blue-300 align-text-top fas fa-angle-right"></i>
                </div>
                <div
                    x-show="open"
                    class="absolute px-1 py-1 ml-12 bg-blue-100 border-2 border-blue-300 shadow rounded-xl"
                    style="margin-top: -1.85rem"
                    x-transition:enter="transition-transform transition-opacity ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform -translate-x-2"
                    x-transition:enter-end="opacity-100 transform translate-x-0"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-end="opacity-0 transform -translate-x-3"
                >
                    <div class="px-2 py-1 font-semibold text-blue-500 select-none">
                        <i class="text-blue-300 fas fa-quote-right"></i>
                        {{ $visite['commentaires'] }}
                    </div>
                </div>
                @endif
            </td>
            <td class="py-3 pl-6 pr-2 text-center whitespace-nowrap">
                <div class="flex items-center">
                    <span class="font-medium"><span class="font-semibold"></span>{{ $date_arrivee_format." à ".$heure_arrivee_format }}</span>
                </div>
            </td>
            <td class="py-3 pl-2 pr-6 text-center whitespace-nowrap">
                <div class="flex items-center">
                    <span class="font-medium">{{ $date_depart_format." à ".$heure_depart_format }}</span>
                </div>
            </td>
            <td class="px-3 py-3 text-center border-l" x-data="{ open: false }">
                @if($visite['statut'] == "en attente")
                <div id="yellow" class="flex items-center ml-2 cursor-pointer" @click="open = !open" @click.away="open = false">
                    <i class="text-2xl text-yellow-500 far fa-clock"></i><i class="ml-1 text-yellow-400 align-text-top fas fa-angle-down"></i>
                </div>
                @elseif($visite['statut'] == "expirée")
                <div id="gray" class="flex items-center ml-2 cursor-pointer" @click="open = !open" @click.away="open = false">
                    <i class="text-2xl text-gray-500 far fa-times-circle"></i><i class="ml-1 text-gray-400 align-text-top fas fa-angle-down"></i>
                </div>
                @elseif($visite['statut'] == "validée")
                <div id="green" class="flex items-center ml-2 cursor-pointer" @click="open = !open" @click.away="open = false">
                    <i class="text-2xl text-green-500 far fa-check-circle"></i><i class="ml-1 text-green-400 align-text-top fas fa-angle-down"></i>
                </div>
                @endif
                <ul
                    x-show="open"
                    class="absolute px-1 py-1 mt-2 bg-white border-2 border-gray-300 shadow rounded-xl"
                    style="margin-left: -0.20rem"
                    x-transition:enter="transition-transform transition-opacity ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-end="opacity-0 transform -translate-y-3"
                >
                    <form method="POST">
                        <input type="hidden" name="id" value="{{ $visite['id'] }}" />
                        @foreach($statuts as $statut)
                        <li id="{{ $statut['couleur'] }}">
                            <button name="statut" type="submit" value="{{ $statut['nom'] }}" class="block px-3 py-1 rounded-lg hover:bg-{{ $statut['couleur'] }}-100">
                                <i class="text-2xl text-{{ $statut['couleur'] }}-500 far fa-{{ $statut['icon'] }}"></i>
                            </button>
                        </li>
                        @endforeach
                    </form>
                </ul>
            </td>
            <td class="px-3 py-3 text-center">
                @include('modules.actions-buttons')
            </td>
        </tr>
        {{-- ID Modal --}}
<div style="background-color: rgba(0, 0, 0, 0.5);" class="fixed top-0 bottom-0 left-0 right-0 z-40 w-full h-full" x-show.transition.opacity="openIdModal">
    <div class="absolute left-0 right-0 max-w-xl p-4 mx-auto mt-24 overflow-hidden">
        <div class="absolute top-0 right-0 inline-flex items-center justify-center w-10 h-10 text-gray-500 bg-white rounded-full shadow cursor-pointer hover:text-gray-800" x-on:click="openIdModal = !openIdModal">
            <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
            </svg>
        </div>

        <div class="block w-full p-8 overflow-hidden bg-white rounded-lg shadow">
            <h2 class="pb-2 mb-6 text-2xl font-bold text-purple-700 border-b">Identification du visiteur</h2>
            <div class="px-3 py-3 text-center">
                <form id="identity" method="POST">
                    <input type="hidden" name="id" value="{{ $visite['id'] }}" />
                    <select name="type_id" class="duration-150 border-2 border-purple-300 rounded-md shadow-inner focus:shadow-md hover:shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    @foreach($identifiants as $identifiant)
                    
                        <option value="{{ $identifiant['nom'] }}" class="flex py-1 rounded-lg hover:bg-purple-100">
                            {{ $identifiant['nom'] }}
                        </option>
                    
                    @endforeach
                </select>
            
                @if($visite['type_id'] == null)
                <input
                    class="duration-150 border-2 border-purple-300 rounded-md shadow-inner focus:shadow-md hover:shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    value="{{ $visite['num_id'] }}"
                    placeholder="Num. Identification"
                    type="number"
                    name="num_id"
                />
                @else
                <input
                    class="duration-150 border-2 border-purple-300 rounded-md shadow-inner focus:shadow-md hover:shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    value=""
                    placeholder="Num. Identification"
                    type="number"
                    name="num_id"
                />
                @endif
            </form>
        
        </div>

            <div class="mt-8 text-right">
                <button type="button" class="px-4 py-2 mr-2 font-semibold text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100" @click="openIdModal = !openIdModal">
                    Annuler
                </button>
                <button type="submit" form="identity" class="px-4 py-2 font-semibold text-white bg-purple-500 border border-purple-400 rounded-lg shadow-sm hover:bg-purple-400">
                    Valider
                </button>
            </div>
        </div>
    </div>
</div>
{{-- /ID Modal --}}
{{-- Valid ID Modal --}}
<div style="background-color: rgba(0, 0, 0, 0.5);" class="fixed top-0 bottom-0 left-0 right-0 z-40 w-full h-full" x-show.transition.opacity="openValidIdModal">
    <div class="absolute left-0 right-0 max-w-xl p-4 mx-auto mt-24 overflow-hidden">
        <div class="absolute top-0 right-0 inline-flex items-center justify-center w-10 h-10 text-gray-500 bg-white rounded-full shadow cursor-pointer hover:text-gray-800" x-on:click="openValidIdModal = !openValidIdModal">
            <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
            </svg>
        </div>

        <div class="block w-full p-8 overflow-hidden bg-white rounded-lg shadow">
            <h2 class="pb-2 mb-6 text-2xl font-bold text-green-700 border-b">Identification du visiteur</h2>
            <div class="px-3 py-3 text-center">
                <form id="identity" method="POST">
                    <input type="hidden" name="id" value="{{ $visite['id'] }}" />
                    <select name="type_id" class="duration-150 border-2 border-green-300 rounded-md shadow-inner focus:shadow-md hover:shadow-sm focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                    @foreach($identifiants as $identifiant)
                    
                        <option value="{{ $identifiant['nom'] }}" class="flex py-1 rounded-lg hover:bg-green-100">
                            {{ $identifiant['nom'] }}
                        </option>
                    
                    @endforeach
                </select>
            
                <input
                    class="duration-150 border-2 border-green-300 rounded-md shadow-inner focus:shadow-md hover:shadow-sm focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent"
                    value="{{ $visite['num_id'] }}"
                    placeholder="Num. Identification"
                    type="number"
                    name="num_id"
                />
            </form>
        
        </div>

            <div class="mt-8 text-right">
                <button type="button" class="px-4 py-2 mr-2 font-semibold text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100" @click="openValidIdModal = !openValidIdModal">
                    Annuler
                </button>
                <button type="submit" form="identity" class="px-4 py-2 font-semibold text-white bg-green-500 border border-green-400 rounded-lg shadow-sm hover:bg-green-400">
                    Valider
                </button>
            </div>
        </div>
    </div>
</div>
{{-- /Valid ID Modal --}}
        @endforeach
    </tbody>
</table>