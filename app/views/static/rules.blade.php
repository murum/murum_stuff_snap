@extends('layout.master')

@section('content')
<h1>
    {{ Lang::get('letssnap.rules.header') }}
</h1>
<ul class="list-group">
    <li class="list-group-item">
        {{ Lang::get('letssnap.rules.one') }}
    </li>
    <li class="list-group-item">
        {{ Lang::get('letssnap.rules.two') }}
    </li>
    <li class="list-group-item">
        {{ Lang::get('letssnap.rules.three') }}
    </li>
    <li class="list-group-item">
        {{ Lang::get('letssnap.rules.four') }}
    </li>
    <li class="list-group-item">
        {{ Lang::get('letssnap.rules.five') }}
    </li>
    <li class="list-group-item">
        {{ Lang::get('letssnap.rules.six') }}
    </li>
    <li class="list-group-item">
        {{ Lang::get('letssnap.rules.seven') }}
    </li>
    <li class="list-group-item">
        {{ Lang::get('letssnap.rules.eight') }}
    </li>
    <li class="list-group-item">
        {{ Lang::get('letssnap.rules.nine') }}
    </li>
</ul>
@stop
