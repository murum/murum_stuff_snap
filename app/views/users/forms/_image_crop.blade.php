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
        <div class="col-xs-12">
            {{ Form::open(['route' => ['images.update'], 'class' => 'form form-horizontal image-form-update']) }}
            {{ Form::hidden('image-url') }}
            {{ Form::hidden('image-width') }}
            {{ Form::hidden('image-height') }}
            {{ Form::hidden('x') }}
            {{ Form::hidden('y') }}
            {{ Form::hidden('w') }}
            {{ Form::hidden('h') }}
            <div class="btn-group">
                <button type="submit" class="btn btn-success">
                    {{ Lang::get('letssnap.done') }}
                </button>
                <button type="button" class="btn btn-danger skip-crop">
                    {{ Lang::get('letssnap.undo_crop') }}
                </button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>