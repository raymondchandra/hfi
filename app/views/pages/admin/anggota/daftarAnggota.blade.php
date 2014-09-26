<script>
	// var arrlist = [];
	// var length_arrlist = arrlist.length;								
	var arrlist;
	var length_arrlist;
	$('body').on('click','#tombol_cari', function(){
			//reset
			// arrlist = [];
			// length_arrlist = arrlist.length;		
		//close accordion
		$( "#accordion" ).accordion( "option", "active", 1 );			
		$nama = $('#cari_nama').val();	
		$penelitian = $('#cari_penelitian').val();
		$gelarPendidikan = $('#cari_gelar_pendidikan').val();
		$lokasiPendidikan = $('#cari_lokasi_pendidikan').val();
		$institusi = $('#cari_institusi').val();
		$surel = $('#cari_surel').val();
		$status = $('#cari_status').val();
		$cabang = $('#cari_cabang').val();
		$jenisKelamin = $('#cari_jenis_kelamin').val();
		$spesialisasi = $('#cari_spesialisasi').val();
		$profesi = $('#cari_profesi').val();						
		$.ajax({						
			url: 'admin/anggota/getDaftarAnggota',
			type: 'GET',
			data: {
				'nama' : $nama,
				'penelitian' : $penelitian,
				'gelarPendidikan' : $gelarPendidikan,
				'lokasiPendidikan' : $lokasiPendidikan,
				'institusi' : $institusi,
				'surel' : $surel,
				'status' : $status,
				'cabang' : $cabang,
				'jenis_kelamin' : $jenisKelamin,
				'spesialisasi' : $spesialisasi,
				'profesi' : $profesi
			},
			success: function(data){							
					//alert("sukses");
					//alert("datalength "+data.length);
				// var arrlist = [];
				// var length_arrlist = arrlist.length;								
				$(".loader").fadeIn(277,function(){});
				arrlist = new Array(data.length);								
				var length = data.length;	
				var header = "<table style='margin-bottom:10px; margin-top:50px;'><td style='vertical-align:middle !important; width:350px; overflow:hidden;'>Nama Anggota</td><td style='vertical-align:middle !important; width:350px; overflow:hidden;'>Nomor Anggota</td><td style='vertical-align:middle !important; width:100px;'>Lihat Detail</td></table><hr></hr>";
				var list="";
				// list+="<tr>";
					// list+="<td>Nama Anggota</td>";
					// list+="<td>Nomor Anggota</td>";
					// list+="<td>Lihat Detail</td>";
				// list+="</tr>";				
				for($i=0; $i<length; $i++){	
						arrlist[$i] = new Array(21);
						//simpan arrlist																		
							arrlist[$i][0] = data[$i]['nama'];
							arrlist[$i][1] = data[$i]['no_anggota'];
							arrlist[$i][2] = data[$i]['tanggal_lahir'];
							arrlist[$i][3] = data[$i]['tempat_lahir'];
							if(data[$i]['gender']==1){
								arrlist[$i][4] = "pria";
							}else{
								arrlist[$i][4] = "wanita";
							}							
							arrlist[$i][5] = data[$i]['tanggal_revisi'];
							arrlist[$i][6] = data[$i]['id_cabang'];			
							arrlist[$i][7] = data[$i]['tema_penelitian'];
							arrlist[$i][8] = data[$i]['spesialisasi'];
							arrlist[$i][9] = data[$i]['profesi'];
							arrlist[$i][10] = data[$i]['institusi'];
							arrlist[$i][11] = data[$i]['alamat'];
							arrlist[$i][12] = data[$i]['kota'];
							arrlist[$i][13] = data[$i]['kodepos'];
							arrlist[$i][14] = data[$i]['negara'];
							arrlist[$i][15] = data[$i]['telepon'];
							arrlist[$i][16] = data[$i]['hp'];
							arrlist[$i][17] = data[$i]['fax'];
							arrlist[$i][18] = data[$i]['email'];
							arrlist[$i][19] = data[$i]['situs'];
							arrlist[$i][20] = data[$i]['keterangan'];
							arrlist[$i][21] = data[$i]['foto_profile'];			
						//end simpan arrlist
					list+="<tr>";
						list+="<td style='vertical-align:middle !important; width:350px; overflow:hidden;'>"+data[$i]['nama']+"</td>";
						list+="<td style='vertical-align:middle !important; width:350px;'>"+data[$i]['no_anggota']+"</td>";
						list+="<td style='vertical-align:middle !important; width:100px;'><input type='hidden' value='"+$i+"'/><input type='button' value='Lihat Detail' class='lihat_detail'/></td>";						
					list+="</tr>";			
				}
				// alert("panjang arrlist setelah dimasukin data "+arrlist.length);
				// alert("panjang arrlist[] setelah dimasukin data "+arrlist[0].length);
				$('.header_tabel_hasil').html(header);
				$('.tabel_hasil').html(list);
				$(".loader").fadeOut(277,function(){});
			},						
			error: function(errorThrown){
				alert("gagal");							
				// alert(errorThrown);
			}
		});							
	});		
	
	$('body').on('click','.lihat_detail',function(){
		$(".pop_up_super_c").fadeIn(277, function(){});
			var idx = $(this).prev().val(); //dapet index
				// alert("index "+idx);
			//set foto profile
				$("#foto_profile").html("<img height='200' width='150' src='"+arrlist[idx][21]+"' alt='foto profile'/>");
			var detailanggota = ""; //isi tabel detail anggota	
				detailanggota+="<tr>";
					detailanggota+="<td style='width:170px;'>Nama</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][0]+"</td>";
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>Nomor Anggota</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][1]+"</td>";
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>Tanggal Lahir</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][2]+"</td>";
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>Tempat Lahir</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][3]+"</td>";								
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>Gender</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][4]+"</td>";								
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>Tanggal Revisi</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][5]+"</td>";								
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>ID Cabang</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][6]+"</td>";								
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>Tema Penelitian</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][7]+"</td>";								
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>Spesialisasi</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][8]+"</td>";								
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>Profesi</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][9]+"</td>";								
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>Institusi</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][10]+"</td>";								
				detailanggota+="</tr>";	
				detailanggota+="<tr>";
					detailanggota+="<td>Alamat</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][11]+"</td>";								
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>Kota</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][12]+"</td>";								
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>Kode Pos</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][13]+"</td>";								
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>Negara</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][14]+"</td>";								
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>Telepon</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][15]+"</td>";								
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>HP</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][16]+"</td>";								
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>Fax</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][17]+"</td>";								
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>Email</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][18]+"</td>";								
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>Situs</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][19]+"</td>";								
				detailanggota+="</tr>";
				detailanggota+="<tr>";
					detailanggota+="<td>Keterangan</td>";
					detailanggota+="<td>:</td>";
					detailanggota+="<td>"+arrlist[idx][20]+"</td>";								
				detailanggota+="</tr>";
		$("#detail_anggota").html(detailanggota);
		$('html').css('overflow-y', 'hidden');
	});
	
	$('.exit').click(function() {$( ".pop_up_super_c" ).fadeOut( 200, function(){});});	
	
	$('.pop_up_super_c').click(function (e)
	{
		var container = $('.pop_up_cell');
		if (container.is(e.target) )// if the target of the click is the container...
		{
			$( ".pop_up_super_c" ).fadeOut( 200, function(){});
			$('html').css('overflow-y', 'auto');
		}
	});
	
	$('body').on('click','#tombol_batal', function(){
		$('#cari_nama').val("");	
		$('#cari_penelitian').val("");
		$('#cari_gelar_pendidikan').val("");
		$('#cari_lokasi_pendidikan').val("");
		$('#cari_institusi').val("");
		$('#cari_surel').val("");
		$('#cari_status').val("");
		$('#cari_cabang').val("");
		$('#cari_jenis_kelamin').val("");
		$('#cari_spesialisasi').val("");
		$('#cari_profesi').val("");		
	});
	
	$(document).ready(function() {
		$(".loader").fadeOut(200, function(){});
		$("#accordion").accordion();				
		$("#accordion").accordion({collapsible:true});	
		$( "#accordion" ).accordion({ animate: 0 });	//set time buat preview awal saja biar preview dari posisi accordion closed
		$( "#accordion" ).accordion({ active: 1 });
		$( "#accordion" ).accordion({ animate: 500 });	//set time ulang delay collapse accordion		
		
		getAllDaftarAnggota();		
	});
	
	function getAllDaftarAnggota()
	{
		$.ajax({
			url : 'admin/anggota/getAllDaftarAnggota',
			type : 'GET',
			success : function(data){
				if(data == ""){
					//alert("tidak ada anggota");
					$(".header_tabel_hasil").html("Database anggota kosong");
				}else{
					$(".loader").fadeIn(277,function(){});
					arrlist = new Array(data.length);								
					var length = data.length;	
					var header = "<table style='margin-bottom:10px; margin-top:50px;'><td style='vertical-align:middle !important; width:350px; overflow:hidden;'>Nama Anggota</td><td style='vertical-align:middle !important; width:350px; overflow:hidden;'>Nomor Anggota</td><td style='vertical-align:middle !important; width:100px;'>Lihat Detail</td></table><hr></hr>";
					var list="";
					// list+="<tr>";
						// list+="<td>Nama Anggota</td>";
						// list+="<td>Nomor Anggota</td>";
						// list+="<td>Lihat Detail</td>";
					// list+="</tr>";				
					for($i=0; $i<length; $i++){	
							arrlist[$i] = new Array(21);
							//simpan arrlist																		
								arrlist[$i][0] = data[$i]['nama'];
								arrlist[$i][1] = data[$i]['no_anggota'];
								arrlist[$i][2] = data[$i]['tanggal_lahir'];
								arrlist[$i][3] = data[$i]['tempat_lahir'];
								if(data[$i]['gender']==1){
									arrlist[$i][4] = "pria";
								}else{
									arrlist[$i][4] = "wanita";
								}							
								arrlist[$i][5] = data[$i]['tanggal_revisi'];
								arrlist[$i][6] = data[$i]['id_cabang'];			
								arrlist[$i][7] = data[$i]['tema_penelitian'];
								arrlist[$i][8] = data[$i]['spesialisasi'];
								arrlist[$i][9] = data[$i]['profesi'];
								arrlist[$i][10] = data[$i]['institusi'];
								arrlist[$i][11] = data[$i]['alamat'];
								arrlist[$i][12] = data[$i]['kota'];
								arrlist[$i][13] = data[$i]['kodepos'];
								arrlist[$i][14] = data[$i]['negara'];
								arrlist[$i][15] = data[$i]['telepon'];
								arrlist[$i][16] = data[$i]['hp'];
								arrlist[$i][17] = data[$i]['fax'];
								arrlist[$i][18] = data[$i]['email'];
								arrlist[$i][19] = data[$i]['situs'];
								arrlist[$i][20] = data[$i]['keterangan'];
								arrlist[$i][21] = data[$i]['foto_profile'];			
							//end simpan arrlist
						list+="<tr>";
							list+="<td style='vertical-align:middle !important; width:350px; overflow:hidden;'>"+data[$i]['nama']+"</td>";
							list+="<td style='vertical-align:middle !important; width:350px;'>"+data[$i]['no_anggota']+"</td>";
							list+="<td style='vertical-align:middle !important; width:100px;'><input type='hidden' value='"+$i+"'/><input type='button' value='Lihat Detail' class='lihat_detail'/></td>";						
						list+="</tr>";			
					}
					// alert("panjang arrlist setelah dimasukin data "+arrlist.length);
					// alert("panjang arrlist[] setelah dimasukin data "+arrlist[0].length);
					$('.header_tabel_hasil').html(header);
					$('.tabel_hasil').html(list);
					$(".loader").fadeOut(200, function(){});
				}				
			},
			error: function(errorThrown){
				alert(errorThrown);
			}
		});
	}
	
	$('body').on('click','#head_accordion',function(){		
		//var collapsible = $( ".selector" ).accordion( "option", "collapsible" );
		//var opened = $("#accordion").find('.ui-state-active').length; //return 0 = kebuka, 1 = ketutup				
		//alert(collapsible);
		//$("#accordion").accordion({ "option", "disabled", false});
		//$("#accordion").accordion({collapsible:true});
		//$("#accordion").accordion("disable");
	});
	
