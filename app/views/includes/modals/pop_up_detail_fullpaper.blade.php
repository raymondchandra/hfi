
<!-- Modal Pop Up Detail Abstraksi -->
<div class="modal fade pop_up_detail_fullpaper" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">@if($simpIct == 3) Tutup @else @if($simpIct == 4) Close @endif @endif </span></button>
				<h4 class="modal-title" id="myModalLabel">@if($simpIct == 3) Detail Paper @else @if($simpIct == 4) Paper Detail @endif @endif </h4>
			</div>

			<form class="form-horizontal">

				<div class="modal-body" style="">

					<div class="form-group">
						<label class=" control-label col-sm-3">@if($simpIct == 3) Judul Paper @else @if($simpIct == 4) Paper Title @endif @endif </label>
						<p class="form-control-static col-sm-8 judul_paper"></p>
					</div>

					<!--<div class="form-group">
						
						<object class="col-sm-12 file_paper" data="" style="height: 400px;"></object>
					</div>-->

					<div class="form-group">
						<label class=" control-label col-sm-3">@if($simpIct == 3) Kirim Email @else @if($simpIct == 4) Sent Email @endif @endif </label>
						<label class="radio-inline">
							{{ Form::radio('is_paper2','1', array('style'=>'float: left;')) }} @if($simpIct == 3) Bagus @else @if($simpIct == 4) Good @endif @endif          
						</label>
						<label class="radio-inline">
							{{ Form::radio('is_paper2','0', array('style'=>'float: left;')) }} @if($simpIct == 3) Kurang Bagus @else @if($simpIct == 4) Not Good @endif @endif     
						</label>

					</div>


				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-success update_paper">
						@if($simpIct == 3) Perbarui Status Paper  @else @if($simpIct == 4) Update Paper Status @endif @endif 
					</button>
					<input type='hidden' class='id_peserta_paper' />
					
				</div>

			</form>

		</div>
	</div>
</div>
<script>
$('body').on('click','.update_paper',function(){
	$change=$("input[name='is_paper2']:checked").val();
	$id_peserta = $('.id_peserta_paper').val();
	$.ajax({
		type: 'PUT',
		url: "{{url('event/admin/ubahStatusPaper')}}",
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
