<div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4 col-md-3">
    <div class="users-item users-item-{{ rand(1,4) }}">
        <div class="users-item-image">
            @if( $user->has_picture() )
                {{ HTML::image($user->picture, $user->snapname) }}
            @else
                {{ HTML::image('images/placeholder_sv.png', 'Placeholder') }}
            @endif
            <ul class="users-item-usernames">
                <li>
                    <i class="fa fa-snapchat"></i>
                    {{$user->snapname}}
                </li>
                @if($user->kik)
                    <li>
                        <i class="fa fa-kik"></i>{{ $user->kik }}
                    </li>
                @endif
                @if($user->instagram)
                    <li>
                        <i class="fa fa-instagram"></i>
                        {{$user->instagram}}
                    </li>
                @endif
            </ul>
        </div>
        <div class="users-item-name">
            <i class="fa fa-snapchat-black"></i>{{ $user->snapname }}
        </div>
        <div class="users-item-gender {{ $user->get_gender() }}">
            {{ $user->get_gender() }}
        </div>
        <hr class="users-item-divider" />
        <div class="users-item-age">
            {{ Lang::get('letssnap.age') }}: {{ $user->age }}
        </div>
        <div class="users-item-description">
            <p>
                {{ $user->description }}
            </p>
        </div>
    </div>
</div>