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
	/*var text = '<ul class="hargaTabel">';
	text +='<li><input type="text" id="txtKategori" /></li>';
	text +='<li><input type="text" id="txtEarly" /></li>';
	text +='<li><input type="text" id="txtNormal" /></li>';
	text +='<li><input type="checkbox" id="chkHeader"/></li>';
	text +='<li><input type="button" value="v" id="yesButton"/><input type="button" value="x" id="noButton" /></li>';
	text +='</ul>';*/

var text =' <table class="table table-bordered"> ';
text +='<thead>';
text +='	<tr>';
text +='		<th>Kategori</th>';
text +='		<th>Harga Early Bird</th>';
text +='		<th>Harga Normal</th>';
text +='		<th>Header</th>';
text +='		<th></th>';
text +='	</tr>';
text +='</thead>';
text +='<tbody>';
text +='	<tr class="hargaTabel">';
text +='		<td>';
text +='			<input type="text" id="txtKategori" />';
text +='		</td>';
text +='		<td>';
text +='			<input type="text" id="txtEarly" />';
text +='		</td>';
text +='		<td>';
text +='			<input type="text" id="txtNormal" />';
text +='		</td>';
text +='		<td>';
text +='			<input type="checkbox" id="chkHeader"/>';
text +='		</td>';
text +='		<td>';
text +='			<input id="yesButton" type="button" value="OK" class="btn btn-success btn-sm" style="margin-right: 10px;"/>';
text +='			<input id="noButton" type="button" value="cancel" class="btn btn-danger btn-sm" />';
text +='		</td>';
text +='	</ul>';
text +='	</tr>';
text +='</tbody>';
text +='</table>';




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
		<div class='admin_title'>{{$kegiatan->nama}}</div>
		<a href='javascript:void(0)' onClick='history.back();' >Back</a>
		
		
		<h3>Harga</h3>

		<table class="table table-bordered table-hover">
			<!-- <ul class="hargaTabel">
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
			</ul>-->

			<thead>
				<tr class="hargaTabel">
					<th>Kategori</th>
					<th>Harga Early Bird</th>
					<th>Harga Normal</th>
					<th width="70">Header</th>
					<th width="140"></th>
				</tr>
			</thead>

			@if($harga!=null)
				@foreach($harga as $harg)
				<!-- <div id="rowHarga{{$harg->id}}"> -->
				<!--<tbody  id="rowHarga{{$harg->id}}"> -->
					@if($harg->isHeader == 1)
					<!-- <ul class="hargaTabel header"> -->
					<tr class="hargaTabel header info" id="rowHarga{{$harg->id}}">
					@else
					<tr class="hargaTabel nonHeader" id="rowHarga{{$harg->id}}">
					@endif
							<td>
								<span class="showAll lblKategori">{{$harg->kategori}}</span>
								<span class="hideAll"><input type="text" class="txtKategori" /></span>
							</td>
							<td>
								<span class="showAll lblEarly">{{$harg->harga_early}}</span>
								<span class="hideAll"><input type="text" class="txtEarly" /></span>
							</td>
							<td>
								<span class="showAll lblNormal">{{$harg->harga_normal}}</span>
								<span class="hideAll"><input type="text" class="txtNormal" /></span>
							</td>
							<td>
								@if($harg->isHeader == 1)
								<span class="showAll"><input type="checkbox" checked='checked' onclick="return false" class="frChkHeader"/></span>
								@else
								<span class="showAll"><input type="checkbox" onclick="return false" class="frChkHeader"/></span>
								@endif
								
								<span class="hideAll"><input type="checkbox" class ="bckChkHeader"/></span>
							</td>
							<td>
								<span class="showAll"><input type="hidden" value="{{$harg->id}}"><input type="button" value="Edit" class="editButton btn btn-warning btn-sm" style="margin-right: 10px;"/><input type="button" value="Delete" class="delButton btn btn-danger btn-sm" /></span>
								<span class="hideAll"><input type="hidden" value="{{$harg->id}}"><input type="button" value="OK" class="okButton btn btn-success btn-sm" style="margin-right: 10px;"/><input type="button" value="cancel" class="cancelButton btn btn-danger btn-sm" /></span>
							</td>
							<style>.hideAll{display: none;}</style>
							
						<!--</ul>-->
						</tr>
					<!-- </div> -->
					<!-- </tbody> -->
					@endforeach
				@else
				asdf
				@endif

			</table>

			<div id="editRow"></div>

			<button onClick="tambahHarga()" id="plusButton" class="btn btn-primary">Tambah Harga</button>











			<span class="clearfix"></span>	
			<hr/>
			<div>
				<h3>Early Bird</h3>
				<table class="table table-bordered" style="width:400px;">
					<tr>
						<td>Tanggal mulai</td>
						<td><input type="text" value="{{$tanggal_mulai}}" id="datepicker1" class="form-control"> </td>
					</tr>
					<tr>
						<td>Tanggal selesai</td>
						<td><input type="text" value="{{$tanggal_selesai}}" id="datepicker2" class="form-control"> </td>
					</tr>
				</table>
				<button onClick="edit_early()" class="btn btn-primary">Ubah</button>
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
	@stop