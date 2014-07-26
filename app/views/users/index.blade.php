@extends('layout.master')

@section('content')
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
@stop