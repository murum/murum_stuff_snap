{{ Form::open(['route' => ['search.post'], 'class' => 'form form-inline']) }}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3">
        {{ Form::select('sex', ['0' => Lang::get('letssnap.gender.both'), '1' => Lang::get('letssnap.gender.male'), '2' => Lang::get('letssnap.gender.female')], null, ['class' => 'form-control selectpicker']) }}
    </div>

    <div class="col-xs-12 col-sm-12 col-md-7">
        <span class="text-info-light">
            {{ Lang::get('letssnap.search.age') }}
        </span>
        {{ Form::text('minAge', null, ['maxlength' => '2', 'class' => 'form-control']) }}
        -
        {{ Form::text('maxAge', null, ['maxlength' => '3', 'class' => 'form-control']) }}
    </div>

    <div class="hidden-xs hidden-sm col-md-2 text-right">
        <button type="submit" class="btn btn-success btn-search">
            <i class="fa fa-search"></i>
        </button>
    </div>

    <div class="hidden-md hidden-lg col-xs-12 col-sm-12">
        <button type="submit" class="btn btn-success btn-search">
            <i class="fa fa-search"></i>
        </button>
    </div>
</div>
{{ Form::close() }}