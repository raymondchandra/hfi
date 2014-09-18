<script>
	var arrIDPengurus = "";
	var arrFILEPATHPengurus = "";
	function getPengurus(){
		$.ajax({
			url: 'admin/organisasi/daftarpengurus',
			type: 'GET',
			success: function(data){					
					if(data=="")
					{
						var list = "<tr>";
						list+="<td>Tidak terdapat pengurus dalam database</td>";
						list+"<td></td>";
						list+="</tr>";
						$('.tabel_list_pengurus').html(list);
					}
					else
					{
						//atur
						var length = data.length;
						var list = "";
						arrIDPengurus = [];
						arrFILEPATHPengurus = [];
						//sementara looping sampe 10 dulu berhubung blom pagination
						if(length>=10){
							length = 10;
						}
						for($i=0; $i<length; $i++){
							arrIDPengurus[$i] = data[$i]['id'];
							arrFILEPATHPengurus[$i] = data[$i]['file_path'];
							list+="<tr>";							
							list+="<td><a href='javascript:void(0)' class='periode_pengurus' value='"+data[$i]['file_path']+"'>"+data[$i]['periode']+"</a></td>";
							list+="<td><p style='display:none;'>"+data[$i]['file_path']+"</p><input type='button' value='x' class='hapus_pengurus'/><input type='hidden' class='id_pengurus' value='"+$i+"'/> </td>";
							list+="</tr>";
						}
						$('.tabel_list_pengurus').html(list);
						//set awal pdf viewer, kalo engga ga bakal bisa refresh pdf viewer
						$('#pdf_viewer_pengurus').attr("data",data['0']['file_path']);
						
					}
			},
			error:function(errorThrown){
				alert(errorThrown);
			}
		});				
	}
	
	$(document).ready(function() {
		getPengurus();
	});
	
	//REDIRECT
	//contoh redirect abis postRegis
	//return Redirect::to('/')->with('message', 'Terima kasih telah melakukan pendaftar, silahkan menyelesaikan administrasi pembayaran. Keterangan lebih lanjut dapat 
			//dilihat pada <a href="/anggota">Anggota</a>');
	//return Redirect::to('/registrasi')->with('message', 'Error')->withErrors('Username telah terdaftar')->withInput();
			
</script>

<div class='admin_title'>Pengurus</div>
<div class='pengurus_container'>
</div>

	<div id='sidelist_pengurus'>
		<div id='list_pengurus'>			
			<table border=0 class="tabel_list_pengurus">								
			</table>
			<script>
				//baru bisa hapus database, blom bisa sampe hapus pdf nya yg ada di folder file_upload
				$('body').on('click','.hapus_pengurus',function(){
					$id = $(this).next().val();
					//alert($id);
					//ajax delete
					$.ajax({
						url: 'admin/organisasi/deletepengurus',
						type: 'DELETE',
						data: {
							'id_pengurus' : arrIDPengurus[$id]
						},
						success: function(data){							
							getPengurus();
							//alert(data);
						},
						error: function(jqXHR, textStatus, errorThrown){
							alert(errorThrown);
						}
					});
				});							
				
			</script>
		</div>		
		<div id='pages' style="display:none;">									
		</div>			
		<div id='unggah_pengurus'>			
			{{ Form::open(array('url' => '/postPengurus', 'files' => true))}}
			<form>
				<!--{{ Form::file('file',array('class'=>'upload_photo','style' => 'margin-top: 20px; display: block; margin-left: auto; margin-right: auto;')) }}-->
				<ul>
					<li style="margin-top:5px;">{{ Form::file('filePeng') }}</li>
					<li style="margin-top:5px;">Periode : {{ Form::text('periode', Input::old('periode'), array('style' => 'width: 200px;')) }}	</li>
						<?php
							// $length = sizeof($arr2);
							// $arrCabang = array();					
							// for($i=0; $i<$length; $i++){
								// $arrCabang[] = $arr2[$i]['nama'];
								// echo var_dump($arrCabang[$i]);
							// }							
						?>				
					<li style="margin-top:5px;">Cabang : {{ Form::select('hficabang', $arr2, Input::old('hficabang'), array('style' => 'width:200px;'))}}</li>
				<!--{{ Form::submit('Unggah Gambar', array('id' => 'submit_change','style' => 'display: block; margin-left: auto; margin-right: auto; margin-top: 20px;')) }}-->				
					<li style="margin-top:5px;">{{ Form::submit('Unggah Pengurus', array('id'=>'tambah_pengurus_button')) }}</li>
				</ul>
			</form>			
			{{ Form::token() }}
			{{ Form::close() }}
			<!--<input type='button' value='Unggah'></input>
			<input type='file' id='upload_file' style="display:none;"></input>-->					
		</div>
	</div>
		
	<div id='preview_pdf_pengurus'>
		<!--<object data="assets/img/Chapter_4.pdf" type="application/pdf" width="100%" id="pdf_viewer_regulasi"></object>-->
		<!--<object data="<?php //echo $arrRegulasi['0']['file_path']?>" type="application/pdf" width="100%" id="pdf_viewer_regulasi"></object>-->
		<object data="" type="application/pdf" width="100%" id="pdf_viewer_pengurus"></object>		
	</div>
	
<script>	
	$('body').on('click','.periode_pengurus',function(){
		var file_path = $(this).attr('value');							
		//$('#pdf_viewer_regulasi').attr("data", file_path).hide().show();
		//$('#pdf_viewer_regulasi').attr("data", file_path);
		$('#preview_pdf_pengurus').html("<object data='"+file_path+"' type='application/pdf' width='100%' id='pdf_viewer_pengurus'></object>");
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