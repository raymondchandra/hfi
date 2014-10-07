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
		@if($simpIct == 3)
			<p>
			*Dalam membuat template, Anda dapat merubah beberapa konten secara dinamis(misal : *nama* akan diganti menjadi nama peserta yang menerima email)
			</p>
			<p>
				Berikut adalah kode-kode yang dapat digunakan :
				<ul>
					<li>*nama* menjadi nama peserta</li>
					<li>*email* menjadi email peserta</li>
					<li>*username* menjadi username peserta</li>
					<li>*institusi* menjadi institusi peserta</li>
					<li>*pekerjaan* menjadi pekerjaan peserta</li>
					<li>*alamat* menjadi alamat peserta</li>
					<li>*status* menjadi status peserta</li>
					<li>*abstrak* menjadi abstrak peserta</li>
					<li>*spesialisasi* menjadi spesialisasi peserta</li>
					<li>*paper* menjadi judul makalah peserta</li>
					
					<li>*nama_kegiatan* menjadi nama kegiatan</li>
					<li>*tempat_kegiatan* menjadi tempat kegiatan</li>
					<li>*kegiatan_mulai* menjadi waktu mulai kegiatan</li>
					<li>*kegiatan_selesai* menjadi waktu selesai kegiatan</li>
				</ul>
			</p>
			<p>
				*Harap diperhatikan unsur penulisan kode, kesalahan penulisan kode menyebabkan kode tidak dapat diterjemahkan oleh sistem.
			</p>
		@else
			@if($simpIct == 4)
				<p>
					*In making a template, you can change some content dynamically(e.g. : *nama* will be changed to the name of the participants who received the email)
				</p>
				<p>
					Here are the codes that can be used :
					<ul>
						<li>*nama* will be a participant name</li>
						<li>*email* will be a participant email</li>
						<li>*username* will be a participant username</li>
						<li>*institusi* will be a participant institution</li>
						<li>*pekerjaan* will be a participant occupation</li>
						<li>*alamat* will be a participant address</li>
						<li>*status* will be a participant status</li>
						<li>*abstrak* will be a participant abstract</li>
						<li>*spesialisasi* mwill be a participant specialization</li>
						<li>*paper* will be a participant paper title</li>
						
						<li>*nama_kegiatan* will be the name of the activity</li>
						<li>*tempat_kegiatan* will be the place of the activity</li>
						<li>*kegiatan_mulai* will be the start time of the activity</li>
						<li>*kegiatan_selesai* will be the end time of the activity</li>
					</ul>
				</p>
				<p>
					*Harap diperhatikan unsur penulisan kode, kesalahan penulisan kode menyebabkan kode tidak dapat diterjemahkan oleh sistem.
				</p>
			@endif
		@endif
		
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