{{ Form::open(['route' => ['users.bump'], 'class' => 'form form-inline']) }}
<div class="row">
    <div class="col-xs-12 col-sm-10 text-right">
        {{ Form::label('bump_snapname', 'Snapname', ['class' => 'control-label']) }}
        {{ Form::text('bump_snapname', null, ['class' => 'form-control']) }}
    </div>
    <div class="col-xs-12 col-sm-2 text-right">
        <button type="submit" class="btn btn-success btn-bump">
            <i class="fa fa-refresh"></i>
            {{ Lang::get('letssnap.bump.submit') }}
        </button>
    </div>
</div>
{{ Form::close() }}