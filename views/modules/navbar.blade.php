<nav class="flex text-gray-700 bg-white shadow-sm">
    <div x-show="!isOpen()" class="flex">
        <a x-show="!isOpen()" @click.prevent="handleOpen()" class="p-3 duration-75 transform cursor-pointer hover:bg-blue-500 hover:text-white">
            <i class="mr-1 text-xl align-middle fas fa-bars"></i>
            <span class="font-semibold align-middle">{{ $app }} <span class="text-sm font-light">v2</span></span>
        </a>
    </div>
    <div class="flex ml-auto">
        <a class="p-3 duration-75 transform hover:bg-blue-500 hover:text-white" href="/connexion">
            <i class="mr-1 align-middle fas fa-vector-square"></i>
            <span class="font-semibold align-middle">Se connecter</span>
        </a>
    </div>
</nav>
