@extends('layout.master')

@section('content')
<h1>
    {{ Lang::get('letssnap.headers.search') }}
</h1>
    @include('search.forms._search')
@stop