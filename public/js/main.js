function showPreview(e){var a=255/e.w,t=172/e.h,r=$("img#image-cropper").height(),i=$("img#image-cropper").width();$("img#image-preview").css({width:Math.round(t*i)+"px",height:Math.round(t*r)+"px",marginLeft:"-"+Math.round(a*e.x)+"px",marginTop:"-"+Math.round(t*e.y)+"px"}),$('input[name="x"]',"form.image-form-update").attr("value",e.x),$('input[name="y"]',"form.image-form-update").val(e.y),$('input[name="w"]',"form.image-form-update").val(e.w),$('input[name="h"]',"form.image-form-update").val(e.h)}function progressHandlingFunction(e){e.lengthComputable&&$("progress").attr({value:e.loaded,max:e.total})}$(function(){$("input#image").fileinput({showPreview:!1,showRemove:!1}),$("form.image-form").on("submit",function(e){e.preventDefault();{var a=new FormData($("form.image-form")[0]),t=$(this).attr("action"),r=$(this).attr("method");$(this)}$.ajax({url:t,type:r,xhr:function(){var e=$.ajaxSettings.xhr();return e.upload&&e.upload.addEventListener("progress",progressHandlingFunction,!1),e},success:function(e){$("img#image-cropper").attr("src","/"+e.url).show(),$("img#image-preview").attr("src","/"+e.url),$('input[name="image-url"]',"form.image-form-update").val(e.url),$("img#image-cropper").Jcrop({onChange:showPreview,onSelect:showPreview,aspectRatio:255/172}),$("input#image","form.image-form").fileinput("reset")},data:a,cache:!1,contentType:!1,processData:!1})}),$("form.image-form-update").on("submit",function(e){e.preventDefault();var a=$(this).serializeArray(),t=$(this).attr("action"),r=$(this).attr("method");$.ajax({url:t,type:r,success:function(e){console.log(e),$('input[name="image"]',"form.form-user-create").val(e.url)},data:a})})});