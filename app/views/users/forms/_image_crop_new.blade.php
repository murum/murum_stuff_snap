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
            <a class="btn btn-block btn-danger skip-crop">
                Skip crop
            </a>
        </div>
        <div class="col-xs-12 col-sm-4">
            <a id="reupload-image" class="btn btn-block btn-warning">
                <i class="fa fa-rotate-left"></i>
                Reset
            </a>
        </div>
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
                I'm done cropping
            </button>
            {{ Form::close() }}
        </div>
    </div>
</div>