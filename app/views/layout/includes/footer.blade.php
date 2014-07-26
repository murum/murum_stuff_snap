<div class="footer">
    <div class="container">
        <div class="col-xs-12 col-sm-4">
            <a href="{{ route('home') }}">
                {{ HTML::image('/images/logo-icon.png', 'Small logotype') }}
            </a>
        </div>
        <div class="col-xs-12 col-sm-8">
            <div class="pull-right">
                <p class="footer-copy">
                    &copy; Let's snap 2014
                </p>
                <ul class="footer-links">
                    <li>
                        {{ link_to_route('static.contact', 'Contact us') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>