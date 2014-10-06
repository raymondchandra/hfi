<div class="container_12">
	<div class="grid_12">
<script>
	var index_caption = -1;
	
	var imageUpload = "";
	
	//newcode
	var idFotoYangMoDiUpdate;
	var sourcePreviewImage;
	//endnewcode
	
	$(document).ready(function(){
		//$( ".loader" ).fadeOut( 200, function(){});
		$(".loader").fadeOut( 277, function(){});
	});
</script>

<div class='admin_title'>Slideshow</div>
<div class='slide_container' style="margin-left: 0px !important;">
	@if($slideshow == "Failed")		
		<ul>
			<li>
				<div>
					<img src="#" class='slide_image' /> <input type='button' value='Ganti Foto' class='change_photo'/>
				</div>
				<input type='text' class='caption' placeholder='caption 1' />
				<input type='button' class='ok_change' value='Ok' style='display:none;' />
				<input type='hidden' value='0' />
				<input type='button' class='reset_change' value='Reset' style='display:none' />
				<input type='hidden' class='default_val' value='' />
				<a href="javascript:void(0)" class="edit_pp" >
					<p>Perbaharui Foto</p>
					<span class="cam">
					</span>
				</a>
			</li>
			<li>
				<div>
					<img src="#" class='slide_image' /> <input type='button' value='Ganti Foto' class='change_photo'/>
				</div>
				<input type='text' class='caption' placeholder='caption 2' />
				<input type='button' class='ok_change' value='Ok' style='display:none;' />
				<input type='hidden' value='0' />
				<input type='button' class='reset_change' value='Reset' style='display:none' />
				<input type='hidden' class='default_val' value='' />
				<a href="javascript:void(0)" class="edit_pp" >
					<p>Perbaharui Foto</p>
					<span class="cam">
					</span>
				</a>
			</li>
			<li>
				<div>
					<img src="#" class='slide_image' /> <input type='button' value='Ganti Foto' class='change_photo'/>
				</div>
				<input type='text' class='caption' placeholder='caption 3' />
				<input type='button' class='ok_change' value='Ok' style='display:none;' />
				<input type='hidden' value='0' />
				<input type='button' class='reset_change' value='Reset' style='display:none' />
				<input type='hidden' class='default_val' value='' />
				<a href="javascript:void(0)" class="edit_pp" >
					<p>Perbaharui Foto</p>
					<span class="cam">
					</span>
				</a>
			</li>
			<li>
				<div>
					<img src="#" class='slide_image' /> <input type='button' value='Ganti Foto' class='change_photo'/>
				</div>
				<input type='text' class='caption' placeholder='caption 4' />
				<input type='button' class='ok_change' value='Ok' style='display:none;' />
				<input type='hidden' value='0' />
				<input type='button' class='reset_change' value='Reset' style='display:none' />
				<input type='hidden' class='default_val' value='' />
				<a href="javascript:void(0)" class="edit_pp" >
					<p>Perbaharui Foto</p>
					<span class="cam">
					</span>
				</a>
			</li>
			<li>
				<div>
					<img src="#" class='slide_image' /> <input type='button' value='Ganti Foto' class='change_photo'/>
				</div>
				<input type='text' class='caption' placeholder='caption 5' />
				<input type='button' class='ok_change' value='Ok' style='display:none;' />
				<input type='hidden' value='0' />
				<input type='button' class='reset_change' value='Reset' style='display:none' />
				<input type='hidden' class='default_val' value='' />
				<a href="javascript:void(0)" class="edit_pp" >
					<p>Perbaharui Foto</p>
					<span class="cam">
					</span>
				</a>
			</li>
	@else
		<ul>
			<?php											
				$length = count($slideshow);					
				$view="";
				for($i=0;$i<$length;$i++){
					$view.="
						<li>
							<div>
								<img src='".$slideshow[$i]['file_path']."' class='slide_image' /> <input type='button' value='Ganti Foto' class='change_photo'/>
							</div>
							<input type='text' class='caption' value='".$slideshow[$i]['kapsion']."' placeholder='caption ".($i+1)."' />
							<input type='button' class='ok_change' value='Ok' style='display:none;' />
							<input type='hidden' value='".$slideshow[$i]['id']."' />
							<input type='button' class='reset_change' value='Reset' style='display:none' />
							<input type='hidden' class='default_val' value='".$slideshow[$i]['kapsion']."' />
							<a href='javascript:void(0)' class='edit_pp' >
								<p>Perbaharui Foto</p>
								<span class='cam'>
								</span>
							</a>							
							<input type='hidden' value='".$slideshow[$i]['file_path']."' />
						</li>
					";
				}
				if($length<5){
					$sisa = 5-$length;
					$temp = $length+1;
					for($i=0;$i<$sisa;$i++){
						$view.="
							<li>
								<div>
									<img src='#' class='slide_image' /> <input type='button' value='Ganti Foto' class='change_photo'/>
								</div>
								<input type='text' class='caption' placeholder='caption ".$temp."' />
								<input type='button' class='ok_change' value='Ok' style='display:none;' />
								<input type='hidden' value='0' />
								<input type='button' class='reset_change' value='Reset' style='display:none' />
								<input type='hidden' class='default_val' value='' />
								<a href='javascript:void(0)' class='edit_pp' >
									<p>Perbaharui Foto</p>
									<span class='cam'>
									</span>
								</a>								
							</li>
							<input type='hidden' value='' />
						";
						$temp++;
					}
				}
				echo $view;
			?>
		</ul>
	@endif
	
