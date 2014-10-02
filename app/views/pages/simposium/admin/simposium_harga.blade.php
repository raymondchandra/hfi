@extends('layouts.simposium_admin')
@section('content')
<script>
	var id = '{{$id}}';
	
	function edit_early(){
		$.ajax({
			type: 'PUT',
			url: '{{URL::route('admin.kegiatan2.ubahEarly',array($id))}}',
			data: {
				tanggal_mulai : $("#datepicker1").val(),
				tanggal_selesai : $("#datepicker2").val(),
			},
			success: function(response){
				if(response == 'success'){
					alert("Berhasil merubah data");
				}else{
					alert(response);
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		},'json');
	}

	function tambahHarga(){
		$("#plusButton").hide();
		var text = '<ul class="hargaTabel">';
		text +='<li><input type="text" id="txtKategori" /></li>';
		text +='<li><input type="text" id="txtEarly" /></li>';
		text +='<li><input type="text" id="txtNormal" /></li>';
		text +='<li><input type="checkbox" id="chkHeader"/></li>';
		text +='<li><input type="button" value="v" id="yesButton"/><input type="button" value="x" id="noButton" /></li>';
		text +='</ul>';

		$('#editRow').html(text);

		$("#yesButton").click(function(){
			var url = '{{URL::route('admin.kegiatan2.tambahHarga',array($id))}}';
			var header;
			if($("#chkHeader").is(':checked')){
				header = 1;
			}else{
				header = 0;
			}
			var input = {
				kategori : $("#txtKategori").val(),
				early : $("#txtEarly").val(),
				normal : $("#txtNormal").val(),
				header : header
			};
			$.post(url,input,function(data){
				if(data=="success"){
					alert('Success menambah data');

					location.reload();
				}else{
					alert(data);
				}
			});
		});

		$("#noButton").click(function(){
			$("#plusButton").show();
			$("#editRow").html('');
		});
	}
	$(document).ready(function(){
		$('body').on('click','.editButton',function(){
			var id = $(this).prev().val();
			$('#rowHarga'+id+' .txtKategori').val($('#rowHarga'+id+' .lblKategori').html());
			$('#rowHarga'+id+' .txtEarly').val($('#rowHarga'+id+' .lblEarly').html());
			$('#rowHarga'+id+' .txtNormal').val($('#rowHarga'+id+' .lblNormal').html());

			if($('#rowHarga'+id+' .frChkHeader').is(':checked')){
				$('#rowHarga'+id+' .bckChkHeader').attr('checked','checked');
			}else{
				$('#rowHarga'+id+' .bckChkHeader').attr('checked',false);
			}

			$('#rowHarga'+id+' .showAll').hide();
			$('#rowHarga'+id+' .hideAll').show();
		});

		$('body').on('click','.delButton',function(){
			var id = $(this).prev().prev().val();
			$.ajax({
				type: 'DELETE',
				url: '{{URL::route('admin.kegiatan2.hapusHarga',array($id))}}',
				data: {id : id},
				success: function(response){
					if(response == 'success'){
						alert("Berhasil menghapus data");
						location.reload();
					}else{
						alert(response);
					}
				},
				error: function(jqXHR, textStatus, errorThrown){
					alert(errorThrown);
				}
			});
		});
		$('body').on('click','.cancelButton',function(){
			var id = $(this).prev().prev().val();
			$('#rowHarga'+id+' .showAll').show();
			$('#rowHarga'+id+' .hideAll').hide();
		});

		$('body').on('click','.okButton',function(){
			var id = $(this).prev().val();

			var header;
			if($('#rowHarga'+id+' .bckChkHeader').is(':checked')){
				header = 1;
			}else{
				header = 0;
			}
			var input = {
				id : id,
				kategori : $('#rowHarga'+id+' .txtKategori').val(),
				early : $('#rowHarga'+id+' .txtEarly').val(),
				normal : $('#rowHarga'+id+' .txtNormal').val(),
				header : header
			};

			$.ajax({
				type: 'PUT',
				url: '{{URL::route('admin.kegiatan2.editHarga',array($id))}}',
				data: input,
				success: function(response){
					if(response == 'success'){
						alert("Berhasil merubah data");
						location.reload();
					}else{
						alert(response);
					}
				},
				error: function(jqXHR, textStatus, errorThrown){
					alert(errorThrown);
				}
			},'json');
		});
	});
	

</script>
<link rel="stylesheet" type="text/css" href="{{asset('assets/js/datetimepicker/jquery.datetimepicker.css')}}"/ >
<script src="{{asset('assets/js/datetimepicker/jquery.datetimepicker.js')}}"></script>
<div class="container_12">
	<div class="grid_12">
		<div class='admin_title'>Harga</div>
		<a href='javascript:void(0)' onClick='history.back();' >Back</a>
		
		<div>
			<h3>Harga</h3>
			<div>

				<ul class="hargaTabel">
					<style type="text/css">
						.hargaTabel li{
							display: inline-block;
						}
					</style>
					<li >Kategori</li>
					<li>Harga Early Bird</li>
					<li>Harga Normal</li>
					<li>Header</li>
					<li></li>
				</ul>
				@if($harga!=null)
				<div >
					@foreach($harga as $harg)
						<div id="rowHarga{{$harg->id}}">
							
						@if($harg->isHeader == 1)
						<ul class="hargaTabel header">
						@else
						<ul class="hargaTabel nonHeader">
						@endif
							<li>
								<span class="showAll lblKategori">{{$harg->kategori}}</span>
								<span class="hideAll"><input type="text" class="txtKategori" /></span>
							</li>
							<li>
								<span class="showAll lblEarly">{{$harg->harga_early}}</span>
								<span class="hideAll"><input type="text" class="txtEarly" /></span>
							</li>
							<li>
								<span class="showAll lblNormal">{{$harg->harga_normal}}</span>
								<span class="hideAll"><input type="text" class="txtNormal" /></span>
							</li>
							<li>
								@if($harg->isHeader == 1)
									<span class="showAll"><input type="checkbox" checked='checked' onclick="return false" class="frChkHeader"/></span>
								@else
									<span class="showAll"><input type="checkbox" onclick="return false" class="frChkHeader"/></span>
								@endif
								
								<span class="hideAll"><input type="checkbox" class ="bckChkHeader"/></span>
							</li>
							<li>
								<span class="showAll"><input type="hidden" value="{{$harg->id}}"><input type="button" value="v" class="editButton"/><input type="button" value="x" class="delButton" /></span>
								<span class="hideAll"><input type="hidden" value="{{$harg->id}}"><input type="button" value="ok" class="okButton"/><input type="button" value="cancel" class="cancelButton" /></span>
							</li>
							<style>.hideAll{display: none;}</style>
							
						</ul>
						</div>
					@endforeach
				</div>
				@else
					asdf
				@endif
				<div id="editRow"></div>
				
				<button onClick="tambahHarga()" id="plusButton">+</button>
				<hr />
				<div>
					<h3>Early Bird</h3>
					<table>
						<tr>
							<td>Tanggal mulai</td>
							<td>:</td>
							<td><input type="text" value="{{$tanggal_mulai}}" id="datepicker1"> </td>
						</tr>
						<tr>
							<td>Tanggal selesai</td>
							<td>:</td>
							<td><input type="text" value="{{$tanggal_selesai}}" id="datepicker2"> </td>
						</tr>
					</table>
					<button onClick="edit_early()">Ubah</button>
				</div>
				<script>
					$('#datepicker1').datetimepicker({
						lang:'en',
						i18n:{
					 		en:{
					   			months:[
								'January','February','March','April',
								'May','June','July','August',
								'September','October','November','December',
					   			],
					   			dayOfWeek:[
								"Sun.", "Mon", "Tue", "Wed", 
								"Thu", "Fri", "Sa.",
					   			]
					  			}
					 		},
					 	timepicker:false,
					 	format:'d-m-Y'
					});
					
					$('#datepicker2').datetimepicker({
					 	lang:'en',
					 	i18n:{
					  		en:{
					   			months:[
								'January','February','March','April',
								'May','June','July','August',
								'September','October','November','December',
					   			],
					   			dayOfWeek:[
								"Sun.", "Mon", "Tue", "Wed", 
								"Thu", "Fri", "Sa.",
					   			]
					  			}
					 		},
					 	timepicker:false,
					 	format:'d-m-Y'
					});
				</script>
			</div>
		</div>
	</div>
</div>
@stop