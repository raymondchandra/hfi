<script>	
	$(".loader").fadeOut(200, function(){});
</script>

<script>
	
</script>

<div class="container_12">
	<div class="grid_12">
		<div class='admin_title'>Cari Anggota</div>
		<!--ISI CONTENT-->	
		<div class="div_tabel_cari">	
			
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
							{{ Form::select('gelar', array(
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
								), Input::old('gelar'), array('style' => 'width:50px;', 'id'=>'cari_gelar')) 
							}}
							{{ Form::text('lulusan', Input::old('lulusan'), array('placeholder' => 'nama institusi pendidikan', 'id'=>'cari_lulusan')) }}
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
						<td>{{ Form::text('suratelektronik', Input::old('suratelektronik'), array('id'=>'cari_suratelektronik')) }}</td>
					</tr>																								
					<tr>
						<td>Status</td>
						<td>:</td>						
						<td>{{ Form::checkbox('anggotaaktif', 'yes', 'true', array('id'=>'cari_anggotaaktif')) }} Anggota Aktif</td>
					</tr>						
					<tr>
						<td>Cabang</td>
						<td>:</td>
						<td>
							{{ Form::select('cabang',array(
								'0' => 'pilih!',
								'astro' => 'astro',
								'hayati' => 'hayati',
								'komputasi' => 'komputasi')
									, Input::old('cabang')
									, array('id'=>'cari_cabang'))
							}}
						</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>{{ Form::radio('jeniskelamin','pria', 'true', array('id'=>'cari_gender')) }}pria    {{ Form::radio('jeniskelamin','wanita', '', array('id'=>'cari_gender')) }}wanita</td>			
					</tr>	
					<tr>
						<td>Spesialisasi</td>
						<td>:</td>
						<td>
							{{ Form::select('spesialisasi',array(
								'0' => 'pilih!',
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
								'0' => 'pilih!',
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
			
			<script>
				$('body').on('click','#tombol_cari', function(){
					
				});		
				
				$('body').on('click','#tombol_batal', function(){
					
				});
			</script>
		</div>
		
		<hr></hr>
		
		<div class="div_tabel_hasil">
			<table class="tabel_hasil" border="0" style="margin-top:30px;">
			</table>
		</div>
		<!-- END ISI CONTENT-->
	</div>
</div>
	
	