</div>

	<div id="" class="pu_c photo_edit" style="z-index:99999;position: fixed; display: none; top: 0; left: 0; width: 100%; height: 100%; background:rgba(0,0,0,0.7);">
		<div class="tableed">
			<div class="celled pu_cell" style="">
				<div class="container_12" style="position: relative;">
					<span class="close_56 pu_close" style="right: 185px;">
					</span>
					<div class="grid_8 push_2">
						
						<div class="change_pp_container">
							<div class="saran_43">
								Disarankan Anda mengunggah foto dengan rasio 
								
								<span style="display: block; margin-left: auto; margin-right: auto; font-size: 24px;">4:3</span> 
								
							</div>					
								<form class="update_foto_slideshow">
									{{ Form::file('filePhoto',array('name'=>'photo','id'=>'filePhoto','class'=>'upload_photo','accept'=>"image/*" ,'style' => 'margin-top: 20px; display: block; margin-left: auto; margin-right: auto;')) }}
									<input type='hidden' class='photo_id' name='id_photo' />
									{{ Form::submit('Unggah Gambar', array('class' => 'btn btn-success', 'id'=> 'button_upload_foto', 'style' => 'display: block; margin-left: auto; margin-right: auto; margin-top: 20px;')) }}								
								</form>
								<!--<input type='file' class='upload_photo' multiple="false" style="margin-top: '20px'; display: 'block'; margin-left: 'auto'; margin-right: 'auto';" />
								<input type='button' class='button_upload_foto' value='Unggah Gambar' style="display: 'block'; margin-left: 'auto'; margin-right: 'auto'; margin-top: '20px';">-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	


<script>

$('.caption').keyup(function(){
	$(this).next().removeAttr('style');
	$(this).siblings('.reset_change').removeAttr('style');
});

$('body').on('change','.upload_photo',function(){
	var i = 0, len = this.files.length, img, reader, file;
	
		//document.getElementById("images").disabled = true;
	for ( ; i < len; i++ ) {
		file = this.files[i];
		if (!!file.type.match(/image.*/)) {
			if ( window.FileReader ) {
				reader = new FileReader();
				reader.onloadend = function (e) { 
					showUploadedItem(e.target.result, file.fileName);
				};
				reader.readAsDataURL(file);
			}
			imageUpload = file;
		}	
	}
});

//post edit foto slide
jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});
$(".update_foto_slideshow").validate({
	rules: {
		filePhoto :{
			required : true
		}
	}, messages : {
		filePhoto : {
			required : "Mohon isi file foto"
		}
	},
	submitHandler:function(form){		
		var data, xhr;
		data = new FormData();						
		data.append('filePhoto', $('#filePhoto')[0].files[0]);	
		data.append('id_photo', idFotoYangMoDiUpdate);
		$.ajax({
			url: 'admin/editSlideShow',
			type: 'POST',
			data: data,
			processData: false,
			contentType: false,					
			success: function(as){			
				if (as=="success") { 
					alert('Sukses mengubah gambar.');
				}else if(as == "failed"){
					alert('Gagal mengubah gambar.');
				}else{
					alert(as);
				}
				$(".loader").fadeIn( 377, function(){});	
				$( ".pu_c" ).fadeOut( 200, function(){});
				$('.admin_control_panel').load('admin/home/slide');	
											
				//$(".loader").fadeOut( 377, function(){
					// alert("Berhasil Update Foto Slideshow");												
				//});																		
			},
			error:function(errorThrown){
				alert("Gagal Update Foto Slideshow");
				//alert(errorThrown);
			}
		});
	}
});

