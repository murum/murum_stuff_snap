@extends('layout.master')

@section('content')

<div class="row">
    <div class="cards">
        @foreach($cards as $card)
            @include('admin.partials.card')
        @endforeach
    </div>
</div>

<div class="row">
    <div class="cards-links text-center">
        {{ $cards->links() }}
    </div>
</div>
<div class="row row-margin">
    <div class="col-xs-12 col-sm-offset-1 col-sm-10">
        <div class="create-card">
            {{ link_to_route('cards.create', Lang::get('letssnap.create_card_button_text'), null, ['class' => 'btn btn-lg btn-block btn-primary']) }}
        </div>
    </div>
</div>
@stop