@extends('layout.master')

@section('content')

<div class="hidden-xs hidden-sm">
    @include('layout.includes.master.search')
</div>

<div class="row">
    <div class="users">
        @foreach($users as $user)
            @include('users.partials.user')
        @endforeach
    </div>
</div>

<div class="row">
    <div class="users-links text-center">
        {{ $users->links() }}
    </div>
</div>
<div class="row row-margin">
    <div class="col-xs-12 col-sm-offset-1 col-sm-10">
        <div class="create-card">
            {{ link_to_route('users.create', Lang::get('letssnap.create_card_button_text'), null, ['class' => 'btn btn-lg btn-block btn-primary']) }}
        </div>
    </div>
</div>
@stop