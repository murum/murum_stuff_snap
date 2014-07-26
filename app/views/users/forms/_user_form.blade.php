{{ Form::open(['route' => ['users.store'], 'files' => true, 'class' => 'form form-horizontal form-user-create']) }}
<div class="form-group">
    <div class="col-xs-12 col-sm-4">
        {{ Form::label('snapname', 'Your snapchat username', ['class' => 'control-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('snapname', null, ['class' => 'form-control', 'required' => true]) }}
        {{ $errors->first('snapname', '<span class="text-danger">:message</span>') }}
        <a href="#" class="small toggle-additional-user-fields">Show additional fields</a>

        <div class="additional-user-fields hidden">
            <div class="row">
                <div class="col-xs-12">
                    {{ Form::label('instagram', 'Your instagram username', ['class' => 'control-label']) }}
                    {{ Form::text('instagram', null, ['class' => 'form-control']) }}
                    {{ $errors->first('instagram', '<span class="text-danger">:message</span>') }}
                </div>

                <div class="col-xs-12">
                    {{ Form::label('kik', 'Your kik username', ['class' => 'control-label']) }}
                    {{ Form::text('kik', null, ['class' => 'form-control']) }}
                    {{ $errors->first('kik', '<span class="text-danger">:message</span>') }}
                    <a href="#" class="small toggle-additional-user-fields">Hide additional fields</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="row">
            <div class="col-xs-12">
                {{ Form::label('sex', 'Your gender', ['class' => 'control-label']) }}
                <span class="text-danger">*</span>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <label> Male:
                    {{ Form::radio('sex', '1') }}
                </label>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <label> Female:
                    {{ Form::radio('sex', '2') }}
                </label>
            </div>
            <div class="col-xs-12">
                {{ $errors->first('sex', '<span class="text-danger">:message</span>') }}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
        {{ Form::label('age', 'Your age', ['class' => 'control-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('age', null, ['class' => 'form-control']) }}
        {{ $errors->first('age', '<span class="text-danger">:message</span>') }}
    </div>
</div>

<div class="form-group">
    <div class="col-xs-12">
        {{ Form::label('description', 'About me', ['class' => 'control-label']) }}
        <span class="text-danger">*</span>
        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
        {{ $errors->first('description', '<span class="text-danger">:message</span>') }}
    </div>
</div>

<div class="form-group">
    <div class="col-xs-12">
        <label>
            <span class="text-danger">*</span>
            I accept the rules
            {{ Form::checkbox('rules', '1', null,  ['id' => 'name']) }}
        </label>
    </div>
</div>

<div id="coupon-submit-container">
    {{ Form::hidden('image') }}
    {{ Form::submit('Send', ['class' => 'btn btn-lg btn-success']) }}
</div>
{{ Form::close() }}