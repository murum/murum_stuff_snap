@extends('layout.master')

@section('content')

<h1>Welcome {{{ $admin->username }}}</h1>

<p>
<a href="{{ route("admin.handle_cards") }}">Handle cards</a>
</p>

<p>
<a href="{{ route("admin.logout") }}">Logout</a>
</p>

@stop
