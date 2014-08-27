<div class='admin_title'>Pengurus</div>
<div class='pengurus_container'>
</div>

	<div id='sidelist_pengurus'>
		<div id='list_pengurus'>
			<ul>
				<li><a href='javascript:void(0)'>List1</a>  <input type='button' id='delete_pengurus' value="X"></button></li>
				<li><a href='javascript:void(0)'>List2</a>  <input type='button' id='delete_pengurus' value="X"></button></li>
				<li><a href='javascript:void(0)'>List3</a>  <input type='button' id='delete_pengurus' value="X"></button></li>
				<li><a href='javascript:void(0)'>List4</a>  <input type='button' id='delete_pengurus' value="X"></button></li>
				<li><a href='javascript:void(0)'>List5</a>  <input type='button' id='delete_pengurus' value="X"></button></li>
				<li><a href='javascript:void(0)'>List6</a>  <input type='button' id='delete_pengurus' value="X"></button></li>
				<li><a href='javascript:void(0)'>List7</a>  <input type='button' id='delete_pengurus' value="X"></button></li>
				<li><a href='javascript:void(0)'>List8</a>  <input type='button' id='delete_pengurus' value="X"></button></li>
				<li><a href='javascript:void(0)'>List9</a>  <input type='button' id='delete_pengurus' value="X"></button></li>
				<li><a href='javascript:void(0)'>List10</a> <input type='button' id='delete_pengurus' value="X"></button></li>
			</ul>					
			
		</div>
		<div id='unggah_pengurus'>
			<input class='tambah_pengurus' type='button' value='Unggah'></input>
			<input type='file' id='upload_file' style="display:none;"></input>
		</div>
	</div>
		
	<div id='preview_pdf_pengurus'>
		<object data="assets/img/Chapter_4.pdf" type="application/pdf" width="100%" id="pdf_viewer_pengurus"></object>
	</div>



<script>
$('#unggah').click(function(){
	$('#upload_file').click();
});


	$(document).ready(function() {
		$(".tambah_pengurus").click(function(){
			$(".unggah_form").fadeIn( 277, function(){}).css('display','block').css('z-index','999999');
				$("body").css('overflow-x','hidden');
				index_caption = $(this).prev().val();
				alert(index_caption);
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
		 Slider = $('#slider').Swipe({   <!--swipe ke detect error-->
			 auto: 3000,  
			 continuous: true  
		 }).data('Swipe');  
	 $('.pu_c').css('display','none');
</script>


	<div id="" class="pu_c unggah_form" style="z-index:99999;position: fixed; display: none; top: 0; left: 0; width: 100%; height: 100%; background:rgba(0,0,0,0.7);">
		<div class="tableed">
			<div class="celled pu_cell" style="">
				<div class="container_12" style="position: relative;">
					<span class="close_56 pu_close" style="right: 185px;">
					</span>
					<div class="grid_6 push_3">						
						<div class="change_pp_container">							
							<form>
								{{ Form::file('file',array('class'=>'upload_photo','style' => 'margin-top: 20px; display: block; margin-left: auto; margin-right: auto;')) }}
								{{ Form::submit('Unggah Gambar', array('style' => 'display: block; margin-left: auto; margin-right: auto; margin-top: 20px;')) }}
							</form>
						</div>
					
					</div>
				</div>
			</div>
		</div>
	</div>