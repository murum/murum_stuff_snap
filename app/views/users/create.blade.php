@extends('layout.master')

@section('content')
    <h1>Add a card to the wall</h1>

<div class="row">
    <div class="col-xs-12">
        <h2>Step 1. Choose image</h2>
        @include('users.forms._image_form')
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <h2>Step 2. Crop image</h2>
        @include('users.forms._image_crop')
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <h2>Step 3. Fill your information</h2>
        @include('users.forms._user_form')
    </div>
</div>
@stop