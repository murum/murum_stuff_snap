{{ Form::open(['route' => ['users.bump'], 'class' => 'form form-inline']) }}
<div class="row">
    <div class="col-sm-12 col-md-6">
        <p>
            {{ Lang::get('letssnap.bump.info') }}
        </p>
    </div>
    <div class="col-sm-12 col-md-4 text-right">
        {{ Form::label('bump_snapname', 'Snapname', ['class' => 'control-label']) }}
        {{ Form::text('bump_snapname', null, ['class' => 'form-control']) }}
    </div>

    <div class="hidden-sm hidden-xs col-xs-12 col-sm-12 col-md-2 text-right">
        <button type="submit" class="btn btn-success btn-bump">
            {{ Lang::get('letssnap.bump.submit') }}
        </button>
    </div>

    <div class="visible-sm visible-xs col-xs-12 col-sm-12 col-md-2 text-right">
        <button type="submit" class="btn btn-success btn-block btn-bump">
            <i class="fa fa-refresh"></i>
            {{ Lang::get('letssnap.bump.submit') }}
        </button>
    </div>

</div>
{{ Form::close() }}