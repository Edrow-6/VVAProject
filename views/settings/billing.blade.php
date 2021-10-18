{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('settings.layout', ['page_type' => 'billing', 'body_classes' => 'bg-gray-200'])

@section('content')
<form class="divide-y divide-gray-200 lg:col-span-9" action="#" method="POST">
  
  <div class="pt-4 divide-y divide-gray-200">
    <div class="pb-4 px-4 flex justify-end sm:px-6">
      <button type="button" class="bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
        Annuler
      </button>
      <button type="submit" name="save-billing" class="ml-5 bg-sky-700 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
        Sauvegarder
      </button>
    </div>
  </div>
</form>
@endsection

