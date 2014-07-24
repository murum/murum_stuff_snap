{{ Form::open(['route' => ['images.store'], 'files' => true, 'class' => 'form form-horizontal image-form']) }}
<div class="form-group">
    <div class="col-xs-12">
        {{ Form::label('image', 'Picture of you', ['class' => 'control-label']) }}
        {{ Form::file('image', ['class' => 'form-control']) }}
    </div>
</div>
{{ Form::close() }}
