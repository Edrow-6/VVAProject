@if(flash() !== null)
    <div aria-live="assertive" class="fixed z-50 inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-2 sm:items-end">
        <div class="w-full flex flex-col items-center space-y-4 sm:items-center">
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
@endif
