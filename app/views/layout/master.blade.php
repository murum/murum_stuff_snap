<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Letssnap.com</title>
    {{ HTML::style('/css/main.css') }}
</head>
<body>
@include('layout.includes.master.nav')

@include('partials/_flash')
@include('partials/_errors')

<div class="container">
    <div class="row content">
        <div class="col-xs-12">
            @yield('content')
        </div>
    </div>
</div>

{{ HTML::script('/js/libs.js') }}
{{ HTML::script('/js/main.js') }}
</body>
</html>