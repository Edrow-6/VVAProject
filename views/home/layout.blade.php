<!DOCTYPE html>
<html lang="fr">
<head>
    @include('components.head')
</head>
<body @unless(empty($body_classes)) class="{{ $body_classes }}" @endunless>
    @include('components.navbar')

    @yield('content')
    
    @include('components.footer')
    @include('components.flash')
    @include('components.scripts')
</body>
</html>