
<!-- Modal Pop Up Minta Bantuan-->
<div class="modal fade pop_up_minta_bantuan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">@if($simpIct == 3) Tutup @else @if($simpIct == 4) Close @endif @endif </span></button>
        <h4 class="modal-title" id="myModalLabel">@if($simpIct == 3) Minta Bantuan @else @if($simpIct == 4) Get Help @endif @endif </h4>
      </div>


      <div class="modal-body poi" style="overflow: hidden;">
       
        
        <div class="clearfix"></div>
        <form class="form-horizontal">
          <div class="form-group">
            <label class=" control-label col-sm-2">@if($simpIct == 3) Subjek @else @if($simpIct == 4) Subject @endif @endif </label>
            {{ Form::text('input_nama',Input::old('input_nama'), array('id' => 'input_nama', 'class' => 'form-control col-sm-9 subjectEditor')) }}
          </div>
          <div class="form-group">
            <label class=" control-label col-sm-2">@if($simpIct == 3) Deskripsi @else @if($simpIct == 4) Description @endif @endif </label>
            {{ Form::textarea('keteranganlain', Input::old('keteranganlain'), array('id'=>'editor', 'class'=>'form-control col-sm-9 editor', 'style'=>'height: 100px;')) }}
          </div>
          <span class="clearfix"></span>
          
          <input type="file" class="" style="margin-left: 150px;margin-right: 34px;" id="fileAttachment"/>
          <button type="button" class="btn btn-primary" style="margin-left: 150px; width: 100px;margin-top: 10px;" id="sendBantuan">@if($simpIct == 3) Kirim @else @if($simpIct == 4) Send @endif @endif </button>
		  <input type="hidden" id="id_keg"/>
		  <input type="hidden" id="id_pes"/>
          <span class="clearfix"></span>
          
        </form>
      </div>

     <!-- <div class="modal-body">
        <div class="form-group konten_pesan">

          <hr/>
          <h4>Pesan Kirim</h4>
          <p>
            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. 
          </p>
          
          <hr/>
          <h4>Pesan Datang</h4>
          <p>
            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. 
          </p>

        </div>
      </div> -->

    </div>
  </div>
</div>
<script>
	$('body').on('click','.tog',function(){
	 
	  $('.poi').animate({
		height: '170'
	  },500, 'easeInOutExpo');

	});

	$('#sendBantuan').click(function(){
		$id_kegiatan = $(this).next().val();
		$id_peserta = $(this).next().next().val();
		var data = new FormData();
		data.append('id_kegiatan', $id_kegiatan);
		data.append('id_peserta', $id_peserta);
		data.append('attachment', $('#fileAttachment')[0].files[0]);
		data.append('text', $('.editor').val());
		data.append('subject', $('.subjectEditor').val());
		
		$.ajax({
			type: 'POST',
			url: '{{URL::route('simposium.mintaBantuan',array($id))}}',
			data: data,
			processData : false,
			contentType : false,
			success: function(response){
				if(response === "Gagal mengirim pesan")
        {
          alert(response);
        }
        else
        {
          @if($simpIct == 3)
            alert("Sukses mengirim pesan");
          @else 
            @if($simpIct == 4)
              alert("Success sending message");
            @endif
          @endif
        }
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		},'json');
	});
</script>