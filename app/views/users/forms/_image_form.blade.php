{{ Form::open(['route' => ['images.store'], 'files' => true, 'class' => 'form form-horizontal image-form']) }}
<div class="form-group">
    <div class="col-xs-12">
        {{ Form::label('image', 'Picture of you', ['class' => 'control-label']) }}
        {{ Form::file('image', ['class' => 'form-control']) }}
    </div>
</div>
{{ Form::close() }}
<div class="row">
    <div class="col-xs-12 col-sm-4 col-md-3">
        <a class="btn btn-lg btn-block btn-danger skip-image">
            I don't want an image
        </a>
    </div>
</div>
