@extends('layout.master')

@section('content')

	<h1>Block IP</h1>

	{{ Form::open() }}

	<div class="form-group">
		{{ Form::label("ip", "Ip") }}
		{{ Form::text("ip", null, ["placeholder" => "IP", "class" => "form-control"]) }}
	</div>

    <div class="form-group">
        {{ Form::label("reason", "Reason") }}
        {{ Form::textarea("reason", null, ["placeholder" => "Reason", "class" => "form-control", "size" => "30x3"]) }}
    </div>

	<div class="form-group">
		{{ Form::submit("Block", ["class" => 'btn btn-success']) }}
	</div>

	{{ Form::close() }}


	@if($blockedIps->count() > 0)
		<h2>Blocked IPs</h2>

		<ul class="list-group">
			@foreach ($blockedIps as $blockedIp)
			   <li class="list-group-item">{{{ $blockedIp->ip }}}
               @if ($blockedIp->reason)
                   - {{{ $blockedIp->reason }}}
               @endif
			@endforeach
		</ul>
	@endif

@stop
