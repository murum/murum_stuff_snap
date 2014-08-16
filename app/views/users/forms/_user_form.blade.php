<div class="user-create-forms">
    {{ Form::open(['route' => ['images.store'], 'files' => true, 'class' => 'form form-horizontal image-form']) }}
    <div class="form-group">
        <div class="col-xs-12 col-sm-8">
            {{ Form::label('image', Lang::get('letssnap.label_add_image') . ' ' . Lang::get('letssnap.optional'), ['class' => 'control-label']) }}
            {{ Form::file('image', ['class' => 'form-control']) }}
        </div>
        <div>
            <div class="col-xs-12 col-sm-4 image-form-modify hidden">
                <label class="control-label">{{ Lang::get('letssnap.label_modify') }}</label>
                <button type="button" class="btn btn-sm btn-block btn-success" id="modify-image">{{ Lang::get('letssnap.crop') }}</button>
            </div>
        </div>
    </div>
    {{ Form::close() }}

    {{ Form::open(['route' => ['users.store'], 'files' => true, 'class' => 'form form-horizontal form-user-create']) }}
    <div class="form-group">

        {{-- Snapchat user --}}
        <div class="col-xs-12 col-sm-8">
            {{ Form::label('snapname', Lang::get('letssnap.label_snapname'), ['class' => 'control-label']) }}
            <span class="text-danger">*</span>
            {{ Form::text('snapname', null, ['class' => 'form-control', 'required' => true, 'maxlength' => '15']) }}
            {{ $errors->first('snapname', '<span class="text-danger">:message</span>') }}
        </div>

        {{-- AGE --}}
        <div class="col-xs-12 col-sm-8 col-md-4">
            {{ Form::label('age', Lang::get('letssnap.label_age'), ['class' => 'control-label']) }}
            <span class="text-danger">*</span>
            {{ Form::text('age', null, ['class' => 'form-control', 'required' => true]) }}
            {{ $errors->first('age', '<span class="text-danger">:message</span>') }}
        </div>
        {{-- Instagram user --}}
        <div class="col-xs-12 col-sm-8">
            {{ Form::label('instagram', Lang::get('letssnap.label_instagram') . ' ' . Lang::get('letssnap.optional'), ['class' => 'control-label']) }}
            {{ Form::text('instagram', null, ['class' => 'form-control', 'maxlength' => '30']) }}
            {{ $errors->first('instagram', '<span class="text-danger">:message</span>') }}
        </div>

        {{-- Gender --}}
        <div class="col-xs-12 col-sm-4">
            <div class="form-group">
                <div class="col-xs-6 col-sm-6 col-md-4">
                    <label class="control-label">
                        <div>
                            {{ Lang::get('letssnap.male') }}
                        </div>
                        {{ Form::radio('sex', '1') }}
                    </label>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4">
                    <label class="control-label">
                        <div>
                            {{ Lang::get('letssnap.female') }}
                        </div>
                        {{ Form::radio('sex', '2') }}
                    </label>
                </div>
                <div class="col-xs-12">
                    {{ $errors->first('sex', '<span class="text-danger">:message</span>') }}
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8">
            {{ Form::label('kik', Lang::get('letssnap.label_kik') . ' ' . Lang::get('letssnap.optional'), ['class' => 'control-label']) }}
            {{ Form::text('kik', null, ['class' => 'form-control']) }}
            {{ $errors->first('kik', '<span class="text-danger">:message</span>') }}
        </div>
        <div class="col-xs-12">
            {{ Form::label('description', Lang::get('letssnap.label_about'), ['class' => 'control-label']) }}
            <span class="text-danger">*</span>
            {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3, 'required' => true]) }}
            {{ $errors->first('description', '<span class="text-danger">:message</span>') }}
        </div>
    </div>

    <div class="form-group user-form-rules">
        <div class="col-xs-12">
            <label>
                <span class="text">
                    <span class="text-danger">*</span>
                    {{ Lang::get('letssnap.label_rules') }}
                    <a href="{{ route('static.rules') }}" target="_blank">
                        {{ Lang::get('letssnap.rules_text')}}
                    </a>
                </span>
                {{ Form::checkbox('rules', '1', null,  ['id' => 'name', 'required' => true]) }}
            </label>
        </div>
    </div>
    {{ Form::hidden('image') }}
        <div class="visible-xs">
            {{ Form::submit(Lang::get('letssnap.add_card_to_wall_button'), ['class' => 'btn btn-block btn-lg btn-success btn-publish']) }}
        </div>
        <div class="hidden-xs">
            {{ Form::submit(Lang::get('letssnap.add_card_to_wall_button'), ['class' => 'btn btn-lg btn-success btn-publish']) }}
        </div>
    {{ Form::close() }}
</div>