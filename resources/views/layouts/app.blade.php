<!doctype html>
<html>
    <head>
        <title>Gestao Escolar Laravel</title>
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @include('partials.header')
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="app">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
