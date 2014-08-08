<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <meta name="description" content="{{ Lang::get('letssnap.meta.description') }}">
    <meta name="keywords" content="{{ Lang::get('letssnap.meta.keywords') }}">

    <meta property="og:title" content="{{ Lang::get('letssnap.meta.og.title') }}" />
    <meta property="og:url" content="{{ Lang::get('letssnap.meta.og.url') }}"/>
    <meta property="og:site_name" content="{{ Lang::get('letssnap.meta.og.site_name') }}"/>
    <meta property="og:description" content="{{ Lang::get('letssnap.meta.og.description') }}">
    <meta property="og:type" content="website"/>

    <title>{{ Lang::get('letssnap.meta.title') }}</title>
    {{ HTML::style('/css/libs.css') }}
    {{ HTML::style('/css/main.css') }}
</head>
<body>
@include('layout.includes.master.nav')
@include('layout.includes.master.search')

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

<!-- Google Analytics -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-53331685-1', 'auto');
    ga('send', 'pageview');

</script>

</body>
</html>