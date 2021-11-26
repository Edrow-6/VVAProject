{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('dashboard.layout', ['title' => 'Utilisateurs | T2B', 'page_type' => 'users', 'body_classes' => 'bg-gray-100'])

@section('content')
  <p>Page Utilisateurs</p>
@endsection