</script>

<div class="container_12">
	<div class="grid_12">
		<div class='admin_title'>Cari Anggota</div>
		<!--ISI CONTENT-->	
		<div class="div_tabel_cari" id="accordion">	
			<h3 id="head_accordion">Cari Anggota</h3>
			<div>
				<table class="tabel_cari" border="0" style="margin-top:30px;">
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td>{{ Form::text('nama', Input::old('nama'), array('id'=>'cari_nama')) }}</td>
					</tr>
					<tr>
						<td>Penelitian</td>
						<td>:</td>
						<td>{{ Form::text('penelitian', Input::old('penelitian'), array('id'=>'cari_penelitian')) }}</td>
					</tr>
					<tr>
						<td>Pendidikan</td>
						<td>:</td>
						<td>
							{{ Form::select('gelarPendidikan', array(
								'SD' => 'SD',
								'SMP' => 'SMP',
								'SMA' => 'SMA',
								'D1' => 'D1',
								'D2' => 'D2',
								'D3' => 'D3',
								'D4' => 'D4',
								'S1' => 'S1',
								'S2' => 'S2',
								'S3' => 'S3',
								'lainnya' => 'Lainnya'
								), Input::old('gelarPendidikan'), array('style' => 'width:50px;', 'id'=>'cari_gelar_pendidikan')) 
							}}
							{{ Form::text('lokasiPendidikan', Input::old('lokasiPendidikan'), array('placeholder' => 'nama institusi pendidikan', 'id'=>'cari_lokasi_pendidikan')) }}
						</td>
					</tr>
					<tr>
						<td>Institusi</td>
						<td>:</td>
						<td>{{ Form::text('institusi', Input::old('institusi'), array('id'=>'cari_institusi')) }}</td>							
					</tr>
					<tr>
						<td>Surat Elektronik</td>
						<td>:</td>
						<td>{{ Form::text('surel', Input::old('surel'), array('id'=>'cari_surel')) }}</td>
					</tr>																								
					<tr>
						<td>Status</td>
						<td>:</td>						
						<td>{{ Form::checkbox('status', 'yes', 'true', array('id'=>'cari_status')) }} Anggota Aktif</td>
					</tr>						
					<tr>
						<td>Cabang</td>
						<td>:</td>
						<td>
							<?php 
								$arr = array('0' => 'pilih!');
								foreach($arr2 as $value){
									$arr[$value] = $value;
								}								
							?>
							{{ Form::select('cabang', $arr, Input::old('cabang'), array( 'id'=>'cari_cabang')) }}
						</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>{{ Form::radio('jeniskelamin','pria', 'true', array('id'=>'cari_jenis_kelamin')) }}pria    {{ Form::radio('jeniskelamin','wanita', '', array('id'=>'cari_jenis_kelamin')) }}wanita</td>			
					</tr>	
					<tr>
						<td>Spesialisasi</td>
						<td>:</td>
						<td>
							{{ Form::select('spesialisasi',array(
								'' => 'pilih!',
								'astro' => 'astro',
								'hayati' => 'hayati',
								'komputasi' => 'komputasi',
								'pendidikan' => 'pendidikan',
								'energi' => 'energi',
								'lingkungan' => 'lingkungan',
								'bumi' => 'bumi',
								'instrumentasi' => 'instrumentasi',
								'material' => 'material',
								'matematika' => 'matematika',
								'medis' => 'medis',
								'nonlinier' => 'non-linier',
								'nuklir' => 'nuklir',
								'parkikel' => 'partikel',
								'lainlain' => 'lain-lain')
									, Input::old('spesialisasi')
									, array('id'=>'cari_spesialisasi'))
							}}</td>			
					</tr>		
					<tr>
						<td>Profesi</td>
						<td>:</td>
						<td>
							{{ Form::select('profesi',array(
								'' => 'pilih!',
								'mahasiswa' => 'mahasiswa',
								'guru' => 'guru',
								'dosen' => 'dosen',
								'peneliti' => 'peneliti',
								'karyawan' => 'karyawan',
								'lainlain' => 'lain-lain')
									, Input::old('profesi')
									, array('id'=>'cari_profesi'))
							}}</td>						
					</tr>
					<tr>
						<td>
							{{ Form::button('Cari', array('id'=>'tombol_cari')) }}
						</td>
						<td>&nbsp;</td>
						<td>{{ Form::button('Batal', array('id'=>'tombol_batal')) }}</td>
					</tr>
				</table>	
			</div>
		</div>
						
		<div class="div_tabel_hasil">
			<!-- header table -->
			<div class="header_tabel_hasil">				
				<?php //if($list_anggota != ""){ ?>
					<!-- <table style='margin-bottom:10px; margin-top:50px;'>
						<td style='vertical-align:middle !important; width:350px; overflow:hidden;'>Nama Anggota</td>
						<td style='vertical-align:middle !important; width:350px; overflow:hidden;'>Nomor Anggota</td>
						<td style='vertical-align:middle !important; width:100px;'>Lihat Detail</td>
					</table>
					<hr></hr> -->
				<?php //} ?>
			</div>
			<table class="tabel_hasil" border="0" style="margin-top:30px;">
				<?php //$list_detail_anggota = array(); ?>
				<?php //if($list_anggota != ""){ ?>				
					<?php 
						// $arrdetail = array();						
						// foreach($list_anggota as $value){
							
						// }
					?>
				<?php //} ?>
			</table>			
		</div>
		<!-- END ISI CONTENT-->
	</div>
</div>
	
<!--pop up lihat detail profile -->
<div class="pop_up_super_c" style="display: none;">
	<a class="exit close_56" ></a>
	<div class="pop_up_tbl">
		<div class="pop_up_cell">
			<div class="container_12">
			<div class="div_detail_anggota" style="background:#fff;">
				<h3>Detail Profil</h3>
				<div class="div_foto_detail_anggota" id="foto_profile"></div>
				<div class="div_tabel_detail_anggota">
					<table class="tabel_detail_anggota" id="detail_anggota" border="0">
					</table>
				</div>
			</div>
			</div>			
		</div>		
	</div>
</div>