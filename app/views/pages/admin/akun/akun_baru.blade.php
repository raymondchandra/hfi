<script>
	$(document).ready(function(){
		
		var url = '{{URL::route('admin.akun.getBaru')}}';
		$.get(url,function(data){
			var temp = "";
			$.each(data,function(index, value){
				temp +="<tr>";
				temp +="<td class='username'>"+value.username+"</td>";
				temp +="<td class='nama'>"+value.username+"</td>";
				temp +="<td class='cabang'>"+value.username+"</td>";
				temp +="<input type='hidden' value ='"+value.id+"' />";
				temp +="<td class='aktivasi'><a href='javascript:void(0)' class='aktivasi_akun'>Aktivasi</a></td>";	
				temp +="</tr>";
			});
			$("#akun_content").append(temp);
		});
		$( ".loader" ).fadeOut( 200, function(){});
		
	});
</script>

<div class='admin_title'>Akun Baru</div>
<div class='search_box'>
		<input type='text' placeholder='Cari Username' />
</div>
<div class='list_akun_container'>
	<table id='akun_content'>
			<tr> 
				<td class='username'>Username</td>
				<td class='nama'>Nama</td>
				<td class='cabang'>Cabang</td>
				<td class='aktivasi'>Aktivasi</td>
			</tr>
		
	</table>

</div>
