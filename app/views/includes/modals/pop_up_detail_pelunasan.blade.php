
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

					<div class="form-group">
						<label class=" control-label col-sm-3">Jenis Partisipan</label>
						<p class="form-control-static col-sm-5">International | With Paper</p>
					</div>

					<div class="form-group">
						<label class=" control-label col-sm-3">Biaya</label>
						<p class="form-control-static col-sm-5">IDR 2.500.000</p>
					</div>

					<div class="form-group">
						<label class=" control-label col-sm-3">Status Pembayaran</label>
						<label class="radio-inline">
							{{ Form::radio('is_paper','1', array('style'=>'float: left;')) }} Lunas         
						</label>
						<label class="radio-inline">
							{{ Form::radio('is_paper','0', array('style'=>'float: left;')) }} Belum Lunas     
						</label>

					</div>


				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-success">
						Perbaharui Status Pelunasan
					</button>
					
				</div>

			</form>

		</div>
	</div>
</div>
