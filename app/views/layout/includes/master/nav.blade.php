<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" rel="home" href="{{ route('home') }}">
                <img src="/images/logo.png" />
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-right navbar-nav">

                {{-- If user is not logged in --}}
                @if(Auth::guest())
                @else
                @endif
                <li class="nav-item-add">
                    {{ link_to_route('users.create', 'Add') }}
                </li>
                <li class="nav-item-search">
                    {{ link_to_route('search.index', 'Search') }}
                </li>
                <li>
                    {{ link_to_route('static.about', 'About let\'s snap') }}
                </li>
                <li>
                    {{ link_to_route('static.rules', 'Rules') }}
                </li>

                <li class="hidden dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>

                <li class="nav-item-feedback">
                    {{ link_to_route('static.feedback', 'Feedback') }}
                </li>

                <li class="nav-item-facebook">
                    <a href="https://www.facebook.com/letssnapofficial" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>

                <li class="nav-item-contact">
                    <a href="{{ route('static.contact') }}"><i class="fa fa-envelope-o"></i></a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>