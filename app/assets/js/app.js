function showPreview(coords)
{
    var rx = 255 / coords.w;
    var ry = 172 / coords.h;
    var imgHeight = $('img#image-cropper').height();
    var imgWidth = $('img#image-cropper').width();

    $('img#image-preview').css({
        width: Math.round(ry * imgWidth)+ 'px',
        height: Math.round(ry * imgHeight) + 'px',
        marginLeft: '-' + Math.round(rx * coords.x) + 'px',
        marginTop: '-' + Math.round(ry * coords.y) + 'px'
    });

    $('input[name="x"]', 'form.image-form-update').attr('value', coords.x);
    $('input[name="y"]', 'form.image-form-update').val(coords.y);
    $('input[name="w"]', 'form.image-form-update').val(coords.w);
    $('input[name="h"]', 'form.image-form-update').val(coords.h);

    $('input[name="image-width"]', 'form.image-form-update').val(imgWidth);
    $('input[name="image-height"]', 'form.image-form-update').val(imgHeight);
}

function preloader() {
    if (document.images) {
        var img1 = new Image();

        img1.src = "/images/logo-animate.gif";
    }
}

function progressHandlingFunction(e){
    if(e.lengthComputable){
        $('progress').attr({value:e.loaded,max:e.total});
    }
}

$(function() {
    preloader();

    $(".navbar-brand img").hover(
        function() {
            $(this).attr("src", "/images/logo-animate.gif");
        },
        function() {
            $(this).attr("src", "/images/logo.png");
        }
    );

    // Enable selectpickers
    $('.selectpicker').selectpicker();

    var fileInput = $('input#image').fileinput({
        showPreview: false,
        showRemove: false,
        showUpload: false,
        browseLabel: 'Välj bild',
        browseIcon: ''
    });

    $('input#image').on('change', function() {
        $('form.image-form').trigger('submit');
    });

    $('button#modify-image').on('click', function() {
        $('div.image-cropper').removeClass('hidden');
        $('div.user-create-forms').addClass('hidden');


        var JcropAPI = $('img#image-cropper').data('Jcrop');
        if(JcropAPI) {
            JcropAPI.destroy();
        }

        // Make image be max 100%
        setTimeout(function() {
            $('img#image-cropper').Jcrop({
                onChange: showPreview,
                onSelect: showPreview,
                aspectRatio: 255/172
            });

            $('img#image-cropper').css({width: '100%', height: 'auto'});
        }, 500);
    });

    $('form.image-form').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData($('form.image-form')[0]);
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var that = $(this);
        $.ajax({
            url: url,  //Server script to process data
            type: method,
            xhr: function() {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){ // Check if upload property exists
                    myXhr.upload.addEventListener('progress',progressHandlingFunction, false); // For handling the progress of the upload
                }
                return myXhr;
            },
            //Ajax events
            success: function(data) {
                if(data.success) {
                    $('div.ajax-error').remove();

                    $('div.image-form-modify').removeClass('hidden');

                    $('img#image-cropper')
                        .attr('src', '/uploads/'+data.url)
                        .show();

                    $('img#image-preview').attr('src', '/uploads/'+data.url);
                    $('input[name="image-url"]', 'form.image-form-update').val(data.url);
                    $('input[name="image"]', 'form.form-user-create').val('/uploads/'+data.url);
                } else {
                    if( ! $('div.ajax-error').length ) {
                        var $errors = '<div class="alert alert-danger ajax-error">'+data.message+'</div>';
                        $($errors).insertBefore(that);
                    } else {
                        $('div.ajax-error').html(data.message);
                    }

                    fileInput.fileinput('reset');
                }
            },
            error: function() {
                if( ! $('div.ajax-error').length ) {
                    var $errors = '<div class="alert alert-danger ajax-error">Systemerror</div>';
                    $($errors).insertBefore(that);
                } else {
                    $('div.ajax-error').html('Systemerror');
                }
            },
            // Form data
            data: formData,
            //Options to tell jQuery not to process data or worry about content-type.
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $('li.nav-item-bump a').on('click', function(e) {
        e.preventDefault();

        $(this).parent().toggleClass('active');
        $('div.bump-form').toggleClass('hidden',1000);
    });

    $('input[name="snapname"]').on('keyup', function() {
        $('div.users-item-name').text($(this).val());
    });

    $('input[name="age"]').on('keyup', function() {
        $('span.users-item-age-value').text($(this).val());
    });

    $('textarea[name="description"]').on('keyup', function() {
        $('div.users-item-description p').text($(this).val());
    });

    $('input[name="sex"]').on('change', function() {
        switch($(this).val()) {
            case '1':
                $('div.users-item-gender').addClass('male');
                $('div.users-item-gender').removeClass('female');
                break;
            case '2':
                $('div.users-item-gender').addClass('female');
                $('div.users-item-gender').removeClass('male');
                break;
        };
    });

    $("button.skip-crop").on('click', function() {
        $('div.image-cropper').addClass('hidden');
        $('div.user-create-forms').removeClass('hidden');
        $('div.image-form-modify').removeClass('hidden');
    });

    $('form.image-form-update').on('submit', function(e) {
        e.preventDefault();
        if ($("div.jcrop-hline").width() == 0) {
            $("a.skip-crop").trigger("click");
            return false;
        }

        var formData = $(this).serializeArray();
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        $.ajax({
            url: url,  //Server script to process data
            type: method,
            success: function(data) {
                $('div.image-cropper').addClass('hidden');
                $('div.user-create-forms').removeClass('hidden');
                $('div.image-form-modify').addClass('hidden');
            },
            // Form data
            data: formData
        });
    });
});