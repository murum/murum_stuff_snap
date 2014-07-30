<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">-->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <meta name="description" content="Find snapchat friends to snap with. Let's snap is a new website to find and discover the worlds snapchat usernames girls and boys are all welcome!">
    <meta name="keywords" content="snapchat, chat, friends, find, mobile, kik, instagram">

    <meta property="og:title" content="Find Snapchat friends - Let's snap" />
    <meta property="og:url" content="http://letssnap.com"/>
    <meta property="og:site_name" content="Lets's snap"/>
    <meta property="og:description" content="Find snapchat friends to snap with. Let's snap is a new website to find and discover the worlds snapchat usernames girls and boys are all welcome!">
    <meta property="og:type" content="website"/>

    <title>Find Snapchat friends - Let's snap</title>
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