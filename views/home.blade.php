<!DOCTYPE html>
<html lang="fr">
    <head>
        @include('modules.head')
        <?php include dirname(__DIR__) . '/../lang/fr.php'; ?>
    </head>
    <body x-data="sidebar()" class="text-gray-700 bg-gray-200 select-none" @resize.window="handleResize()">
        <div class="xl:flex">
            @include('modules.sidebar')
            <div class="w-full">
                @include('modules.navbar')
                <main class="grid gap-4 px-4 md:grid-cols-1 lg:grid-cols-1">
                    
                </main>
            </div>
        </div>

        @include('modules.scripts')
    </body>
</html>
