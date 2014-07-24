@extends('layout.master')

@section('content')
    <h1>Users</h1>
    @foreach($users as $user)
        @include('users.partials.user')
    @endforeach
@stop