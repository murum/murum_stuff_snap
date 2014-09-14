@extends('layout.master')

@section('content')

<h1>{{ Lang::get('letssnap.admin.welcome') }} {{{ $admin->username }}}!</h1>

<div class="row">
	<div class="col-xs-12 col-sm-4">
		<a href="{{ route("admin.handle_cards") }}" class="btn btn-block btn-primary">
			{{ Lang::get('letssnap.admin.handle_cards') }}
		</a>
	</div>

	<div class="col-xs-12 col-sm-4">
		<a href="{{ route("admin.block_ip") }}" class="btn btn-block btn-primary">
			{{ Lang::get('letssnap.admin.block_ip') }}
		</a>
	</div>

	<div class="col-xs-12 col-sm-4">
		<a href="{{ route("admin.logout") }}" class="btn btn-block btn-danger">
			{{ Lang::get('letssnap.admin.logout') }}
		</a>
	</div>

</div>

@stop
