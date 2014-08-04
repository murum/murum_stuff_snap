@extends('layout.master')

@section('content')
<h1>
    {{ Lang::get('letssnap.headers.search_result') }}
</h1>
@if($users->count() > 0)
    <div class="row">
        <div class="users">
            @foreach($users as $user)
                @include('users.partials.user')
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="users-links text-center">
        </div>
    </div>
@else
    <div class="alert alert-info">
        {{ Lang::get('letssnap.messages.no_search_result') }}
    </div>
    @include('search.forms._search')
@endif
@stop