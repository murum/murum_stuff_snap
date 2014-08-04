<div class="image-cropper hidden">
    <div class="row">
        <div class="image-cropper-container">
            <div class="col-xs-12">
                <div class="img-container">
                    <img id="image-cropper" src="" alt=""/>
                </div>
            </div>
        </div>
    </div>
    <div class="row cropper-buttons">
        <div class="col-xs-12 col-sm-4">
            {{ Form::open(['route' => ['images.update'], 'class' => 'form form-horizontal image-form-update']) }}
            {{ Form::hidden('image-url') }}
            {{ Form::hidden('image-width') }}
            {{ Form::hidden('image-height') }}
            {{ Form::hidden('x') }}
            {{ Form::hidden('y') }}
            {{ Form::hidden('w') }}
            {{ Form::hidden('h') }}
            <button type="submit" class="btn btn-block btn-success">
                {{ Lang::get('letssnap.done') }}
            </button>
            {{ Form::close() }}
        </div>
    </div>
</div>