@extends('layout.master')

@section('content')
<h1>Feedback to Let's snap</h1>
<p>If you want to send us an email without using this form, please send us an email using this to this email address<a href="mailto:contact@letssnap.com">contact@letssnap.com</a></p>

{{ Form::open(['route' => 'feedback.post', 'method' => 'post', 'class' => 'form form-horizontal']) }}

<div class="form-group">
    <div class="col-xs-12">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}
        <span class="help-block">
            Please fulfill this field so we can ask you any further questions
        </span>
    </div>
</div>

<div class="form-group">
    <div class="col-xs-12">
        {{ Form::label('message', 'Message') }}
        {{ Form::textarea('message', null, array('placeholder' => 'Message', 'class' => 'form-control')) }}
    </div>
</div>

<div class="form-group">
    <div class="col-xs-12">
        {{ Form::submit('Send', array('class' => 'btn btn-lg btn-success')) }}
    </div>
</div>

{{ Form::close() }}
@stop