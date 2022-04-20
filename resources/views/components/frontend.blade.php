<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ $title}}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/logo/site-logo-2.png')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>
    @stack('css')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="">
    @include('frontend.partials.header')
    <main class=""  id="app">
        {{$slot}}
    </main>
    @include('frontend.partials.footer')
    


   @stack('scripts')
</body>
</html>