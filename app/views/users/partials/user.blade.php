<div class="col-xs-12 col-sm-4 col-md-3">
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
        <div class="users-item-name">{{{ $user->snapname }}}</div>

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
          <li>
            <a target="_blank" href="https://www.snapchat.com/{{ $user->snapname }}">
              <i class="icon icon-snapchaticon"></i>
            </a>
          </li>

          @if($user->kik)
          <li>
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