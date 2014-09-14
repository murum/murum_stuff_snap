@extends('layout.master')

@section('content')

<h1>Block IP</h1>

{{ Form::open() }}

{{ Form::text("ip", null, ["placeholder" => "IP"]) }}

{{ Form::submit("Block") }}

{{ Form::close() }}


<h2>Blocked IPs</h2>

<ul>
@foreach ($blockedIps as $blockedIp)
   <li>{{{ $blockedIp->ip }}}
@endforeach
</ul>

@stop
