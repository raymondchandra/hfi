
<!-- Modal Pop Up Detail Profile -->
<div class="modal fade pop_up_detail_profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">@if($simpIct == 3) Tutup @else @if($simpIct == 4) Close @endif @endif</span></button>
        		<h4 class="modal-title" id="myModalLabel">@if($simpIct == 3) Detail Profil @else @if($simpIct == 4) Profile Detail @endif @endif</h4>
      		</div>

			<div class="modal-body" style="">
						  <div class="form-group row">
							<label class="col-lg-3">@if($simpIct == 3) Nama @else @if($simpIct == 4) Name @endif @endif</label>
							<span class="col-lg-8 nama_peserta"></span>
						  </div>
						  
						  <div class="form-group row">
							<label class="col-lg-3">@if($simpIct == 3) Institusi @else @if($simpIct == 4) Institution @endif @endif</label>
							<span class="col-lg-8 institusi_peserta"></span>
						  </div>
						  
						  <div class="form-group row">
							<label class="col-lg-3">@if($simpIct == 3) Profesi @else @if($simpIct == 4) Occupation @endif @endif</label>
							<span class="col-lg-8 profesi_peserta"></span>
						  </div>
						  
						  <div class="form-group row">
							<label class="col-lg-3">@if($simpIct == 3) Surat Elektronik @else @if($simpIct == 4) Email @endif @endif</label>
							<span class="col-lg-8 email_peserta"></span>
						  </div>
						  
						  <div class="form-group row">
							<label class="col-lg-3">@if($simpIct == 3) Alamat @else @if($simpIct == 4) Address @endif @endif </label>
							<span class="col-lg-8 alamat_peserta"></span>
						  </div>
						  
					
						  <!--<div class="form-group row">
							<label class="col-lg-3">Status</label>
							<span class="col-lg-8 status_peserta">-</span>
						  </div>-->

						  <!--<div class="form-group row">
							<label class="col-lg-3">Bidang Keahlian</label>
							<span class="col-lg-8 keahlian_peserta">-</span>
						  </div>-->


			</div>
				
		</div>
	</div>
</div>
