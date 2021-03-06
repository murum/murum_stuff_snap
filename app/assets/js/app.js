function showPreview(coords)
{
    var rx = 160 / coords.w;
    var ry = 160 / coords.h;
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
        $('div.card-create-forms').addClass('hidden');


        var JcropAPI = $('img#image-cropper').data('Jcrop');
        if(JcropAPI) {
            JcropAPI.destroy();
        }

        // Make image be max 100%
        setTimeout(function() {
            $('img#image-cropper').Jcrop({
                onChange: showPreview,
                onSelect: showPreview,
                aspectRatio: 160/160
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

    var check_usernames_amount = function() {
        var amount = 0;

        if( $('input[name="snapname"]').val() != '') {
            amount++;
        }

        if( $('input[name="kik"]').val() != '') {
            amount++;
        }

        if( $('input[name="instagram"]').val() != '') {
            amount++;
        }

        return amount;
    };

    $('input[name="snapname"]').on('keyup', function() {
        var amount = check_usernames_amount();

        $('span.cards-item-name-text-update').text($(this).val());

        $('ul.cards-item-usernames').removeClass('cards-item-usernames-1');
        $('ul.cards-item-usernames').removeClass('cards-item-usernames-2');
        $('ul.cards-item-usernames').removeClass('cards-item-usernames-3');

        $('ul.cards-item-usernames').addClass('cards-item-usernames-'+amount);
    });

    $('input[name="kik"]').on('focusout', function() {
        var kik = $(this).val();
        $.ajax({
            url: '/kik_image/',
            type: 'post',
            data: {'kik': kik},
            dataType: 'json',
            success: function(data) {
                $('div.cards-item-image img#image-preview').attr('src', data.source);
            }
        })
    })

    $('input[name="snapname"]').on('keyup', function() {
        var amount = check_usernames_amount();
        var button = $('.cards-item-usernames-snapchat');
        var usernames = $('ul.cards-item-usernames');
        var textUpdate = $('.cards-item-name-text-update');

        if($('input[name="kik"]').val() == '') {
            textUpdate.text($(this).val());
        }

        if($(this).val() != '') {
            button.removeClass('hidden');

            $('.cards-item-usernames-kik').removeClass('first');

            if( ! isMobile.phone ) {
                button.css({
                    'height': button.width(),
                    'line-height': button.width()+'px'
                });
            }
        } else {
            button.addClass('hidden');
        }
        usernames.removeClass('cards-item-usernames-1');
        usernames.removeClass('cards-item-usernames-2');
        usernames.removeClass('cards-item-usernames-3');

        usernames.addClass('cards-item-usernames-'+amount);
    });


    $('input[name="kik"]').on('keyup', function() {
        var amount = check_usernames_amount();
        var button = $('.cards-item-usernames-kik');
        var usernames = $('ul.cards-item-usernames');

        var textUpdate = $('.cards-item-name-text-update');

        if($('input[name="snapname"]').val() == '') {
            textUpdate.text($(this).val());
            button.addClass('first');
        }

        if($(this).val() != '') {
            button.removeClass('hidden');

            if( ! isMobile.phone ) {
                button.css({
                    'height': button.width(),
                    'line-height': button.width()+'px'
                });
            }
        } else {
            button.addClass('hidden');
        }
        usernames.removeClass('cards-item-usernames-1');
        usernames.removeClass('cards-item-usernames-2');
        usernames.removeClass('cards-item-usernames-3');

        usernames.addClass('cards-item-usernames-'+amount);
    });

    $('input[name="instagram"]').on('keyup', function() {
        var amount = check_usernames_amount();
        var button = $('.cards-item-usernames-instagram');
        var usernames = $('ul.cards-item-usernames');

        if($('input[name="instagram"]').val() != '') {
            button.removeClass('hidden');

            if( ! isMobile.phone ) {
                button.css({
                    'height': button.width(),
                    'line-height': button.width()+'px'
                });
            }
        } else {
            button.addClass('hidden');
        }
        usernames.removeClass('cards-item-usernames-1');
        usernames.removeClass('cards-item-usernames-2');
        usernames.removeClass('cards-item-usernames-3');

        usernames.addClass('cards-item-usernames-'+amount);
    });

    $('input[name="age"]').on('keyup', function() {
        $('span.cards-item-name-age-text').text($(this).val());
    });

    $('textarea[name="description"]').on('keyup', function() {
        $('div.cards-item-description p').text($(this).val());
    });

    $('input[name="sex"]').on('change', function() {
        $('div.cards-item-name i.icon').removeClass('icon-transgender');

        switch($(this).val()) {
            case '1':
                $('div.cards-item-name i.icon').addClass('icon-boysymbol');
                $('div.cards-item-name i.icon').removeClass('icon-girlsymbol');
                break;
            case '2':
                $('div.cards-item-name i.icon').addClass('icon-girlsymbol');
                $('div.cards-item-name i.icon').removeClass('icon-boysymbol');
                break;
        };
    });

    $("button.skip-crop").on('click', function() {
        $('div.image-cropper').addClass('hidden');
        $('div.card-create-forms').removeClass('hidden');
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
                $('div.card-create-forms').removeClass('hidden');
                $('div.image-form-modify').addClass('hidden');
            },
            // Form data
            data: formData
        });
    });

    // Set of card usernames boxes
    if( ! isMobile.phone ) {
        $('ul.cards-item-usernames li').each(function () {
            $(this).css({
                "height": (parseInt($(this).width()) + parseInt($(this).css('padding-left')) + parseInt($(this).css('padding-right'))),
                "line-height": (parseInt($(this).width()) + parseInt($(this).css('padding-left')) + parseInt($(this).css('padding-right'))) + 'px',
            });
        });

        $(window).resize(function () {
            $('ul.cards-item-usernames li').each(function () {
                $(this).css({
                    "height": (parseInt($(this).width()) + parseInt($(this).css('padding-left')) + parseInt($(this).css('padding-right'))),
                    "line-height": (parseInt($(this).width()) + parseInt($(this).css('padding-left')) + parseInt($(this).css('padding-right'))) + 'px',
                });
            });
        });
    }

});