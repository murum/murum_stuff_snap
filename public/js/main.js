function showPreview(e){var a=255/e.w,i=172/e.h,t=$("img#image-cropper").height(),r=$("img#image-cropper").width();$("img#image-preview").css({width:Math.round(i*r)+"px",height:Math.round(i*t)+"px",marginLeft:"-"+Math.round(a*e.x)+"px",marginTop:"-"+Math.round(i*e.y)+"px"}),$('input[name="x"]',"form.image-form-update").attr("value",e.x),$('input[name="y"]',"form.image-form-update").val(e.y),$('input[name="w"]',"form.image-form-update").val(e.w),$('input[name="h"]',"form.image-form-update").val(e.h),$('input[name="image-width"]',"form.image-form-update").val(r),$('input[name="image-height"]',"form.image-form-update").val(t)}function preloader(){if(document.images){var e=new Image;e.src="/images/logo-animate.gif"}}function progressHandlingFunction(e){e.lengthComputable&&$("progress").attr({value:e.loaded,max:e.total})}$(function(){preloader(),$(".navbar-brand img").hover(function(){$(this).attr("src","/images/logo-animate.gif")},function(){$(this).attr("src","/images/logo.png")}),$(".selectpicker").selectpicker(),$("input#image").fileinput({showPreview:!1,showRemove:!1,showUpload:!1,browseLabel:"Add image",browseIcon:""}),$("input#image").on("change",function(){$("form.image-form").trigger("submit")}),$("button#modify-image").on("click",function(){$("div.image-cropper").removeClass("hidden"),$("div.user-create-forms").addClass("hidden")}),$("a#reupload-image").on("click",function(){confirm("Are you sure you want to reset your image?")&&$("form.image-form").trigger("submit")}),$("form.image-form").on("submit",function(e){e.preventDefault();{var a=new FormData($("form.image-form")[0]),i=$(this).attr("action"),t=$(this).attr("method");$(this)}$.ajax({url:i,type:t,xhr:function(){var e=$.ajaxSettings.xhr();return e.upload&&e.upload.addEventListener("progress",progressHandlingFunction,!1),e},success:function(e){var a=$("img#image-cropper").data("Jcrop");a&&a.destroy(),$("div.image-form-modify").removeClass("hidden"),$("img#image-cropper").attr("src","/"+e.url).show(),$("img#image-preview").attr("src","/"+e.url),$('input[name="image-url"]',"form.image-form-update").val(e.url),$('input[name="image"]',"form.form-user-create").val(e.url),$("img#image-cropper").Jcrop({onChange:showPreview,onSelect:showPreview,aspectRatio:255/172}),$("img#image-cropper").on("load",function(){$(this).css({width:"100%",height:"auto"})})},data:a,cache:!1,contentType:!1,processData:!1})}),$("li.nav-item-search a").on("click",function(e){e.preventDefault(),$(this).parent().toggleClass("active"),$("div.search-form").toggleClass("hidden",1e3)}),$('input[name="snapname"]').on("keyup",function(){$("div.users-item-name").text($(this).val())}),$('input[name="age"]').on("keyup",function(){$("span.users-item-age-value").text($(this).val())}),$('textarea[name="description"]').on("keyup",function(){$("div.users-item-description p").text($(this).val())}),$('input[name="sex"]').on("change",function(){switch($(this).val()){case"1":$("div.users-item-gender").addClass("male"),$("div.users-item-gender").removeClass("female");break;case"2":$("div.users-item-gender").addClass("female"),$("div.users-item-gender").removeClass("male")}}),$("form.image-form-update").on("submit",function(e){if(e.preventDefault(),0==$("div.jcrop-hline").width())return $("a.skip-crop").trigger("click"),!1;var a=$(this).serializeArray(),i=$(this).attr("action"),t=$(this).attr("method");$.ajax({url:i,type:t,success:function(){$("div.image-cropper").addClass("hidden"),$("div.user-create-forms").removeClass("hidden")},data:a})})});