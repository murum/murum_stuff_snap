@extends('layout.master')

@section('content')
    <h1>
        {{ Lang::get('letssnap.headers.create_card') }}</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-8">
            @include('users.forms._user_form')
            @include('users.forms._image_crop')
        </div>
        <div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4 col-md-offset-1 col-md-3">
            <div class="users-item users-item-{{ rand(1,4) }}">
                <div class="users-item-image">
                    <img id="image-preview" src="/images/placeholder_sv.png" alt=""/>
                </div>
                <div class="users-item-name">
                </div>
                <div class="users-item-description">
                    <p>
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop