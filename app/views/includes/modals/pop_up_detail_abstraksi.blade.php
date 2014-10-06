
<!-- Modal Pop Up Detail Abstraksi -->
<div class="modal fade pop_up_detail_abstraksi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">@if($simpIct == 3) Tutup @else @if($simpIct == 4) Close @endif @endif</span></button>
				<h4 class="modal-title" id="myModalLabel">@if($simpIct == 3) Detail Abstraksi @else @if($simpIct == 4) Abstract Detail @endif @endif</h4>
			</div>

			<form class="form-horizontal">

				<div class="modal-body" style="">

					<div class="form-group">
						<label class=" control-label col-sm-3">@if($simpIct == 3) Judul Paper @else @if($simpIct == 4) Paper Title @endif @endif</label>
						<p class="form-control-static col-sm-8 judul_paper"></p>
					</div>

					<div class="form-group">
						<label class=" control-label col-sm-3">@if($simpIct == 3) Abstrak  @else @if($simpIct == 4) Abstract @endif @endif </label>
						<p class="form-control-static col-sm-8 abstrak_paper"></p>
					</div>

					<div class="form-group">
						<label class=" control-label col-sm-3">Status Abstraksi</label>
						<label class="radio-inline">
							{{ Form::radio('is_abstrak','1', array('class'=>'abstrak','style'=>'float: left;')) }} @if($simpIct == 3) Sudah Dibaca @else @if($simpIct == 4) Read @endif @endif          
						</label>
						<label class="radio-inline">
							{{ Form::radio('is_abstrak','0', array('class'=>'abstrak','style'=>'float: left;')) }} @if($simpIct == 3) Belum Dibaca @else @if($simpIct == 4) Not Read @endif @endif 
						</label>

					</div>


				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-success update_abstrak">
						@if($simpIct == 3) Perbarui Status Abstrak  @else @if($simpIct == 4) Update Abstract Status @endif @endif 
					</button>
					<input type='hidden' class='id_peserta_abstract' />
					
				</div>

			</form>

		</div>
	</div>
</div>
<script>
$('body').on('click','.update_abstrak',function(){
	$change=$("input[name='is_abstrak']:checked").val();
	$id_peserta = $('.id_peserta_abstract').val();
	$.ajax({
		type: 'PUT',
		url: "{{url('event/admin/ubahStatusAbstrak')}}",
		data: {
			"bayar": $change,
			"id" : $id_peserta
		},
		success: function(response){
			if(response == "success")
			{
@if($simpIct == 3) 
	alert('Berhasil mengubah status');
@else @if($simpIct == 4)  
	alert('Success changing status');
@endif @endif 
			}else if(response == "failed"){
@if($simpIct == 3) 
	alert('Gagal mengubah status');
@else @if($simpIct == 4)  
	alert('Failed changing status');
@endif @endif 
			}
			location.reload();
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert(errorThrown);
		}
	},'json');
})
</script>