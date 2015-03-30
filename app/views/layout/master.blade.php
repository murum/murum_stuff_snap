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
    {{ HTML::style('/css/main.css?v=2_1') }}

    {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.min.js') }}
</head>
<body>
    @include('layout.includes.master.nav')
    @include('layout.includes.master.bump')
    <div class="container">
        @include('partials/_flash')
        @include('partials/_errors')

        {{--
        <div class="alert alert-info">
          {{ Lang::get('letssnap.update.notice') }} <a target="_blank" href="https://www.facebook.com/letssnapofficial">Facebook.</a>
        </div>
        --}}

        <div class="container">
            <div class="alert alert-danger">
                @if (Config::get('app.locale') == 'sv')
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <h2>Let's snap återuppstår och blir "Twinkli"</h2>
                            <p>Mer information kommer snart. Stay tuned!</p>                            
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <h2>Let's snap update</h2>
                            <p>We've got a request by Snapchat to shutdown our service due to Trademark rights of their name and Ghost logo.</p>
                            <p>We also want to be clear to all our users that our site is not sponsored, affiliated or endorsed by Snapchat, Inc.</p>
                            <p>The team of Let's snap apoligize to Snapchat, Inc. For any kind of false accosiation with Snapchat, Inc.</p>
                            <p>For more information you can send us an email [info@letssnap.com]</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="row content">
            <div class="col-xs-12">
                @yield('content')
            </div>
        </div>
    </div>

    <div class="content-full">
        @yield('content_full')
    </div>

@include('layout.includes.footer')

{{ HTML::script('/js/libs.js') }}
{{ HTML::script('/js/main.js?v=2_1') }}

@if ( URL::to('/') == 'http://letssnap.se' || URL::to('/') == 'http://www.letssnap.se')
    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-53331685-1', 'auto');
        ga('send', 'pageview');
    </script>
@elseif ( URL::to('/') == 'http://www.letssnap.com' || URL::to('/') == 'http://letssnap.com')
    <!-- Google Analytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-53331685-2', 'auto');
      ga('send', 'pageview');

    </script>
@endif

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53ef7f597dbaf532"></script>

</body>
</html>
