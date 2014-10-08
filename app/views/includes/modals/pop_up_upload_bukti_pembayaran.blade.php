
<!-- Modal Pop Up Upload Bukti Pembayaran -->
<div class="modal fade pop_up_upload_bukti_pembayaran" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">@if($simpIct == 3) Tutup @else @if($simpIct == 4) Close @endif @endif</span></button>
        		<h4 class="modal-title" id="myModalLabel">@if($simpIct == 3) Unggah Bukti Pembayaran @else @if($simpIct == 4) Upload Proof of Payment @endif @endif</h4>
      		</div>
			{{ Form::open(array('url' => 'event/uploadBuktiBayar','method'=>'put','class'=>'form-horizontal','files'=>'true')) }}
			<input type='hidden' class='id_peserta' name='id_peserta'/>
			<input type='hidden' class='id_kegiatan' name='id_kegiatan'/>
			<div class="modal-body" style="">
				<div id="uploadttg" style="margin-left: 20px !important;">
					
						{{ Form::file('file_bukti_bayar', array('name'=>'file_bukti_bayar','id'=>'file_bukti_bayar', 'accept' => "image/*")) }}
					
				</div>
				
			</div>
			<div class="modal-footer">
				<div class=" konten_pesan">
										@if($simpIct == 3) 
										{{ Form::submit('Unggah Bukti Bayar', array('id'=>'ok_edit_tanda_tangan_button', 'style' => '', 'class'=>'btn btn-success')) }}
@else @if($simpIct == 4)  
{{ Form::submit('Upload Proof of Payment', array('id'=>'ok_edit_tanda_tangan_button', 'style' => '', 'class'=>'btn btn-success')) }}
@endif @endif 

				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
