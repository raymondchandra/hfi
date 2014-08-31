<div class='admin_title'>Regulasi</div>
<div class='regulasi_container'>
</div>

	<div id='sidelist_regulasi'>
		<div id='list_regulasi'>
			<?php
				//echo var_dump($regulations[0]['versi']);
				//echo var_dump($regulations[5]['versi']);									
				$length = sizeof($regulations);				
				//echo $length;
				$arrRegulasi = array();					
				for($i=0; $i<$length; $i++){
					$arrRegulasi[] = $regulations[$i];
				}
				// for($j=0; $j<$length; $j++){
					// echo $arrRegulasi[$j]['versi'];					
					// echo $arrRegulasi[$j]['file_path'];
					// echo "\n";	
					// echo $length;
				// }
				// echo $arrRegulasi['0']['id'];
				// echo $arrRegulasi['1']['id'];
			?>
			<table border=0>				
				<?php for($r=0; $r<10; $r++){ ?>
					<tr>								
						<td id='block_nama_versi'><a href='javascript:void(0)' class='nama_versi' value="<?php echo $arrRegulasi[$r]['file_path']?>">
							<?php echo $arrRegulasi[$r]['versi']?></a>
						</td>
						<td id='block_delete_regulasi'>
							<p class="id_regulasi" style="display:none;"><?php echo $arrRegulasi[$r]['id']?></p>							
							<input class="hapus_regulasi" type='button' value="X"></button>							
						</td>														
					</tr>				
				<?php } ?>
			</table>
		</div>		
		<div id='pages'>						
			
		</div>
			
		<div id='unggah_regulasi'>
			{{ Form::open(array('url' => '/postRegulasi', 'files' => true))}}
			<form>
				<!--{{ Form::file('file',array('class'=>'upload_photo','style' => 'margin-top: 20px; display: block; margin-left: auto; margin-right: auto;')) }}-->
				{{ Form::file('fileReg') }}
				{{ Form::text('versi', Input::old('versi')) }}					
				<!--{{ Form::submit('Unggah Gambar', array('id' => 'submit_change','style' => 'display: block; margin-left: auto; margin-right: auto; margin-top: 20px;')) }}-->				
				{{ Form::submit('Unggah Regulasi') }}				
			</form>			
			{{ Form::token() }}
			{{ Form::close() }}
			<!--<input type='button' value='Unggah'></input>
			<input type='file' id='upload_file' style="display:none;"></input>-->
		</div>
	</div>
		
	<div id='preview_pdf_regulasi'>
		<!--<object data="assets/img/Chapter_4.pdf" type="application/pdf" width="100%" id="pdf_viewer_regulasi"></object>-->
		<object data="<?php echo $arrRegulasi['0']['file_path']?>" type="application/pdf" width="100%" id="pdf_viewer_regulasi"></object>
	</div>
	
<script>
	$('.hapus_regulasi').click(function(){		
		$id = $(this).prev().text();
		//alert($(this).prev().text());
		//ajax delete
		// $.ajax({
			// url: 'admin/organisasi/deletecabang',
			// type: 'DELETE',
			// data: {
				// 'id_cabang' : arrIDCabang[$id]
			// },
			// success: function(data){
				// getCabang();
			// },
			// error:function(jqXHR, textStatus, errorThrown){
				// alert(errorThrown);
			// }		
		// });
	});	
	//$('.editor').jqte();	
	// $('#submit_change').click(function(){		
		// $.ajax({
			// type: 'POST',
			// url: 'admin/postRegulasi',
			// data: {
                // "fileReg": $('.editor').val()
            // },
			// success: function(response){
				// alert(response);
			// },
			// error: function(jqXHR, textStatus, errorThrown){
				// alert(errorThrown);
			// }
		// },'json');
	// });

	$(document).ready(function() {
		$('.nama_versi').click(function(){
			var file_path = $(this).attr('value');				
			//alert($(this).text()); //muncul nama versi
			//alert($(this).attr('value')); //muncul value
			$('#pdf_viewer_regulasi').attr("data", file_path).hide().show();
		});
	});	
</script>
	
	
<script>


// $('#unggah').click(function(){
	// $('#upload_file').click();
// });


	// $(document).ready(function() {
		// $(".tambah_pengurus").click(function(){
			// $(".unggah_form").fadeIn( 277, function(){}).css('display','block').css('z-index','999999');
				// $("body").css('overflow-x','hidden');
				// index_caption = $(this).prev().val();
				// alert(index_caption);
		// });
	// });


	// /*external container area exit trigger*/
	 // $('.pu_close').click(function(){
		 // $( ".pu_c" ).fadeOut( 200, function(){});
		 // $("body").css('overflow-x','visible');
	 // });
	 // $('.pu_c').click(function (e)
		 // {
			 // var container = $('.pu_cell');

			 // if (container.is(e.target) )// if the target of the click is the container...
			 // {
				 // $( ".pu_c" ).fadeOut( 200, function(){});
				 // $("body").css('overflow-x','visible');
			 // }
		 // });						
		 // Slider = $('#slider').Swipe({   <!--swipe ke detect error-->
			 // auto: 3000,  
			 // continuous: true  
		 // }).data('Swipe');  
	 // $('.pu_c').css('display','none');
</script>


	<!--<div id="" class="pu_c unggah_form" style="z-index:99999;position: fixed; display: none; top: 0; left: 0; width: 100%; height: 100%; background:rgba(0,0,0,0.7);">
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
	</div>-->