{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('dashboard.layout', ['title' => 'Stats | T2B', 'page_type' => 'stats', 'body_classes' => 'bg-gray-100'])

@section('content')
  <p>Page accueil T2B / Stats</p>
@endsection