// $('body').on('click','.button_upload_foto',function(){
	// var data = new FormData();
	// data.append('id', index_caption);
	// data.append('image', imageUpload);
	// $.ajax({
		// type: 'PUT',
		// url: 'admin/editSlideShow',
		// /*data: {
			// 'id' : index_caption,
			// 'image':imageUpload
		// },*/
		// data : data,
		// processData: false,
		// success: function(response){
			// alert(response.id);
			// $('.slide_container').text(response);
		// },
		// error: function(jqXHR, textStatus, errorThrown){
			// alert(errorThrown);
		// }
	// });
// });

$('body').on('click','.reset_change',function(){
	$(this).siblings('.caption').val($(this).next().val());
	$(this).css('display','none');
	$(this).siblings('.ok_change').css('display','none');
});

function showUploadedItem (source) {
	var image = "<img src='"+source+"' width=400 height=300 />"
	$('.saran_43').html(image);
} 

$('.ok_change').click(function(){
	$(this).css('display','none');
	$(this).siblings('.reset_change').css('display','none');
	$(this).siblings('.default_val').val($(this).prev().val());
	var text = $(this).prev();
	$.ajax({
		type: 'PUT',
		url: 'admin/editCaption',
		data: {
			"caption":$(this).prev().val(),
			"idCaption":$(this).next().val()
        },
		success: function(response){
			if(response==1){
				alert("Sukses mengubah caption.");
			}
			else if(response==2){
				alert("Tidak ada gambar.");
				text.val("");
			}
			
			//pop up
			//$('#sesuatu').fadeIn( 277, function(){});
			//$('#message_pop').text('Sukses');
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert(errorThrown);
		}
	},'json');

});

//$('body').on('mouseenter','.slide_image',function(){
//	$('.change_photo').fadeIn(10);
//});

//$('body').on('mouseleave','.slide_image',function(){
//	$('.change_photo').fadeOut(100);
//});
</script>

<script type="text/javascript">
	$(document).ready(function() {	
		$( ".loader" ).fadeOut( 200, function(){});
	
		$(".edit_pp").click(function() {
			//newcode ---> buat dapetin id foto yang mo diupdate
			idFotoYangMoDiUpdate = $(this).prev().prev().prev().val();			
			sourcePreviewImage = $(this).next().val();				
			//endnewcode
			$(".photo_edit").fadeIn( 277, function(){}).css('display','block').css('z-index','999999');
			$("body").css('overflow-x','hidden');
			index_caption = $(this).prev().val();
			//alert(index_caption);
			$('.photo_id').val(index_caption);
			
			//newcode
			$('#filePhoto').val("");
			$('.saran_43').html("<img src='"+sourcePreviewImage+"' width=400 height=300 />");
			//endnewcode
			
			//ajax
			
		});
		
		
		
		
	});
	
	/*external container area exit trigger*/
	 $('.pu_close').click(function(){
		 $( ".pu_c" ).fadeOut( 200, function(){});
		 $("body").css('overflow-x','visible');
	 });
	 $('.pu_c').click(function (e)
		 {
			 var container = $('.pu_cell');

			 if (container.is(e.target) )// if the target of the click is the container...
			 {
				 $( ".pu_c" ).fadeOut( 200, function(){});
				 $("body").css('overflow-x','visible');
			 }
		 });						
		/* Slider = $('#slider').Swipe({   <!--swipe ke detect error-->
			 auto: 3000,  
			 continuous: true  
		 }).data('Swipe');  */
	 $('.pu_c').css('display','none');
								
</script>

<!--<div id="" class="pu_c loader" style="z-index: 999999; position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; display: block; ">
	<div class="tableed">
		<div class="celled pu_cell" style="">
			<div class="container_12" style="position: relative;">
				<span class="loading_animation" style="background-color: rgba(0, 0, 0, 0.701961);">
				</span>
			</div>
		</div>
	</div>
</div>--> 
	</div>
</div>