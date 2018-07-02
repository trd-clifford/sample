<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('page_title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }
        </style>
        
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        
        @yield('css')
        
    </head>
    <body>
        <div id="app">
            
            <global-menu menu_index="{{ $menu_index }}"></global-menu>
            
            <main-content menu_index="{{ $menu_index }}"></main-content>
            
            @yield('content')
        
        </div><!-- end of id="app" -->
        
    	<script src=" {{ mix('js/app.js') }} "></script>
    </body>
    @yield('javascript')
    
</html>
