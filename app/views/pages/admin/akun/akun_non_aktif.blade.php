<script>
	var token = 0;
	var activeId = -1;
	function openPopup(id){
		activeId = id;
	}
	
	$(document).ready(function(){
		
		var url = '{{URL::route('admin.akun.getBaru')}}';
		$.get(url,function(data){
			var temp = "";
			var obj = JSON.parse(data);
			$.each(obj,function(index, value){
				temp += '<div class="nomor_anggota">'+value.no_anggota+'</div>';
				temp += '<li><div class="username_akun">'+value.username+'</div>';
				temp += '<div class="name_akun">'+value.nama+'</div>';
				temp += '<div class="cabang_akun">'+value.cabang+'</div>';
				temp += '<div class="tanggal_akun">'+value.batas_aktif+'</div>';
				temp += '<div class="command">';
				temp += '<a href="javascript:void(0)" class="akun_baru_aktivasi_trigger" onClick="openPopup('+index+');">Aktivasi</a>';
				temp += '</div></li>';
			});
			$(".list_akun").html(temp);
			$( ".loader" ).fadeOut( 200, function(){});
		});
		$( ".search_box_input" ).keyup(function() {
			$( ".loader" ).fadeIn( 200, function(){});
			var url = "{{ URL::route('admin.akun.findUsername', ['2']) }}";
			var username = $(".search_box_input").val();
			token++;
			$.get(url+'?username='+username+'&token='+token,function(data){
				var temp = "";
				var obj = JSON.parse(data);
				if(obj.token == token){
					$.each(obj.data,function(index, value){
						temp += '<div class="nomor_anggota">'+value.no_anggota+'</div>';
						temp += '<li><div class="username_akun">'+value.username+'</div>';
						temp += '<div class="name_akun">'+value.nama+'</div>';
						temp += '<div class="cabang_akun">'+value.cabang+'</div>';
						temp += '<div class="tanggal_akun">'+value.batas_akhir+'</div>';
						temp += '<div class="command">';
						temp += '<a href="javascript:void(0)" class="akun_baru_aktivasi_trigger" onClick="openPopup('+index+');">Aktivasi</a>';
						temp += '</div></li>';
					});
					$(".list_akun").html(temp);
					$( ".loader" ).fadeOut( 200, function(){});
				}
				
			});
			
			
		});
	
		$("#activateButton").click(function(){
			var input = {
				id : activeId,
				length : $("#lama_aktivasi").val(),
				newData : "no"
			};
			if(!input.length){
				alert('Masukkan lama aktivasi.');
			}else{
				$.ajax({
					type: 'PUT',
					url: '{{URL::route('admin.activateAccount')}}',
					data: input,
					success: function(data) {
						if(data == 'success'){
							alert("Akun berhasil diaktivasi.");
							$( ".loader" ).fadeIn( 200, function(){});
	 						$('.admin_control_panel').load('admin/akun/nonaktif');
						}
					}
				});
			}
			
			
		});
	});
	
</script>
<div class='container_12'>
<div class='grid_12'>
<div class='admin_title'>Akun Non-aktif</div>
<div class='search_box'>
		<input type='text' placeholder='Cari Username' class='search_box_input' />
		<a href="javascript:void(0)" class="x_mark" style="display: none;">
		</a>
</div>

<!-- add jPages plugin -->
<link rel="stylesheet" href="{{ asset('assets/js/jpages/css/jPages.css') }}">
<script src="{{ asset('assets/js/jpages/js/jPages.min.js') }}"></script>

<div class="holder"></div>
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
			Tanggal berakhir
		</li>
		<li class="command">
			
		</li>
	</ul> 
</div>

<div class="admin_akun_list">
	<ul class="list_akun" id="jpage_list_akun"> 
		
	</ul>
</div>

<div class="holder"></div>
<script>
$(document).ready(function () {
    setTimeout(function(){
	$(function() {
		/* initiate plugin */
		$("div.holder").jPages({
			containerID : "jpage_list_akun",
			perPage : 10
		});
		/* on select change */
		$("select").change(function(){
			/* get new nº of items per page */
		  var newPerPage = parseInt( $(this).val() );
		  /* destroy jPages and initiate plugin again */
		  $("div.holder").jPages("destroy").jPages({
				containerID   : "jpage_list_akun",
				perPage       : newPerPage
			});
		});
	});
    }, 500);
});
</script>


<!--pop up -->
<div class=" pop_up_super_c akun_baru_aktivasi_pop" style="display: none;">
	<a class="exit close_56" ></a>
	<div class="pop_up_tbl">
		<div class="pop_up_cell">
			<div class="container_12">			
				<div class="grid_4 push_4 pop_up_container" style="background: #fff; padding: 20px;">
							<h3 style="width: 100%; text-align: center;">
								Masukkan Lama Waktu Aktivasi
							</h3>
							<div class="row_label">
							
							{{ Form::select('lama_aktivasi',array(
								'' => 'pilih!',
								'1' => '1 tahun',
								'2' => '2 tahun',
								'3' => '3 tahun',
								'4' => '4 tahun',
								'5' => '5 tahun'), NULL, array('style'=>'width: 200px; margin-left: auto; margin-right: auto; display: block;','id'=>'lama_aktivasi'))
							}}
							</div>
						<div class="row_label">
							{{Form::button('Aktivasi Akun', array('style' => 'display:block; margin-left: auto; margin-right: auto;', 'class' => 'button', 'id' => 'activateButton'));}}
						</div>
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
	$('body').on('click','.akun_baru_aktivasi_trigger',function(){
		
		$( ".akun_baru_aktivasi_pop" ).fadeIn( 277, function(){});
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

