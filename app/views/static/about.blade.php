@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <h1>
            {{ Lang::get('letssnap.headers.about') }}</h1>
        <p>
            {{ Lang::get('letssnap.about.paragraph_one') }}</p>
        <p>
            {{ Lang::get('letssnap.about.paragraph_two') }}</p>

        <h3>
            {{ Lang::get('letssnap.about.header_team') }}</h3>
        <p>
            {{ Lang::get('letssnap.about.team_paragraph_one') }}</p>

        <h4>Christoffer<span class="small"> - Frontend</span></h4>
        <h4>Zebastian<span class="small"> - Designer</span></h4>
        <h4>John<span class="small"> - Backend</span></h4>
    </div>
    <div class="col-xs-12 col-sm-4">
        <h2>
            {{ Lang::get('letssnap.about.header_sidebar') }}</h2>
        <a href="{{ route('users.create') }}" class="btn btn-lg btn-block btn-primary">
            {{ Lang::get('letssnap.about.create_card_text') }}</a>
    </div>
</div>
@stop