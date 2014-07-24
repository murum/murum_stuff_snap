{{ Form::open(['route' => ['users.store'], 'files' => true, 'class' => 'form form-horizontal form-user-create']) }}
<div class="form-group">
    <div class="col-xs-12">
        {{ Form::label('snapname', 'Your snapchat username', ['class' => 'control-label']) }}
        {{ Form::text('snapname', null, ['class' => 'form-control', 'required' => true]) }}
        {{ $errors->first('snapname', '<span class="text-danger">:message</span>') }}
    </div>
</div>

<div class="form-group">
    <div class="col-xs-12">
        {{ Form::label('kik', 'Your kik username', ['class' => 'control-label']) }}
        {{ Form::text('kik', null, ['class' => 'form-control']) }}
        {{ $errors->first('kik', '<span class="text-danger">:message</span>') }}
    </div>
</div>

<div class="form-group">
    <div class="col-xs-12">
        {{ Form::label('instagram', 'Your instagram username', ['class' => 'control-label']) }}
        {{ Form::text('instagram', null, ['class' => 'form-control']) }}
        {{ $errors->first('instagram', '<span class="text-danger">:message</span>') }}
    </div>
</div>

<div class="form-group">
    <div class="col-xs-12">
        {{ Form::label('sex', 'Your gender', ['class' => 'control-label']) }}
    </div>
    <div class="col-xs-12">
        <label> Male:
            {{ Form::radio('sex', '1') }}
        </label>
    </div>
    <div class="col-xs-12">
        <label> Female:
            {{ Form::radio('sex', '2') }}
        </label>
    </div>
    <div class="col-xs-12">
        {{ $errors->first('sex', '<span class="text-danger">:message</span>') }}
    </div>
</div>

<div class="form-group hidden">
    <div class="col-xs-12">
        {{ Form::label('age', 'Your age', ['class' => 'control-label']) }}
        {{ Form::text('age', null, ['class' => 'form-control']) }}
        {{ $errors->first('age', '<span class="text-danger">:message</span>') }}
    </div>
</div>

<div class="form-group">
    <div class="col-xs-12">
        <label>I Accept the rules
            {{ Form::checkbox('rules', '1', null,  ['id' => 'name']) }}
        </label>
    </div>
</div>

<div class="form-group">
    <div class="col-xs-12">
        {{ Form::label('description', 'About me', ['class' => 'control-label']) }}
        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
        {{ $errors->first('description', '<span class="text-danger">:message</span>') }}
    </div>
</div>

<div id="coupon-submit-container">
    {{ Form::hidden('image') }}
    {{ Form::submit('Send', ['class' => 'btn btn-success']) }}
</div>
{{ Form::close() }}