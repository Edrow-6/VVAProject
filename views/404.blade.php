@extends('layouts.app', ['page_type' => 'error', 'body_classes' => 'bg-white min-h-[700px] md:min-h-[896px]'])

@section('content')
<main class="min-h-screen bg-cover bg-top sm:bg-top" style="background-image: url('https://cdn.pixabay.com/photo/2018/07/07/11/30/success-3521937_960_720.jpg');">
  <div class="max-w-7xl mx-auto px-4 py-16 text-center sm:px-6 sm:py-24 lg:px-8 lg:py-48">
    <p class="text-sm font-semibold text-blue-200 text-opacity-75 uppercase tracking-wide">Erreur 404</p>
    <h1 class="mt-2 text-4xl font-extrabold text-white tracking-tight sm:text-5xl">Oh non ! On dirait que vous êtes perdu.</h1>
    <p class="mt-2 text-lg font-medium text-gray-100 text-opacity-75">Il semble que la page que vous recherchez n'existe pas.</p>
    <div class="mt-6">
      <a href="/" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-black text-opacity-75 bg-white bg-opacity-75 sm:bg-opacity-25 sm:hover:bg-opacity-50">
        Retourner à l'accueil
      </a>
    </div>
  </div>
</main>
@endsection