<div class="col-xs-6 col-sm-4 col-md-3">
    <div class="users-item users-item-{{ rand(1,4) }}">
        <div class="users-item-image">
            @if( $user->has_picture() )
                {{ HTML::image($user->picture, $user->snapname) }}
            @else
                {{ HTML::image('images/placeholder.png', 'Placeholder') }}
            @endif
        </div>
        <div class="users-item-name">
            {{ $user->snapname }}
        </div>
        <div class="users-item-gender {{ $user->get_gender() }}">
            {{ $user->get_gender() }}
        </div>
        <hr class="users-item-divider" />
        <div class="users-item-age">
            <?php /* Age: {{ $user->age }} */ ?>
        </div>
        <div class="users-item-description">
            <p>
                {{ $user->description }}
            </p>
        </div>
    </div>
</div>