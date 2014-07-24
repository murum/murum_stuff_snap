<div class="image-cropper">
    <div class="col-xs-6">
        <img id="image-cropper" src="" alt=""/>
    </div>
    <div class="col-xs-6 col-sm-4 col-md-3">
        <div class="users-item users-item-{{ rand(1,4) }}">
            <div class="users-item-image">
                <img id="image-preview" src="" alt=""/>
            </div>
            <div class="users-item-name">
                Examplename
            </div>
            <div class="users-item-gender female }}">
            </div>
            <hr class="users-item-divider" />
            <div class="users-item-age">
                Age: XX
            </div>
            <div class="users-item-description">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi beatae corporis cupiditate.
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-2 col-md-3">
        {{ Form::open(['route' => ['images.update'], 'class' => 'form form-horizontal image-form-update']) }}
            {{ Form::hidden('image-url') }}
            {{ Form::hidden('x') }}
            {{ Form::hidden('y') }}
            {{ Form::hidden('w') }}
            {{ Form::hidden('h') }}
            {{ Form::submit('Update image', ['class' => 'btn btn-lg btn-success']) }}
        {{ Form::close() }}
    </div>
</div>