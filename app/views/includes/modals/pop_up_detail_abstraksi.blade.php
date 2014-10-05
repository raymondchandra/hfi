
<!-- Modal Pop Up Detail Abstraksi -->
<div class="modal fade pop_up_detail_abstraksi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Detail Abstraksi</h4>
			</div>

			<form class="form-horizontal">

				<div class="modal-body" style="">

					<div class="form-group">
						<label class=" control-label col-sm-3">Judul Penelitian</label>
						<p class="form-control-static col-sm-8 judul_paper">Pembuatan Lansekap Ala Kevin PL</p>
					</div>

					<div class="form-group">
						<label class=" control-label col-sm-3">Abstrak</label>
						<p class="form-control-static col-sm-8 abstrak_paper">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
					</div>

					<div class="form-group">
						<label class=" control-label col-sm-3">Status Abstraksi</label>
						<label class="radio-inline">
							{{ Form::radio('is_abstrak','1', array('class'=>'abstrak','style'=>'float: left;')) }} Sudah Dibaca         
						</label>
						<label class="radio-inline">
							{{ Form::radio('is_abstrak','0', array('class'=>'abstrak','style'=>'float: left;')) }} Belum Dibaca    
						</label>

					</div>


				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-success update_abstrak">
						Perbaharui Status Abstraksi
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
		url: "{{url('simposium/admin/ubahStatusAbstrak')}}",
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