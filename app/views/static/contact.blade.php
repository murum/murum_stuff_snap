@extends('layout.master')

@section('content')
<h1>Contact</h1>
<p>We can only offer email support and contact details by email right now.</p>
<p>If you want to send us an mail using your email-address you can send us an email to <a href="mailto:contact@letssnap.com">contact@letssnap.com</a></p>

{{ Form::open(['route' => 'contact.post', 'method' => 'post', 'class' => 'form form-horizontal']) }}

<div class="form-group">
    <div class="col-xs-12">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control')) }}
    </div>
</div>

<div class="form-group">
    <div class="col-xs-12">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}
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