{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('account.layout', ['title' => 'Facturation | Compte', 'page_type' => 'billing', 'body_classes' => 'bg-gray-200'])

@section('content')
<form class="divide-y divide-gray-200 lg:col-span-9" action="#" method="POST">
  {{-- TODO: Contenu utilisateur facturation --}}
  <div class="mt-4 pt-4 flex justify-end">
    <button type="button" class="button-white py-2 px-4">
      Annuler
    </button>
    <button type="submit" name="save-account" class="button-blue ml-5 px-4 py-2">
      Sauvegarder
    </button>
  </div>
  </div>
</form>
@endsection

