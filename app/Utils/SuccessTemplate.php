<?php

namespace App\Utils;

use JetBrains\PhpStorm\Pure;
use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

class SuccessTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix = '';
    protected $postfix = '';
    protected $wrapper = '<div id="alert" class="%s  max-w-sm w-full bg-white bg-opacity-90 backdrop-filter backdrop-blur-md shadow-lg rounded-xl pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
    <div class="p-4">
      <div class="flex items-start">
        <div class="flex-shrink-0">
          <i class="far fa-check-circle fa-lg text-emerald-400"></i>
        </div>
        <div class="ml-3 w-0 flex-1 pt-0.5">
        %s
        </div>
          <div class="ml-4 flex-shrink-0 flex">
            <button class="bg-gray-200 rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
              <span class="sr-only">Fermer</span>
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>';

    /**
     * @param string $messages
     * @param string $type
     * @return string
     */
    #[Pure] public function wrapMessages($messages, $type): string
    {
        return sprintf($this->getWrapper(), $type, $messages);
    }
}