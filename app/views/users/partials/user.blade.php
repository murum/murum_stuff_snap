<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
  <div class="users-item users-item-{{ rand(1,4) }}">
    <div class="row">
      <div class="col-xs-5 col-sm-12">
        <div class="users-item-image">
          @if( $user->has_picture_or_kik() )
            {{ HTML::image($user->get_image(), $user->snapname) }}
          @else
            {{ HTML::image('images/placeholder_sv.png', 'Placeholder') }}
          @endif
        </div>
      </div>
      <div class="col-xs-7 col-sm-12">
        <div class="users-item-name">
          <i class="icon icon-{{ $user->get_gender() }}"></i>
          <span class="users-item-name-text">
          @if($user->snapname)
            {{{ $user->snapname }}},
          @elseif($user->kik)
            {{{ $user->kik }}},
          @endif
          </span>
          <span class="users-item-name-age">{{{ $user->age }}} {{{ Lang::get('letssnap.years') }}}</span>
        </div>

        {{--
        <div class="users-item-gender {{ $user->get_gender() }}">
          {{ $user->get_gender() }}
        </div>

        <div class="users-item-age">
          {{ Lang::get('letssnap.age') }}: {{ $user->age }}
        </div>
        --}}

        <div class="users-item-description">
          <p>{{{ $user->description }}}</p>
        </div>
      </div>

      <div class="col-xs-12 no-padding">
        <ul class="users-item-usernames users-item-usernames-{{ $user->get_usernames_amount() }} row">

          @if($user->snapname)
          <li>
            <a target="_blank" href="https://www.snapchat.com/{{ $user->snapname }}">
              <i class="icon icon-snapchaticon"></i>
            </a>
          </li>
          @endif

          @if($user->kik)
            @if( !$user->snapname )
              <li class="first">
            @else
              <li>
            @endif
              <a target="_blank" href="http://kik.com/u/open/{{ $user->kik }}">
                <i class="icon icon-kikicon"></i>
              </a>
          </li>
          @endif

          @if($user->instagram)
            <li>
              <a target="_blank" href="http://instagram.com/{{ $user->instagram }}">
                <i class="icon icon-instagramicon"></i>
              </a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</div>