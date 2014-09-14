@extends('layout.master')

@section('content')

{{ Form::open() }}
	<div class="form-group">
		{{ Form::label("username", Lang::get('letssnap.admin.username') ) }}
		{{ Form::text("username", null, ["placeholder" => Lang::get('letssnap.admin.username'), "class" => "form-control"]) }}
	</div>
	<div class="form-group">
		{{ Form::label("password", Lang::get('letssnap.admin.password') ) }}
		{{ Form::password("password", ["placeholder" => Lang::get('letssnap.admin.password'), "class" => "form-control"]) }}
	</div>
	<div class="form-group">
		{{ Form::submit(Lang::get('letssnap.admin.submit'), ["class" => "btn btn-success"]) }}
	</div>
{{ Form::close() }}
@stop