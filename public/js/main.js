function showPreview(e){var s=160/e.w,i=160/e.h,a=$("img#image-cropper").height(),r=$("img#image-cropper").width();$("img#image-preview").css({width:Math.round(i*r)+"px",height:Math.round(i*a)+"px",marginLeft:"-"+Math.round(s*e.x)+"px",marginTop:"-"+Math.round(i*e.y)+"px"}),$('input[name="x"]',"form.image-form-update").attr("value",e.x),$('input[name="y"]',"form.image-form-update").val(e.y),$('input[name="w"]',"form.image-form-update").val(e.w),$('input[name="h"]',"form.image-form-update").val(e.h),$('input[name="image-width"]',"form.image-form-update").val(r),$('input[name="image-height"]',"form.image-form-update").val(a)}function preloader(){if(document.images){var e=new Image;e.src="/images/logo-animate.gif"}}function progressHandlingFunction(e){e.lengthComputable&&$("progress").attr({value:e.loaded,max:e.total})}$(function(){preloader(),$(".navbar-brand img").hover(function(){$(this).attr("src","/images/logo-animate.gif")},function(){$(this).attr("src","/images/logo.png")}),$(".selectpicker").selectpicker();var e=$("input#image").fileinput({showPreview:!1,showRemove:!1,showUpload:!1,browseLabel:"Välj bild",browseIcon:""});$("input#image").on("change",function(){$("form.image-form").trigger("submit")}),$("button#modify-image").on("click",function(){$("div.image-cropper").removeClass("hidden"),$("div.user-create-forms").addClass("hidden");var e=$("img#image-cropper").data("Jcrop");e&&e.destroy(),setTimeout(function(){$("img#image-cropper").Jcrop({onChange:showPreview,onSelect:showPreview,aspectRatio:1}),$("img#image-cropper").css({width:"100%",height:"auto"})},500)}),$("form.image-form").on("submit",function(s){s.preventDefault();var i=new FormData($("form.image-form")[0]),a=$(this).attr("action"),r=$(this).attr("method"),t=$(this);$.ajax({url:a,type:r,xhr:function(){var e=$.ajaxSettings.xhr();return e.upload&&e.upload.addEventListener("progress",progressHandlingFunction,!1),e},success:function(s){if(s.success)$("div.ajax-error").remove(),$("div.image-form-modify").removeClass("hidden"),$("img#image-cropper").attr("src","/uploads/"+s.url).show(),$("img#image-preview").attr("src","/uploads/"+s.url),$('input[name="image-url"]',"form.image-form-update").val(s.url),$('input[name="image"]',"form.form-user-create").val("/uploads/"+s.url);else{if($("div.ajax-error").length)$("div.ajax-error").html(s.message);else{var i='<div class="alert alert-danger ajax-error">'+s.message+"</div>";$(i).insertBefore(t)}e.fileinput("reset")}},error:function(){if($("div.ajax-error").length)$("div.ajax-error").html("Systemerror");else{var e='<div class="alert alert-danger ajax-error">Systemerror</div>';$(e).insertBefore(t)}},data:i,cache:!1,contentType:!1,processData:!1})}),$("li.nav-item-bump a").on("click",function(e){e.preventDefault(),$(this).parent().toggleClass("active"),$("div.bump-form").toggleClass("hidden",1e3)});var s=function(){var e=0;return""!=$('input[name="snapname"]').val()&&e++,""!=$('input[name="kik"]').val()&&e++,""!=$('input[name="instagram"]').val()&&e++,e};$('input[name="snapname"]').on("keyup",function(){var e=s();$("span.users-item-name-text-update").text($(this).val()),$("ul.users-item-usernames").removeClass("users-item-usernames-1"),$("ul.users-item-usernames").removeClass("users-item-usernames-2"),$("ul.users-item-usernames").removeClass("users-item-usernames-3"),$("ul.users-item-usernames").addClass("users-item-usernames-"+e)}),$('input[name="kik"]').on("focusout",function(){var e=$(this).val();$.ajax({url:"/kik_image/",type:"post",data:{kik:e},dataType:"json",success:function(e){$("div.users-item-image img#image-preview").attr("src",e.source)}})}),$('input[name="kik"]').on("keyup",function(){var e=s();""!=$('input[name="kik"]').val()?($(".users-item-usernames-kik").removeClass("hidden"),isMobile.phone||$(".users-item-usernames-kik").css({height:$(".users-item-usernames-snapchat").css("height"),"line-height":$(".users-item-usernames-snapchat").css("line-height")})):$(".users-item-usernames-kik").addClass("hidden"),$("ul.users-item-usernames").removeClass("users-item-usernames-1"),$("ul.users-item-usernames").removeClass("users-item-usernames-2"),$("ul.users-item-usernames").removeClass("users-item-usernames-3"),$("ul.users-item-usernames").addClass("users-item-usernames-"+e)}),$('input[name="instagram"]').on("keyup",function(){var e=s();$("ul.users-item-usernames").removeClass("users-item-usernames-1"),$("ul.users-item-usernames").removeClass("users-item-usernames-2"),$("ul.users-item-usernames").removeClass("users-item-usernames-3"),$("ul.users-item-usernames").addClass("users-item-usernames-"+e),""!=$('input[name="instagram"]').val()?($(".users-item-usernames-instagram").removeClass("hidden"),isMobile.phone||$(".users-item-usernames-instagram").css({height:$(".users-item-usernames-snapchat").css("height"),"line-height":$(".users-item-usernames-snapchat").css("line-height")})):$(".users-item-usernames-instagram").addClass("hidden")}),$('input[name="age"]').on("keyup",function(){$("span.users-item-name-age-text").text($(this).val())}),$('textarea[name="description"]').on("keyup",function(){$("div.users-item-description p").text($(this).val())}),$('input[name="sex"]').on("change",function(){switch($("div.users-item-name i.icon").removeClass("icon-transgender"),$(this).val()){case"1":$("div.users-item-name i.icon").addClass("icon-boysymbol"),$("div.users-item-name i.icon").removeClass("icon-girlsymbol");break;case"2":$("div.users-item-name i.icon").addClass("icon-girlsymbol"),$("div.users-item-name i.icon").removeClass("icon-boysymbol")}}),$("button.skip-crop").on("click",function(){$("div.image-cropper").addClass("hidden"),$("div.user-create-forms").removeClass("hidden"),$("div.image-form-modify").removeClass("hidden")}),$("form.image-form-update").on("submit",function(e){if(e.preventDefault(),0==$("div.jcrop-hline").width())return $("a.skip-crop").trigger("click"),!1;var s=$(this).serializeArray(),i=$(this).attr("action"),a=$(this).attr("method");$.ajax({url:i,type:a,success:function(){$("div.image-cropper").addClass("hidden"),$("div.user-create-forms").removeClass("hidden"),$("div.image-form-modify").addClass("hidden")},data:s})}),isMobile.phone||($("ul.users-item-usernames li").each(function(){$(this).css({height:parseInt($(this).width())+parseInt($(this).css("padding-left"))+parseInt($(this).css("padding-right")),"line-height":parseInt($(this).width())+parseInt($(this).css("padding-left"))+parseInt($(this).css("padding-right"))+"px"})}),$(window).resize(function(){$("ul.users-item-usernames li").each(function(){$(this).css({height:parseInt($(this).width())+parseInt($(this).css("padding-left"))+parseInt($(this).css("padding-right")),"line-height":parseInt($(this).width())+parseInt($(this).css("padding-left"))+parseInt($(this).css("padding-right"))+"px"})})}))});