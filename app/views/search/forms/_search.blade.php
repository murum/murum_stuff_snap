{{ Form::open(['route' => ['search.post'], 'class' => 'form form-inline']) }}
<div class="row">
    <div class="col-xs-4">
        {{ Form::select('sex', ['0' => 'Any gender', '1' => 'Male', '2' => 'Female'], null, ['class' => 'form-control selectpicker']) }}
    </div>
    <div class="col-xs-6">
        <span class="text-info-light">Age</span>
        {{ Form::text('minAge', null, ['maxlength' => '2', 'class' => 'form-control']) }}
        -
        {{ Form::text('maxAge', null, ['maxlength' => '3', 'class' => 'form-control']) }}
    </div>
    <div class="col-xs-2">
        <button type="submit" class="btn btn-block btn-success btn-search">
            <i class="fa fa-search"></i>
        </button>
    </div>
</div>
{{ Form::close() }}