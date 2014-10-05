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
			<li><a href="{{ URL::to('simposium/admin', $id) }}"  >Dashboard</a></li><!-- onClick='history.back();' -->
			<li><a href="{{ URL::to('simposium/admin/template', $id) }}"  >Template Surat Elektronik</a></li><!-- onClick='history.back();' -->
			<li class="active">Template {{$title}}</li>
		</ol>

		<h3>Template {{$title}}</h3>
		<div class='editor_container'>
			<textarea name="textarea" id = 'jqteText' class="editor">
				{{$text}}
			</textarea>
			<input type='button' id='submit_change' value='Ubah' class="button btn btn-success" style="margin-left: auto; margin-right: auto; display: block "></input>
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
						alert(response);
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