{{ Form::open(['route' => ['search.post'], 'class' => 'form form-horizontal']) }}
<div class="form-group">
    <div class="col-xs-12">
        {{ Form::label('sex', 'Sex', ['class' => 'control-label']) }}
        {{ Form::select('sex', ['1' => 'Male', '2' => 'Female'], null, ['class' => 'form-control selectpicker']) }}
        {{ $errors->first('sex', '<span class="text-danger">:message</span>') }}
    </div>
</div>

<div class="form-group">
    <div class="col-xs-6">
        {{ Form::label('minAge', 'Min age', ['class' => 'control-label']) }}
        {{ Form::text('minAge', null, ['class' => 'form-control']) }}
        {{ $errors->first('minAge', '<span class="text-danger">:message</span>') }}
    </div>
    <div class="col-xs-6">
        {{ Form::label('maxAge', 'Max age', ['class' => 'control-label']) }}
        {{ Form::text('maxAge', null, ['class' => 'form-control']) }}
        {{ $errors->first('maxAge', '<span class="text-danger">:message</span>') }}
    </div>
</div>

<div id="coupon-submit-container">
    {{ Form::submit('Search', ['class' => 'btn btn-success']) }}
</div>
{{ Form::close() }}