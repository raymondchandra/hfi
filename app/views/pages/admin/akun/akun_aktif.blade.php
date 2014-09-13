<script>
	$(document).ready(function(){
		
		var url = '{{URL::route('admin.akun.getBaru')}}';
		$.get(url,function(data){
			var temp = "<tr><td>A</td></tr>";
			$.each(data,function(index, value){
				temp +="<tr>";
				temp +="<td class='nama_cabang'>"+value.username+"</td>";
				temp +="<td class='nama_cabang'>value.username</td>";
				temp +="<td class='nama_cabang'>value.username</td>";
				temp +="<input type='hidden' value ='"+value.id+"' />";
				temp +="<td class='aktivasi'><a href='javascript:void(0)' class='aktivasi_akun'>Aktivasi</a></td>";	
				temp +="</tr>";
			});
			$(".#akun_content").append(temp);
		});
		$( ".loader" ).fadeOut( 200, function(){});
		
	});
</script>
<div class='container_12'>
<div class='grid_12'>
<div class='admin_title'>Akun Aktif</div>
<div class='search_box'>
		<input type='text' placeholder='Cari Username' class='search_box_input'/>
		<a href="javascript:void(0)" class="x_mark" style="display: none;">
		</a>
</div>

<div class='list_legend_akun'>
	<ul>
		<li class="nomor_anggota">
			Nomor Anggota
		</li>
		<li class="username_akun">
			Username
		</li>
		<li class="name_akun">
			Nama
		</li>
		<li class="cabang_akun">
			Nama Cabang
		</li>
		<li class="tanggal_akun">
			Batas Aktif
		</li>
		<li class="command">
			
		</li>
	</ul> 
</div>

<div class="admin_akun_list">
	<ul class="list_akun"> 
		<li>
			<div class="nomor_anggota">
				201422333
			</div>
			<div class="username_akun">
				Muhammad Naufal Ashshiddiq Wangsaadmaja
			</div>
			<div class="name_akun">
				Muhammad Naufal Ashshiddiq
			</div>
			<div class="cabang_akun">
				Jawa Timur - Yogyakarta
			</div>
			<div class="tanggal_akun">
				12-12-2012
			</div>
			<div class='command'>
				<a href="javascript:void(0)" class="akun_aktif_ubahpass_trigger">Reset Password</a>
				<a href="javascript:void(0)" class="akun_aktif_perpanjang_trigger">Perpanjang Masa Aktif</a>
			</div>
		</li>
		<li>
			<div class="nomor_anggota">
				201422333
			</div>
			<div class="username_akun">
				Muhammad Naufal Ashshiddiq Wangsaadmaja
			</div>
			<div class="name_akun">
				Muhammad Naufal Ashshiddiq
			</div>
			<div class="cabang_akun">
				Jawa Timur - Yogyakarta
			</div>
			<div class="tanggal_akun">
				12-12-2012
			</div>
			<div class='command'>
				<a href="javascript:void(0)" class="akun_aktif_ubahpass_trigger">Reset Password</a>
				<a href="javascript:void(0)" class="akun_aktif_perpanjang_trigger">Perpanjang Masa Aktif</a>
			</div>
		</li>
	</ul>
</div>

<!--pop up reset password-->
<div class=" pop_up_super_c akun_aktif_ubahpass_pop" style="display: none;">
	<a class="exit close_56" ></a>
	<div class="pop_up_tbl">
		<div class="pop_up_cell">
			<div class="container_12">			
				<div class="grid_8 push_2 pop_up_container" style="background: #fff; padding: 20px;">
					<h3 style="width: 100%; text-align: center;">
						Ubah Password
					</h3>
					{{ Form::open(array('url' => '', 'files' => true)) }}
						<span class="clear"></span>
							{{ Form::password('newpassword', array('placeholder' => 'password baru','id' => 'newPass', 'style' => 'width: 300px; float: left;line-height: 22px;'), Input::old('newpassword')) }}
						<!-- PENTING! Untuk menghilangka notifikasi error cukup tambahkan kelas 'hide' pada element bersangkutan -->
						<span class="error">
							Panjang password minimal 8 karakter
						</span>
						
						<span class="clear"></span>
						{{ Form::password('retypenewpassword', array('placeholder' => 'Ketik ulang password baru','id' => 'reNewPass', 'style' => 'width: 300px; float: left;line-height: 22px;'), Input::old('retypenewpassword')) }}
						<!-- PENTING! Untuk menghilangka notifikasi error cukup tambahkan kelas 'hide' pada element bersangkutan -->
						<span class="error">
							Maaf password Anda tidak sama!
						</span>
						
						<span class="clear"></span>
						<div style="display: block; position: relative;overflow: hidden;">
							{{ Form::button('Ubah Password', array('id' => 'btnChangePassword')) }}
						</div>
					{{ Form::close() }}
				</div>
			</div>			
		</div>		
	</div>
</div>

<!--pop up perpanjang aktivasi-->
<div class=" pop_up_super_c akun_aktif_perpanjang_pop" style="display: none;">
	<a class="exit close_56" ></a>
	<div class="pop_up_tbl">
		<div class="pop_up_cell">
			<div class="container_12">			
				<div class="grid_4 push_4 pop_up_container" style="background: #fff; padding: 20px;">
					{{ Form::open(array('url' => '', 'files' => true)) }}
							<h3 style="width: 100%; text-align: center;">
								Set Lama Waktu Aktivasi
							</h3>
							<div class="row_label">
							
							{{ Form::select('lama_aktivasi',array(
								'' => 'pilih!',
								'1' => '1 tahun',
								'2' => '2 tahun',
								'3' => '3 tahun',
								'4' => '4 tahun',
								'5' => '5 tahun'), NULL, array('style'=>'width: 200px; margin-left: auto; margin-right: auto; display: block;'))
							}}
							</div>
						<div class="row_label">
							{{Form::submit('Set Waktu Aktif', array('style' => 'display:block; margin-left: auto; margin-right: auto;', 'class' => 'button'));}}
						</div>
						
						
					{{ Form::close() }}
					<style>
						.row_label {
							display: block;
							margin-bottom: 10px;
						}

						.row_label > label {
							display: inline-block;
							width: 100px;
						}

						.area_jqte > .jqte {
							position: relative;
							padding-top: 33px;
						}
						.area_jqte .jqte_toolbar  {
							position: absolute;
							top: 0px;
							width: 100%;
						}
					</style>
					
				</div>
			</div>			
		</div>		
	</div>
</div>

<script>
	/*Script yang digunakan untuk LOADING ANIMATION*/
	
	$('body').on('click','.akun_aktif_ubahpass_trigger',function(){
		$( ".akun_aktif_ubahpass_pop" ).fadeIn( 277, function(){});
	});
	/*external container area exit trigger*/
	$('.exit').click(function() {$( ".pop_up_super_c" ).fadeOut( 200, function(){});});	

	 
	
	$('body').on('click','.akun_aktif_perpanjang_trigger',function(){
		$( ".akun_aktif_perpanjang_pop" ).fadeIn( 277, function(){});
	});
	/*external container area exit trigger*/
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
								
</script>
<script>

	$('.search_box_input').on('input', function() {
		// do something
		if($('.search_box_input').val() == ''){
			$('.x_mark').css('display', 'none');
		}else if($('.search_box_input').val() != ''){
			$('.x_mark').css('display', 'block');
		}
		
	});

	$('.x_mark').on('click', function() {
		$('.search_box_input').val('');
		$(this).css('display', 'none');
	});
</script>	

</div>
</div>

