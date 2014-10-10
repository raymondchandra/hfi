
<!-- Modal Pop Up Detail Pelunasan -->
<div class="modal fade pop_up_detail_pelunasan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Detail Pelunasan</h4>
			</div>

			<form class="form-horizontal">

				<div class="modal-body" style="">
					
					<!--<div class="form-group">
						<label class=" control-label col-sm-3">Jenis Partisipan</label>
						<p class="form-control-static col-sm-5 jenis_bayar">International | With Paper</p>
					</div>-->

					<div class="form-group">
						<label class=" control-label col-sm-3">Biaya</label>
						<p class="form-control-static col-sm-5 biaya_bayar">
							{{ HTML::image('','Image',array('class'=>'bukti_bayar_image')) }}
						</p>
					</div>
					<div class="form-group lunas_belum">
						<label class=" control-label col-sm-3 ">Status Pembayaran</label>
						<label class="radio-inline">
							{{ Form::radio('is_paper','1', array('style'=>'float: left;')) }} Lunas         
						</label>
						<label class="radio-inline">
							{{ Form::radio('is_paper','0', array('style'=>'float: left;')) }} Belum Lunas     
						</label>

					</div>
					

				</div>
				<div class="modal-footer lunas_belum">
					<button type="button" data-dismiss="modal" class="btn btn-success update_bayar">
						Perbaharui Status Pelunasan
					</button>
					<input type='hidden' class='id_peserta_biaya' />
				</div>
			</form>

		</div>
	</div>
</div>

<script>
	$('body').on('click','.update_bayar',function(){
		$change=$("input[name='is_paper']:checked").val();
		$id_peserta = $('.id_peserta_biaya').val();
		$.ajax({
			type: 'PUT',
			url: "{{url('event/admin/ubahStatusBayar')}}",
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
