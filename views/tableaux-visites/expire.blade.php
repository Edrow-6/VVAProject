<!DOCTYPE html>
<html lang="fr">
    <head>
        @include('modules.head')
        <?php include dirname(__DIR__) . '/../lang/fr.php'; ?>
    </head>
    <body x-data="sidebar()" class="text-gray-700 bg-gray-200" @resize.window="handleResize()">
        <div class="xl:flex">
            @include('modules.sidebar')
            <div class="w-full">
                @include('modules.navbar')
                {{-- DIV EN DEV DE LA BARRE DE RECHERCHE --}}
                <div id="recherche"></div>
                <main class="grid gap-4 px-4 md:grid-cols-1 lg:grid-cols-1">
                    <div class="relative">
                        <div class="absolute px-10 py-5 -mt-10 transform -translate-x-1/2 bg-blue-100 rounded-lg shadow-lg top-1/2 left-1/2">
                            <a id="expire" class="absolute left-0 px-3 py-2 text-white duration-75 transform bg-blue-300 rounded-full shadow-md -translate-x-2/3 top-1/3 hover:bg-blue-400 hover:scale-105" href="/visites-validees">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <h1 class="self-center justify-center text-xl font-bold text-gray-600 select-none md:text-2xl">
                                <?php echo $lang['visites']; ?>
                                <span class="italic font-normal text-gray-500">expirées</span>
                            </h1>
                            <a id="valide" class="absolute right-0 px-3 py-2 text-white duration-75 transform bg-blue-300 rounded-full shadow-md translate-x-2/3 top-1/3 hover:bg-blue-400 hover:scale-105" href="/visites-en-attente">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="px-4 py-2">
                        <div class="flex items-center justify-center overflow-x-auto font-sans min-w-screen" style="place-items: start;">
                            <div>
                                <div class="my-6 bg-white rounded shadow-md" x-data="app()">
                                    @include('tableaux-visites.tableau')
                                    @include('modules.edit-modal') @include('modules.delete-modal')
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        @include('modules.scripts')
        <script>
            tippy("#expire", {
                content: "visites validées",
                placement: "left",
                theme: "translucent",
            });
            tippy("#valide", {
                content: "visites en attente",
                placement: "right",
                theme: "translucent",
            });
        </script>
    </body>
</html>
