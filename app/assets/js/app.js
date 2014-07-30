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

function progressHandlingFunction(e){
    if(e.lengthComputable){
        $('progress').attr({value:e.loaded,max:e.total});
    }
}

$(function() {
    // Enable selectpickers
    $('.selectpicker').selectpicker();

    $('a.toggle-additional-user-fields').on('click', function(e) {
        e.preventDefault();

        $('a.toggle-additional-user-fields').show();
        $(this).hide();
        $('div.additional-user-fields').toggleClass('hidden');

    });

    $('input#image').fileinput({
        showPreview: false,
        showRemove: false,
        showUpload: false
    });

    $('input#image').on('change', function() {
        $('form.image-form').trigger('submit');
    });

    $('a#reupload-image').on('click', function() {
        if(confirm('Are you sure you want to reset your image?'))
            $('form.image-form').trigger('submit');
    });

    $("a.skip-image").on("click", function() {
        $(".step-image").toggleClass("hidden");

        if( $(".step-fields").length) {
            $(".step-fields").toggleClass("hidden");
        }
    });

    $("a.skip-crop").on("click", function() {
        $(".step-crop").toggleClass("hidden");

        if($(".step-fields").length) {
            $(".step-fields").toggleClass("hidden");
        }
    });

    $("a.show-crop").on('click', function() {
        $("div.image-cropper-container").toggleClass("hidden");
        $("div.cropper-buttons").toggleClass("hidden");
        $("div.cropper-buttons-first").toggleClass("hidden");
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
                var JcropAPI = $('img#image-cropper').data('Jcrop');
                if(JcropAPI) {
                    JcropAPI.destroy();
                }

                $('div.step-image').addClass('hidden');
                $('div.step-crop').removeClass('hidden');
                $("div.cropper-buttons").addClass("hidden");
                $("div.cropper-buttons-first").removeClass("hidden");

                $('img#image-cropper')
                    .attr('src', '/'+data.url)
                    .show();

                $('img#image-preview').attr('src', '/'+data.url);
                $('input[name="image-url"]', 'form.image-form-update').val(data.url);
                $('input[name="image"]', 'form.form-user-create').val(data.url);

                $('img#image-cropper').Jcrop({
                    onChange: showPreview,
                    onSelect: showPreview,
                    aspectRatio: 255/172
                });

                $('img#image-cropper').on('load', function() {
                    $("div.image-cropper-container").toggleClass("hidden");
                })
            },
            // Form data
            data: formData,
            //Options to tell jQuery not to process data or worry about content-type.
            cache: false,
            contentType: false,
            processData: false
        });
    })

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
                $('input[name="image"]', 'form.form-user-create').val(data.url);
                $(".step-fields").removeClass("hidden");
                $(".step-crop").addClass("hidden");
            },
            // Form data
            data: formData
        });
    });
})