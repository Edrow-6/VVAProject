<?php

namespace App\Utils\Templates;

use JetBrains\PhpStorm\Pure;
use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

class SuccessTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix = '';
    protected $postfix = '<br>';
    protected $wrapper = '
    <div id="notify" class="w-full max-w-sm overflow-hidden translate-x-2 bg-green-500 rounded-lg shadow-lg opacity-0 pointer-events-auto sm:translate-x-0 sm:-translate-y-2 ring-1 ring-black ring-opacity-5">
        <div class="p-3">
            <div class="flex items-start">
                <div class="shrink-0">
                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="flex-1 w-0 ml-3">
                    <p class="%s text-md font-bold text-white">%s</p>
                    <!-- <p class="text-sm text-white">Description.</p> -->
                </div>
                <div class="flex shrink-0">
                    <button data-alert-close type="button" class="inline-flex text-green-400 transition duration-100 bg-green-500 rounded-md hover:text-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white">
                        <span class="sr-only">Fermer</span>
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    ';

    /**
     * @param string $messages
     * @param string $type
     * @return string
     */
    #[Pure] public function wrapMessages($messages, $type): string
    {
        $type = match ($type) {
            'success' => 'green',
            'info' => 'blue',
            'warning' => 'orange',
            'error' => 'red',
        };

        return sprintf($this->getWrapper(), $type, $messages);
    }
}