@extends('layout.master')

@section('content')
<h1>
    {{ Lang::get('letssnap.contact.header') }}</h1>
<p>
    {{ Lang::get('letssnap.contact.paragraph_one') }}</p>
<p>
    {{ Lang::get('letssnap.contact.paragraph_two') }}
    <a href="mailto:contact@letssnap.com">contact@letssnap.com</a></p>

{{ Form::open(['route' => 'contact.post', 'method' => 'post', 'class' => 'form form-horizontal']) }}

<div class="form-group">
    <div class="col-xs-12">
        {{ Form::label('name', Lang::get('letssnap.name')) }}
        {{ Form::text('name', null, array('placeholder' => Lang::get('letssnap.name'), 'class' => 'form-control')) }}
    </div>
</div>

<div class="form-group">
    <div class="col-xs-12">
        {{ Form::label('email', Lang::get('letssnap.email')) }}
        {{ Form::text('email', null, array('placeholder' => Lang::get('letssnap.email'), 'class' => 'form-control')) }}
    </div>
</div>

<div class="form-group">
    <div class="col-xs-12">
        {{ Form::label('message', Lang::get('letssnap.message')) }}
        {{ Form::textarea('message', null, array('placeholder' => Lang::get('letssnap.message'), 'class' => 'form-control')) }}
    </div>
</div>

<div class="form-group">
    <div class="col-xs-12">
        {{ Form::submit(Lang::get('letssnap.send'), array('class' => 'btn btn-lg btn-success')) }}
    </div>
</div>

{{ Form::close() }}
@stop