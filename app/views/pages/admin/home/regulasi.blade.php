<script>
	var arrIDRegulasi = "";
	var arrFILEPATHRegulasi = "";
	function getRegulasi(){
		$.ajax({
			url: 'admin/home/daftarregulasi',
			type: 'GET',
			success: function(data){					
					if(data=="")
					{
						var list = "<tr>";
						list+="<td>Tidak terdapat regulasi dalam database</td>";
						list+"<td></td>";
						list+="</tr>";
						$('.tabel_list_regulasi').html(list);
					}
					else
					{
						//atur
						var length = data.length;
						var list = "";
						arrIDRegulasi = [];
						arrFILEPATHRegulasi = [];
						//sementara looping sampe 10 dulu berhubung blom pagination
						if(length>=10){
							length = 10;
						}
						for($i=0; $i<length; $i++){
							arrIDRegulasi[$i] = data[$i]['id'];
							arrFILEPATHRegulasi[$i] = data[$i]['file_path'];
							list+="<tr>";							
							list+="<td><a href='javascript:void(0)' class='versi_regulasi' value='"+data[$i]['file_path']+"'>"+data[$i]['versi']+"</a></td>";
							list+="<td><p style='display:none;'>"+data[$i]['file_path']+"</p><input type='button' value='x' class='hapus_regulasi'/><input type='hidden' class='id_regulasi' value='"+$i+"'/> </td>";
							list+="</tr>";
						}
						$('.tabel_list_regulasi').html(list);
						//set awal pdf viewer, kalo engga ga bakal bisa refresh pdf viewer
						$('#pdf_viewer_regulasi').attr("data",data['0']['file_path']);
						
					}
			},
			error:function(errorThrown){
				alert(errorThrown);
			}
		});				
	}
	
	$(document).ready(function() {
		getRegulasi();
	});
</script>

<div class='admin_title'>Regulasi</div>
<div class='regulasi_container'>
</div>

	<div id='sidelist_regulasi'>
		<div id='list_regulasi'>			
			<table border=0 class="tabel_list_regulasi">								
			</table>
			<script>
				//baru bisa hapus database, blom bisa sampe hapus pdf nya yg ada di folder file_upload
				$('body').on('click','.hapus_regulasi',function(){
					$id = $(this).next().val();
					//ajax delete
					$.ajax({
						url: 'admin/home/deleteregulasi',
						type: 'DELETE',
						data: {
							'id_regulasi' : arrIDRegulasi[$id]
						},
						success: function(data){
							getRegulasi();
						},
						error: function(jqXHR, textStatus, errorThrown){
							alert(errorThrown);
						}
					});
				});
			</script>
		</div>		
		<div id='pages'>									
		</div>			
		<div id='unggah_regulasi'>
			{{ Form::open(array('url' => '/postRegulasi', 'files' => true))}}
			<form>
				<!--{{ Form::file('file',array('class'=>'upload_photo','style' => 'margin-top: 20px; display: block; margin-left: auto; margin-right: auto;')) }}-->
				<ul>
					<li style="margin-top:5px;">{{ Form::file('fileReg') }}</li>
					<li style="margin-top:5px;">Versi : {{ Form::text('versi', Input::old('versi'), array('style' => 'width: 180px;')) }}	</li>
				<!--{{ Form::submit('Unggah Gambar', array('id' => 'submit_change','style' => 'display: block; margin-left: auto; margin-right: auto; margin-top: 20px;')) }}-->				
					<li style="margin-top:5px;">{{ Form::submit('Unggah Regulasi') }}	</li>
				</ul>
			</form>			
			{{ Form::token() }}
			{{ Form::close() }}
			<!--<input type='button' value='Unggah'></input>
			<input type='file' id='upload_file' style="display:none;"></input>-->
		</div>
	</div>
		
	<div id='preview_pdf_regulasi'>
		<!--<object data="assets/img/Chapter_4.pdf" type="application/pdf" width="100%" id="pdf_viewer_regulasi"></object>-->
		<!--<object data="<?php //echo $arrRegulasi['0']['file_path']?>" type="application/pdf" width="100%" id="pdf_viewer_regulasi"></object>-->
		<object data="" type="application/pdf" width="100%" id="pdf_viewer_regulasi"></object>		
	</div>
	
<script>	
	$('body').on('click','.versi_regulasi',function(){
		var file_path = $(this).attr('value');							
		//$('#pdf_viewer_regulasi').attr("data", file_path).hide().show();
		//$('#pdf_viewer_regulasi').attr("data", file_path);
		$('#preview_pdf_regulasi').html("<object data='"+file_path+"' type='application/pdf' width='100%' id='pdf_viewer_regulasi'></object>");
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