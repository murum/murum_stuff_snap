@extends('layout.master')

@section('content')
<h1>
    {{ Lang::get('letssnap.headers.bump') }}
</h1>
@include('users.forms._bump')
@stop