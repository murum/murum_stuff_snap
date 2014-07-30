<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Letssnap.com</title>
    {{ HTML::style('/css/libs.css') }}
    {{ HTML::style('/css/main.css') }}
</head>
<body>

@include('layout.includes.master.nav')

<div class="container">
    @include('partials/_flash')
    @include('partials/_errors')

    <div class="row content">
        <div class="col-xs-12">
            @yield('content')
        </div>
    </div>
</div>

@include('layout.includes.footer')

{{ HTML::script('/js/libs.js') }}
{{ HTML::script('/js/main.js') }}
</body>
</html>