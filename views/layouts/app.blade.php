<!DOCTYPE html>
<html lang="fr">
<head>
    @include('components.head')
</head>
<body @unless(empty($body_classes)) class="{{ $body_classes }}" @endunless>
    @unless($page_type != 'app')
    @include('components.navbar')
    @endunless

    @yield('content')
    
    @include('components.scripts')
</body>
</html>