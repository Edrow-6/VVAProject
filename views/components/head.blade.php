<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>{{ $titre . $app }}</title>

{{-- Favicon --}}
<link href="@asset('favicon')" rel="icon">

{{-- Polices --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet"> 

{{-- TailwindCSS et Fontawesome --}}
<link href="@asset('tailwindcss')" rel="stylesheet">
<link href="@asset('fontawesomepro')" rel="stylesheet">

{{-- Bibliothèques --}}
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
{{-- <scriptsrc="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
