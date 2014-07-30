@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <h2>About Let's snap</h2>
        <p>Let's snap is a new website to find and get in touch with new Snapchat friends. To use our service you simple just create a card on the website or search for friend matching your criteria.</p>

        <p>Let's snap is not endorsed by the Snapchat app.</p>
        <h3>The team behind Let's snap</h3>
        <p>We're three driven people from Sweden who likes to program and design who saw a need for this type of service</p>
        <h4>Christoffer<span class="small"> - Frontend</span></h4>
        <h4>Zebastian<span class="small"> - Designer</span></h4>
        <h4>John<span class="small"> - Backend</span></h4>
    </div>
    <div class="col-xs-12 col-sm-4">
        <h2>Get started</h2>
        <a href="{{ route('users.create') }}" class="btn btn-lg btn-block btn-primary">
            Create your first card now!
        </a>
    </div>
</div>
@stop