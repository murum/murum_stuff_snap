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

    })

    $('input#image').fileinput({
        showPreview: false,
        showRemove: false,
        showUpload: false
    });

    $('input#image').on('change', function() {
        $('form.image-form').trigger('submit');
    })

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
                $('img#image-cropper')
                    .attr('src', '/'+data.url)
                    .show();
                $('img#image-preview').attr('src', '/'+data.url);
                $('input[name="image-url"]', 'form.image-form-update').val(data.url);

                $('img#image-cropper').Jcrop({
                    onChange: showPreview,
                    onSelect: showPreview,
                    aspectRatio: 255/172
                });

                $('input#image', 'form.image-form').fileinput('reset');
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

        var formData = $(this).serializeArray();
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        $.ajax({
            url: url,  //Server script to process data
            type: method,
            success: function(data) {
                console.log(data);
                $('input[name="image"]', 'form.form-user-create').val(data.url);
            },
            // Form data
            data: formData
        });
    });
})