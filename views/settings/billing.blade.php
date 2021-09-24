{{-- Vue de la page, type de la page (classe css) pour conditions, classes de la page (body) --}}
@extends('layouts.app', ['page_type' => 'billing', 'body_classes' => 'bg-gray-100'])

@section('content')
@include('components.navbar')

<div class="lg:grid lg:grid-cols-12 lg:gap-x-5 mt-6 min-h-screen">
  @include('settings.components.sidenav')

</div>
@endsection

