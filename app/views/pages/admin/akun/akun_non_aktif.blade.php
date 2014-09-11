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
<div class='admin_title'>Akun Non-aktif</div>
<div class='search_box'>
		<input type='text' placeholder='Cari Username' />
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
				&nbsp;
			</div>
			<div class='command'>
				<a href="javascript:void(0)">Perpanjang Masa Aktif</a>
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
				&nbsp;
			</div>
			<div class='command'>
				<a href="javascript:void(0)">Perpanjang Masa Aktif</a>
			</div>
		</li>
	</ul>
</div>
</div>
</div>
	<!--<table id='akun_content'>
		<tr>
			<td class='nama_cabang'>"+value.username+"</td>
			<td class='nama_cabang'>"+value.username+"</td>
			<td class='nama_cabang'>"+value.username+"</td>
			<input type='hidden' value ='"+value.id+"' />
			<td class='aktivasi'><a href='javascript:void(0)' class='aktivasi_akun'>Aktivasi</a></td>
			</tr>
	</table>-->

