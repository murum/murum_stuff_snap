@extends('layout.master')

@section('content')
<h1>
    {{ Lang::get('letssnap.feedback.header') }}</h1>
<p>
    {{ Lang::get('letssnap.feedback.paragraph_one') }}
    <a href="mailto:contact@letssnap.com">contact@letssnap.com</a></p>

{{ Form::open(['route' => 'feedback.post', 'method' => 'post', 'class' => 'form form-horizontal']) }}

<div class="form-group">
    <div class="col-xs-12">
        {{ Form::label('email', Lang::get('letssnap.email')) }}
        {{ Form::text('email', null, array('placeholder' => Lang::get('letssnap.email'), 'class' => 'form-control')) }}
        <span class="help-block">
            {{ Lang::get('letssnap.messages.help_text_feedback') }}
        </span>
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