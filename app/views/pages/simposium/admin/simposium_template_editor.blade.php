@extends('layouts.simposium_admin')
@section('content')
<script>
var id = '{{$id}}';
</script>

<div class="container_12">
	<div class="grid_12">
		<h1 class=''>{{$nama_kegiatan}}</h1>
		
		<style>
		.breadcrumb li {
			padding-left: 0px;
			margin-left: 0px;
		}
		</style>
		<ol class="breadcrumb">
			<li><a href="{{ URL::to('event/admin', $id) }}"  >@if($simpIct == 3) Beranda  @else @if($simpIct == 4) Dashboard @endif @endif</a></li><!-- onClick='history.back();' -->
			<li><a href="{{ URL::to('event/admin/template', $id) }}"  >@if($simpIct == 3) Template Surat Elektronik @else @if($simpIct == 4) Template Email @endif @endif</a></li><!-- onClick='history.back();' -->
			<li class="active">Template {{$title}}</li>
		</ol>

		<h3>Template {{$title}}</h3>
		<div class='editor_container'>
			<textarea name="textarea" id = 'jqteText' class="editor">
				{{$text}}
			</textarea>
			<input type='button' id='submit_change' value='@if($simpIct == 3) Ubah @else @if($simpIct == 4) Edit @endif @endif ' class="button btn btn-success" style="margin-left: auto; margin-right: auto; display: block "></input>
		</div>
		
		<script>
			$('.editor').jqte();
			
			$('#submit_change').click(function(){
			
				$.ajax({
					type: 'PUT',
					url: '{{URL::route('admin.kegiatan2.update_template')}}',
					data: {
						type : '{{$type}}',
						text : $('.editor').val(),
						id : '{{$id}}'
					},
					success: function(response){
						if(response == "gagal update")
						{
							@if($simpIct == 3) 
	alert('Gagal mengubah data');
@else @if($simpIct == 4)  
	alert('Failed to change data');
@endif @endif 
						}else if(response == "berhasil update"){
@if($simpIct == 3) 
	alert('Berhasil mengubah data');
@else @if($simpIct == 4)  
	alert('Success changing data');
@endif @endif 
						}
					},
					error: function(jqXHR, textStatus, errorThrown){
						alert(errorThrown);
					}
				},'json');

			});
		</script>
	</div>
</div>
@stop