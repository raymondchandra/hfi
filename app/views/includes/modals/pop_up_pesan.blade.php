
<!-- Modal Pop Up -->
<div class="modal fade pop_up_pesan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Nama Pengirim | Subjek Pengirim</h4>
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
        <label class=" control-label col-sm-2">Balas pesan</label>
        {{ Form::textarea('keteranganlain', Input::old('keteranganlain'), array('class'=>'form-control col-sm-8', 'style'=>'height: 100px;')) }}
        <span class="cleafix"></span>
        <button type="button" class="btn btn-primary " style="width: 100px;">Kirim</button>
        <input type="file" class="btn btn-primary " style="margin-left: 10px;"/>
        </form>
      </div>

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