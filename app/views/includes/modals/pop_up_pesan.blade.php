
<!-- Modal Pop Up -->
<div class="modal fade pop_up_pesan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">@if($simpIct == 3) Tutup @else @if($simpIct == 4) Close @endif @endif</span></button>
        <h4 class="modal-title" id="myModalLabel">@if($simpIct == 3)Nama Pengirim | Subjek @else @if($simpIct == 4) Sender Name | Subject @endif @endif </h4>
      </div>

      

      <div class="modal-body" style="overflow: hidden; ">
        <button type="button" class="btn btn-info tog" style="width: 100%; margin-left: 10px; margin-bottom: 20px; float: right;">
          Reply
          <span class="glyphicon glyphicon-share">
          </span>
        </button>
      </div>
      <div class="modal-body poi" style="overflow: hidden; display: none;">
        
        
        <div class="clearfix"></div>
        <form>
        <label class=" control-label col-sm-2">@if($simpIct == 3) Balas Pesan @else @if($simpIct == 4) Reply @endif @endif </label>
        {{ Form::textarea('keteranganlain', Input::old('keteranganlain'), array('class'=>'form-control col-sm-8 editor', 'style'=>'height: 100px;')) }}
        <span class="cleafix"></span>
        
		<span class="clearfix"></span>
		<button type="button" id="replyButton" class="btn btn-primary " style="margin-top: 10px; float: left; margin-left: 145px;">@if($simpIct == 3) Kirim @else @if($simpIct == 4) Send @endif @endif </button>
		<input id="id_pesan" type="hidden" />
		{{ Form::file('fileAttachment', array('name'=>'fileAttachment', 'id'=>'fileAttachment', 'style' => 'margin-top: 10px; margin-left: 10px;float: left;' , 'accept'=>'.pdf'))}}
        </form>
      </div>
	  
	  <script>
		$('#replyButton').click(function(){
			$id_pesan = $(this).next().val();
			var data = new FormData();
			data.append('id_pesan', $id);
			data.append('attachment', $('#fileAttachment')[0].files[0]);
			data.append('text', $('.editor').val());
			$.ajax({
				type: 'POST',
				url: '{{URL::route('admin.kegiatan2.put_reply')}}',
				data: data,
				processData : false,
				contentType : false,
				success: function(response){
					if(response === "Gagal membalas pesan")
					{
						alert(response);
					}
					else
					{
						@if($simpIct == 3) 
							$isi = "<h4>Pesan Kirim - ";
						$isi = $isi + response.created_at + "</h4></p>";
						$isi = $isi + response.message + "</p><p>lampiran : ";
@else @if($simpIct == 4)  
$isi = "<h4>Sent message - ";
						$isi = $isi + response.created_at + "</h4></p>";
						$isi = $isi + response.message + "</p><p>attachment : ";
@endif @endif 
						
						if(response.attachment == "" || response.attachment == "-")
						{
							$isi = $isi + " -</p>";
						}
						else
						{
							$isi = $isi + "<a target='_blank' href='{{asset('assets/file_upload/reply_attachment/" + response.id + "/" + response.attachment + "')}}'>" + response.attachment + "</a></p>";
						}
						
						$('#kirim_konten').prepend($isi);
						@if($simpIct == 3) 
	alert("Berhasil membalas pesan");
@else @if($simpIct == 4)  
	alert("Success reply message");
@endif @endif 
					}
					
					
				},
				error: function(jqXHR, textStatus, errorThrown){
					alert(errorThrown);
				}
			},'json');

		});
	  </script>

      <div class="modal-body">
        <div class="form-group konten_pesan">
			<hr/>
			<div id="kirim_konten">
				<img src="{{ asset('assets/img/728.gif')}}"/>
			</div>
			<hr/>
			<h4 id="datang_header">Pesan Datang</h4>
			<p id="datang_konten">
				<img src="{{ asset('assets/img/728.gif')}}"/>
			</p>
			<p  id="datang_lampiran"></p>

        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $('body').on('click','.tog',function(){
       
        $('.poi').slideToggle({
          height: '170'
        },500, 'easeInOutExpo');

    });
</script>