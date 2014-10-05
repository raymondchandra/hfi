
<!-- Modal Pop Up Upload Full Paper -->
<div class="modal fade pop_up_upload_full_paper" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Upload Full Paper</h4>
      		</div>
			
			{{ Form::open(array('url' => 'simposium/uploadPaper','method'=>'put','class'=>'form-horizontal','files'=>'true')) }}
			<div class="modal-body" style="">
				<input type='hidden' class='id_peserta' name='id_peserta'/>
				<input type='hidden' class='id_kegiatan' name='id_kegiatan'/>
				<div id="uploadttg" style="margin-left: 20px !important;">
					
						{{ Form::file('filePaper', array('name'=>'filePaper','id'=>'filePaper', 'accept' => "application/*")) }}
					
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="form-group konten_pesan">
					{{ Form::submit('Unggah File', array('id'=>'ok_edit_tanda_tangan_button', 'style' => '', 'class'=>'btn btn-success')) }}
				</div>
			</div>
			{{ Form::close() }}
				
		</div>
	</div>
</div>
