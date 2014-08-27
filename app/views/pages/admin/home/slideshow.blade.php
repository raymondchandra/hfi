<div class='admin_title'>Slideshow</div>

<div class='slide_container'>
	<ul>
		<li>
			<div>
				<img src="#" class='slide_image' /> <input type='button' value='Ganti Foto' class='change_photo'/>
			</div>
			<input type='text' class='caption' placeholder='caption 1' />
			<!--<input type='submit' class='ok_change' value='Ok' style='display:none;' />-->
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
			<!--<input type='submit' class='ok_change' value='Ok' style='display:none;' />-->
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
			<!--<input type='submit' class='ok_change' value='Ok' style='display:none;' />-->
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
			<!--<input type='submit' class='ok_change' value='Ok' style='display:none;' />-->
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
			<!--<input type='submit' class='ok_change' value='Ok' style='display:none;' />-->
			<a href="javascript:void(0)" class="edit_pp" >
				<p>Perbaharui Foto</p>
				<span class="cam">
				</span>
			</a>
		</li>
	</ul>
</div>

	<div id="" class="pu_c" style="z-index:99999;position: fixed; display: none; top: 0; left: 0; width: 100%; height: 100%; background:rgba(0,0,0,0.7);">
		<div class="tableed">
			<div class="celled pu_cell" style="">
				<div class="container_12" style="position: relative;">
					<span class="close_56 pu_close" style="right: 185px;">
					</span>
					<div class="grid_6 push_3">
						
						<div class="change_pp_container">
							<div class="saran_34">
								Disarankan Anda mengunggah foto dengan dimensi 
								
								<span style="display: block; margin-left: auto; margin-right: auto; font-size: 24px;">3 X 4</span> 
								
								(Passphoto)
							</div>
							<form>
								{{ Form::file('file',array('style' => 'margin-top: 20px; display: block; margin-left: auto; margin-right: auto;')) }}
								{{ Form::submit('Unggah Gambar', array('style' => 'display: block; margin-left: auto; margin-right: auto; margin-top: 20px;')) }}
							</form>
						</div>
					
					</div>
				</div>
			</div>
		</div>
	</div>	


<script>

$('.caption').keyup(function(){
	$(this).next().removeAttr('style');
});

$('.ok_change').click(function(){
	$(this).css('display','none');
	alert($(this).prev().val());
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
		$(".edit_pp").click(function() {
			$(".pu_c").fadeIn( 277, function(){}).css('display','block').css('z-index','999999');
			$("body").css('overflow-x','hidden');
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

<div id="" class="pu_c" style="z-index: 999999; position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; display: block; background: rgba(0, 0, 0, 0.701961);">
	<div class="tableed">
		<div class="celled pu_cell" style="">
			<div class="container_12" style="position: relative;">
				<span class="loading_animation">
				</span>
			</div>
		</div>
	</div>
</div> 