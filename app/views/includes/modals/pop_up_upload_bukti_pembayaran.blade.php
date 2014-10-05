
<!-- Modal Pop Up Upload Bukti Pembayaran -->
<div class="modal fade pop_up_upload_bukti_pembayaran" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Upload Bukti Pembayaran</h4>
      		</div>
			{{ Form::open(array('url' => 'simposium/uploadBuktiBayar','method'=>'put','class'=>'form-horizontal','files'=>'true')) }}
			<input type='hidden' class='id_peserta' name='id_peserta'/>
			<input type='hidden' class='id_kegiatan' name='id_kegiatan'/>
			<div class="modal-body" style="">
				<div id="uploadttg" style="margin-left: 20px !important;">
					
						{{ Form::file('file_bukti_bayar', array('name'=>'file_bukti_bayar','id'=>'file_bukti_bayar', 'accept' => "image/*")) }}
					
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="form-group konten_pesan">
					{{ Form::submit('Unggah Bukti Bayar', array('id'=>'ok_edit_tanda_tangan_button', 'style' => '', 'class'=>'btn btn-success')) }}
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
