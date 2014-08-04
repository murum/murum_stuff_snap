@extends('layout.master')

@section('content')
    <h1>Add a card to the wall</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-8">
            @include('users.forms._user_form_new')
            @include('users.forms._image_crop_new')
        </div>
        <div class="col-xs-12 col-sm-4 col-md-offset-1 col-md-3">
            <div class="users-item users-item-{{ rand(1,4) }}">
                <div class="users-item-image">
                    <img id="image-preview" src="/images/placeholder.png" alt=""/>
                </div>
                <div class="users-item-name">
                </div>
                <div class="users-item-gender">
                </div>
                <hr class="users-item-divider" />
                <div class="users-item-age">
                    Age: <span class="users-item-age-value"></span>
                </div>
                <div class="users-item-description">
                    <p>
                    </p>
                </div>
            </div>
        </div>
    </div>
<!--
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
-->
@stop