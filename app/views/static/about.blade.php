@extends('layout.master')

@section('content_full')
<div class="about">
    <div class="about-text text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-offset-1 col-sm-10">
                    <h3>
                        {{ Lang::get('letssnap.headers.about') }}</h3>
                    <p class="small">
                        {{ Lang::get('letssnap.about.paragraph_one') }}</p>
                    <p class="small">
                        {{ Lang::get('letssnap.about.paragraph_two') }}</p>
                    <p class="small">
                        {{ Lang::get('letssnap.about.paragraph_three') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="about-team text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-offset-2 col-sm-8">
                    <h3>
                        {{ Lang::get('letssnap.about.header_team') }}</h3>

                    <div class="row">
                        <div class="about-team-person">
                            {{ HTML::image('images/christoffer.png', 'Christoffer', ['class' => 'img-responsive']) }}
                            <h4>Christoffer</h4>
                            <h5>Front-end developer</h5>
                        </div>
                        <div class="about-team-person">
                            {{ HTML::image('images/zebastian.png', 'Zebastian', ['class' => 'img-responsive']) }}
                            <h4>Zebastian</h4>
                            <h5>ui / ux designer</h5>
                        </div>
                        <div class="about-team-person">
                            {{ HTML::image('images/john.png', 'John', ['class' => 'img-responsive']) }}

                            <h4>John</h4>
                            <h5>back-end developer</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-get-started text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-offset-3 col-sm-6">
                    {{ HTML::image('images/create-card.png', 'Skapa kort') }}

                    <a href="{{ route('cards.create') }}" class="btn btn-lg btn-block btn-primary">
                        {{ Lang::get('letssnap.about.create_card_text') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop