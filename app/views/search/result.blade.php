@extends('layout.master')

@section('content')

<div class="hidden-xs hidden-sm">
    @include('layout.includes.master.search')
</div>

<h1>
    {{ Lang::get('letssnap.headers.search_result') }}
</h1>
@if($cards->count() > 0)
    <div class="row">
        <div class="cards">
            @foreach($cards as $card)
                @include('cards.partials.card')
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="cards-links text-center">
        </div>
    </div>
@else
    <div class="alert alert-info">
        {{ Lang::get('letssnap.messages.no_search_result') }}
    </div>
@endif
@stop