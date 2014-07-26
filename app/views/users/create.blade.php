@extends('layout.master')

@section('content')
    <h1>Add a card to the wall</h1>

<div class="row step-image">
    <div class="col-xs-12">
        <h2>Choose image</h2>
        @include('users.forms._image_form')
    </div>
</div>

<div class="row step-crop hidden">
    <div class="col-xs-12">
        @include('users.forms._image_crop')
    </div>
</div>

<div class="row step-fields hidden">
    <div class="col-xs-12">
        <h2>Fill your information</h2>
        @include('users.forms._user_form')
    </div>
</div>
@stop