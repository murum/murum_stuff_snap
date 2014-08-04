<div class="image-cropper hidden">
    <div class="row">
        <div class="image-cropper-container">
            <div class="col-xs-12 col-sm-offset-1 col-sm-6 col-md-7">
                <div class="img-container">
                    <img id="image-cropper" src="" alt=""/>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="users-item users-item-{{ rand(1,4) }}">
                <div class="users-item-image">
                    <img id="image-preview" src="" alt=""/>
                </div>
                <div class="users-item-name">
                </div>
                <div class="users-item-gender female }}">
                </div>
                <hr class="users-item-divider" />
                <div class="users-item-age">
                    Age:
                </div>
                <div class="users-item-description">
                    <p>
                    </p>
                </div>
            </div>
            <div class="cropper-buttons-first">
                <a class="btn btn-lg btn-block btn-success skip-crop">
                    This looks awesome
                </a>
                <a class="btn btn-lg btn-block btn-primary show-crop">
                    I need to modify this
                </a>
            </div>
        </div>
    </div>
    <div class="row hidden cropper-buttons">
        <div class="col-xs-12 col-sm-4 col-md-offset-1 col-md-3">
            <a class="btn btn-lg btn-block btn-danger skip-crop">
                Skip crop
            </a>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-offset-1 col-md-3">
            <a id="reupload-image" class="btn btn-lg btn-block btn-warning">
                <i class="fa fa-rotate-left"></i>
                Reset
            </a>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3">
            {{ Form::open(['route' => ['images.update'], 'class' => 'form form-horizontal image-form-update']) }}
                {{ Form::hidden('image-url') }}
                {{ Form::hidden('image-width') }}
                {{ Form::hidden('image-height') }}
                {{ Form::hidden('x') }}
                {{ Form::hidden('y') }}
                {{ Form::hidden('w') }}
                {{ Form::hidden('h') }}
                <button type="submit" class="btn btn-lg btn-block btn-success">
                    I'm done cropping
                </button>
            {{ Form::close() }}
        </div>
    </div>
</div>