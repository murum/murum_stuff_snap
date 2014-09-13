<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
  <div class="cards-item cards-item-{{ rand(1,4) }}">
    <div class="row">
      <div class="col-xs-5 col-sm-12">
        <div class="cards-item-image">
          @if( $card->has_picture_or_kik() )
            {{ HTML::image($card->get_image(), $card->snapname) }}
          @else
            {{ HTML::image('images/placeholder_sv.png', 'Placeholder') }}
          @endif
        </div>
      </div>
      <div class="col-xs-7 col-sm-12">
        <div class="cards-item-name">
          <i class="icon icon-{{ $card->get_gender() }}"></i>
          <span class="cards-item-name-text">
          @if($card->snapname)
            {{{ $card->snapname }}},
          @elseif($card->kik)
            {{{ $card->kik }}},
          @endif
          </span>
          <span class="cards-item-name-age">{{{ $card->age }}} {{{ Lang::get('letssnap.years') }}}</span>
        </div>

        {{--
        <div class="cards-item-gender {{ $card->get_gender() }}">
          {{ $card->get_gender() }}
        </div>

        <div class="cards-item-age">
          {{ Lang::get('letssnap.age') }}: {{ $card->age }}
        </div>
        --}}

        <div class="cards-item-description">
          <p>{{{ $card->description }}}</p>
        </div>
      </div>

      <div class="col-xs-12 no-padding">
        <ul class="cards-item-usernames cards-item-usernames-{{ $card->get_usernames_amount() }} row">

          @if($card->snapname)
          <li>
            <a target="_blank" href="https://www.snapchat.com/{{ $card->snapname }}">
              <i class="icon icon-snapchaticon"></i>
            </a>
          </li>
          @endif

          @if($card->kik)
            @if( !$card->snapname )
              <li class="first">
            @else
              <li>
            @endif
              <a target="_blank" href="http://kik.com/u/open/{{ $card->kik }}">
                <i class="icon icon-kikicon"></i>
              </a>
          </li>
          @endif

          @if($card->instagram)
            <li>
              <a target="_blank" href="http://instagram.com/{{ $card->instagram }}">
                <i class="icon icon-instagramicon"></i>
              </a>
            </li>
          @endif
        </ul>
      </div>

        <p>
        <a href="{{{ route("admin.delete_card", [$card->id])}}}">Delete card</a>
        </p>

        <p>
        <a href="{{{ route("admin.delete_card_block_ip", [$card->id])}}}">Delete card + block IP ({{{ $card->ip_address }}})</a>
        </p>

    </div>
  </div>
</div>