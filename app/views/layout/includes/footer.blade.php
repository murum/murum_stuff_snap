<div class="footer hidden-xs">
    <div class="container">
        <div class="col-xs-12 col-sm-4">
            <a href="{{ route('home') }}">
                {{ HTML::image('/images/logo-icon.png', Lang::get('letssnap.images.small_logotype')) }}
            </a>
        </div>
        <div class="col-xs-12 col-sm-8">
            <div class="pull-right">
                <p class="footer-copy">
                    &copy; Let's snap 2014
                </p>
                <ul class="footer-links">
                    <li>
                        {{ link_to_route('static.contact', Lang::get('letssnap.nav.contact')) }}
                    </li>
                    <li>
                        <a href="https://www.facebook.com/letssnapofficial" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>