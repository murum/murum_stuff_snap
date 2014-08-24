@extends('layout.master')

@section('content_full')
<div class="about">
    <div class="about-text text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
                    <h3>
                      {{ Lang::get('letssnap.headers.news_one') }}</h3>
                    <p class="small">
                      {{ Lang::get('letssnap.update.news_one_paragraph_one') }}</p>
                    <p class="small">
                      {{ Lang::get('letssnap.update.news_one_paragraph_two') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="about-team text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-offset-2 col-sm-8">

                </div>
            </div>
        </div>
    </div>
    <div class="about-get-started text-center">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>
</div>
@stop