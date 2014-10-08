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
				@if($simpIct == 3) 
	alert('Berhasil mengubah data');
@else @if($simpIct == 4)  
	alert('Success changing data');
@endif @endif 
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
@if($simpIct == 3) 
text +='		<th>Kategori</th>';
text +='		<th>Harga Early Bird</th>';
text +='		<th>Harga Normal</th>';
text +='		<th>Header</th>';
@else @if($simpIct == 4)  
text +='		<th>Category</th>';
text +='		<th>Early Bird Rate</th>';
text +='		<th>Normal Rate</th>';
text +='		<th>Header</th>';
@endif @endif 


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

@if($simpIct == 3) 
text +='			<input id="noButton" type="button" value="Batal" class="btn btn-danger btn-sm" />';	
@else @if($simpIct == 4)  
text +='			<input id="noButton" type="button" value="Cancel" class="btn btn-danger btn-sm" />';
@endif @endif 

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
				@if($simpIct == 3) 
	alert('Berhasil menambah data');
@else @if($simpIct == 4)  
	alert('Success adding data');
@endif @endif 

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
					@if($simpIct == 3) 
	alert('Berhasil menghapus data');
@else @if($simpIct == 4)  
	alert('Success deleting data');
@endif @endif 
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
					@if($simpIct == 3) 
	alert('Berhasil mengubah data');
@else @if($simpIct == 4)  
	alert('Success changing data');
@endif @endif 
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
		<h1 class=''>{{$kegiatan->nama}}</h1>
		<style>
			.breadcrumb li {
				padding-left: 0px;
				margin-left: 0px;
			}
		</style>
		<ol class="breadcrumb">
			<li><a href="{{ URL::to('event/admin', $id) }}"  >@if($simpIct == 3) Beranda @else @if($simpIct == 4) Dashboard @endif @endif</a></li>
			<li class="active">@if($simpIct == 3) Harga @else @if($simpIct == 4) Price @endif @endif</li>
		</ol>
		
		
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
					@if($simpIct == 3) 
	<th>Kategori</th>
					<th>Harga Early Bird</th>
					<th>Harga Normal</th>
@else @if($simpIct == 4)  
<th>Category</th>
					<th>Early Bird Rate</th>
					<th>Normal Rate</th>
@endif @endif 
					
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
								@if($simpIct == 3) 
	<span class="showAll"><input type="hidden" value="{{$harg->id}}"><input type="button" value="Ubah" class="editButton btn btn-warning btn-sm" style="margin-right: 10px;"/><input type="button" value="Hapus" class="delButton btn btn-danger btn-sm" /></span>
								<span class="hideAll"><input type="hidden" value="{{$harg->id}}"><input type="button" value="OK" class="okButton btn btn-success btn-sm" style="margin-right: 10px;"/><input type="button" value="Batal" class="cancelButton btn btn-danger btn-sm" /></span>
							
@else @if($simpIct == 4)  
<span class="showAll"><input type="hidden" value="{{$harg->id}}"><input type="button" value="Edit" class="editButton btn btn-warning btn-sm" style="margin-right: 10px;"/><input type="button" value="Delete" class="delButton btn btn-danger btn-sm" /></span>
								<span class="hideAll"><input type="hidden" value="{{$harg->id}}"><input type="button" value="OK" class="okButton btn btn-success btn-sm" style="margin-right: 10px;"/><input type="button" value="Cancel" class="cancelButton btn btn-danger btn-sm" /></span>
							
@endif @endif 
								</td>
							<style>.hideAll{display: none;}</style>
							
						<!--</ul>-->
						</tr>
					<!-- </div> -->
					<!-- </tbody> -->
					@endforeach
				@else
				
				@endif

			</table>

			<div id="editRow"></div>

			<button onClick="tambahHarga()" id="plusButton" class="btn btn-primary">@if($simpIct == 3) Tambah Harga @else @if($simpIct == 4) Add Price @endif @endif </button>











			<span class="clearfix"></span>	
			<hr/>
			<div>
				<h3>Early Bird</h3>
				<table class="table table-bordered" style="width:400px;">
					<tr>
						<td>@if($simpIct == 3) Tanggal Mulai  @else @if($simpIct == 4) Start Date @endif @endif </td>
						<td><input type="text" value="{{$tanggal_mulai}}" id="datepicker1" class="form-control"> </td>
					</tr>
					<tr>
						<td>@if($simpIct == 3) Tanggal Selesai @else @if($simpIct == 4) End Date @endif @endif </td>
						<td><input type="text" value="{{$tanggal_selesai}}" id="datepicker2" class="form-control"> </td>
					</tr>
				</table>
				<button onClick="edit_early()" class="btn btn-primary">@if($simpIct == 3) Ubah @else @if($simpIct == 4) Edit @endif @endif </button>
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