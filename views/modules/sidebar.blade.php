<div x-show="isOpen()" class="fixed inset-0 z-10 flex h-screen bg-white bg-opacity-75 shadow-lg xl:sticky">
    <div @click.away="handleAway()" class="w-48 text-white bg-gray-800 shadow">
        <div class="flex content-between text-white bg-gray-900">
            <div class="w-full p-3 text-sm font-light"><i class="mr-2 fas fa-home"></i><span class="text-base font-semibold select-none">{{ $app }} </span>v2</div>
            <a @click.prevent="handleClose()" class="flex items-center flex-1 p-3 text-white duration-75 transform cursor-pointer hover:bg-red-500">
                <i class="align-middle fas fa-times"></i>
            </a>
        </div>
        <div class="w-full h-0.5 bg-gray-500"></div>
        <a class="flex items-center w-full p-3 font-semibold duration-75 transform hover:bg-blue-500" href="/">
            <i class="mr-3 fas fa-calendar-alt"></i>
            Calendrier
        </a>
        <a class="flex items-center w-full p-3 font-semibold duration-75 transform hover:bg-blue-500" href="/enregistrement">
            <i class="mr-3 fas fa-plus-square"></i>
            Enregistrement
        </a>
        <a class="flex items-center w-full p-3 font-semibold duration-75 transform hover:bg-blue-500" href="/visites-en-attente">
            <i class="mr-3 fas fa-address-card"></i>
            Visites
        </a>
    </div>
</div>
