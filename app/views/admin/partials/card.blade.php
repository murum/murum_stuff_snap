<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
  <div class="cards-item cards-item-{{ rand(1,4) }}">
    <div class="row">
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

        <div class="cards-item-description">
          <p>{{{ $card->description }}}</p>
        </div>
      </div>

      
      <div class="col-xs-12">
        <a href="{{{ route("admin.delete_card", [$card->id]) }}}" class="btn btn-block btn-danger cards-item-admin-button">
          <i class="fa fa-times-circle"></i>
          {{ Lang::get('letssnap.admin.delete_card') }}
        </a>
      </div>

      <div class="col-xs-12">
        <a href="{{{ route("admin.delete_card_block_ip", [$card->id])}}}" class="btn btn-block btn-danger cards-item-admin-button">
          <i class="fa fa-ban"></i>
          {{ Lang::get('letssnap.admin.delete_card_block_ip') }}<br />
          ({{{ $card->ip_address }}})
        </a>
      </div>

    </div>
  </div>
</div>