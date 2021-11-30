@if(flash() !== null)
    <div aria-live="assertive" class="fixed z-50 inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start">
        <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
            @if(flash()->hasMessages('error'))
                {!! flash()->setTemplate(new \App\Utils\Templates\ErrorTemplate())->display() !!}
            @elseif(flash()->hasMessages('warning'))
                {!! flash()->setTemplate(new \App\Utils\Templates\WarningTemplate())->display() !!}
            @elseif(flash()->hasMessages('info'))
                {!! flash()->setTemplate(new \App\Utils\Templates\InfoTemplate())->display() !!}
            @elseif(flash()->hasMessages('success'))
                {!! flash()->setTemplate(new \App\Utils\Templates\SuccessTemplate())->display() !!}
            @endif
        </div>
    </div>

    <div aria-live="assertive" class="fixed z-50 inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-2 sm:items-end">
        <div class="w-full flex flex-col items-center space-y-4 sm:items-center">
            <!--
              Notification panel, dynamically insert this into the live region when it needs to be displayed

              Entering: "transform ease-out duration-300 transition"
                From: "translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                To: "translate-y-0 opacity-100 sm:translate-x-0"
              Leaving: "transition ease-in duration-100"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div class="max-w-sm w-full bg-green-500 shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <!-- Heroicon name: outline/check-circle -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3 w-0 flex-1">
                            <p class="text-md font-bold text-white">
                                Sauvegardé avec succès !
                            </p>
                            <p class="text-sm text-white">
                                Test nouveau système de notification.
                            </p>
                        </div>
                        <div class="flex-shrink-0 flex">
                            <button class="bg-green-500 rounded-md inline-flex text-green-400 hover:text-green-200 transition duration-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="sr-only">Close</span>
                                <!-- Heroicon name: solid/x -->
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
