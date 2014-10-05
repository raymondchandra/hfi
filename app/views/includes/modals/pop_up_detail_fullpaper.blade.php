
<!-- Modal Pop Up Detail Abstraksi -->
<div class="modal fade pop_up_detail_fullpaper" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Detail Paper</h4>
			</div>

			<form class="form-horizontal">

				<div class="modal-body" style="">

					<div class="form-group">
						<label class=" control-label col-sm-3">Judul Penelitian</label>
						<p class="form-control-static col-sm-8 judul_paper">Pembuatan Lansekap Ala Kevin PL</p>
					</div>

					<div class="form-group">
						
						<object class="col-sm-12 file_paper" data="" style="height: 400px;"></object>
					</div>

					<div class="form-group">
						<label class=" control-label col-sm-3">Kirim Email</label>
						<label class="radio-inline">
							{{ Form::radio('is_paper2','1', array('style'=>'float: left;')) }} Bagus         
						</label>
						<label class="radio-inline">
							{{ Form::radio('is_paper2','0', array('style'=>'float: left;')) }} Kurang Bagus    
						</label>

					</div>


				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-success update_paper">
						Perbaharui Status Abstraksi
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
		url: "{{url('simposium/admin/ubahStatusPaper')}}",
		data: {
			"bayar": $change,
			"id" : $id_peserta
		},
		success: function(response){
			alert(response);
			location.reload();
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert(errorThrown);
		}
	},'json');
})
</script>
