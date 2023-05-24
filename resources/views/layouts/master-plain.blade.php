<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title> @yield('title') | {{ env('APP_NAME') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="Simfoni Perdana" name="description" />
        <meta content="Mohd Haifizan" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('assets/images/SimfoniPerdanaTransparentSmall.png')}}">
        @include('layouts.head-css')
        @livewireStyles
      
  </head>

    @yield('body')
    
    @yield('content')
    {{ $slot ?? '' }}

    
  
    @include('layouts.vendor-scripts')
    @livewireScripts
    @stack('scripts')
    </body>
</html>