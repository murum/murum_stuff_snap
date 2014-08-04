{{ Form::open(['route' => ['images.store'], 'files' => true, 'class' => 'form form-horizontal image-form']) }}
<div class="form-group">
    <div class="col-xs-12 col-sm-8">
        {{ Form::label('image', 'Add image (optional)', ['class' => 'control-label']) }}
        {{ Form::file('image', ['class' => 'form-control']) }}
    </div>
    <div class="col-xs-12 col-sm-4 image-form-modify hidden">
        <label class="control-label">Modify</label>
        <button class="btn btn-sm btn-block btn-success">Crop</button>
    </div>
</div>
{{ Form::close() }}

{{ Form::open(['route' => ['users.store'], 'files' => true, 'class' => 'form form-horizontal form-user-create']) }}
<div class="form-group">
    
    {{-- Snapchat user --}}
    <div class="col-xs-12 col-sm-8">
        {{ Form::label('snapname', 'Your snapchat username', ['class' => 'control-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('snapname', null, ['class' => 'form-control', 'required' => true, 'maxlength' => '15']) }}
        {{ $errors->first('snapname', '<span class="text-danger">:message</span>') }}
    </div>

    {{-- AGE --}}
    <div class="col-xs-12 col-sm-8 col-md-4">
        {{ Form::label('age', 'Your age', ['class' => 'control-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('age', null, ['class' => 'form-control', 'required' => true]) }}
        {{ $errors->first('age', '<span class="text-danger">:message</span>') }}
    </div>
</div>
<div class="form-group">
    {{-- Instagram user --}}
    <div class="col-xs-12 col-sm-8">
        {{ Form::label('instagram', 'Your instagram username (optional)', ['class' => 'control-label']) }}
        {{ Form::text('instagram', null, ['class' => 'form-control', 'maxlength' => '30']) }}
        {{ $errors->first('instagram', '<span class="text-danger">:message</span>') }}
    </div>

    {{-- Gender --}}
    <div class="col-xs-12 col-sm-4">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <label> Male
                    {{ Form::radio('sex', '1') }}
                </label>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <label> Female
                    {{ Form::radio('sex', '2') }}
                </label>
            </div>
            <div class="col-xs-12">
                {{ $errors->first('sex', '<span class="text-danger">:message</span>') }}
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-xs-12 col-sm-8">
        {{ Form::label('kik', 'Your kik username (optional)', ['class' => 'control-label']) }}
        {{ Form::text('kik', null, ['class' => 'form-control']) }}
        {{ $errors->first('kik', '<span class="text-danger">:message</span>') }}
    </div>
</div>

<div class="form-group">
    <div class="col-xs-12">
        {{ Form::label('description', 'About me', ['class' => 'control-label']) }}
        <span class="text-danger">*</span>
        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3, 'required' => true]) }}
        {{ $errors->first('description', '<span class="text-danger">:message</span>') }}
    </div>
</div>

<div class="form-group">
    <div class="col-xs-12">
        <label>
            <span class="text-danger">*</span>
            I accept the <a href="{{ route('static.rules') }}" target="_blank">rules</a>
            {{ Form::checkbox('rules', '1', null,  ['id' => 'name', 'required' => true]) }}
        </label>
    </div>
</div>
{{ Form::hidden('image') }}
{{ Form::submit('Add card to wall', ['class' => 'btn btn-lg btn-success']) }}
{{ Form::close() }}