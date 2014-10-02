
<!-- Modal Pop Up -->
<div class="modal fade pop_up_pesan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Nama Pengirim | Subjek Pengirim</h4>
      </div>


      <div class="modal-body poi" style="height: 59px; overflow: hidden;">
        <button type="button" class="btn btn-info tog" style="margin-left: 10px; margin-bottom: 20px; float: right;">
          Reply
          <span class="glyphicon glyphicon-share">
          </span>
        </button>
        
        <div class="clearfix"></div>

        <label class=" control-label col-sm-2">Balas pesan</label>
        {{ Form::textarea('keteranganlain', Input::old('keteranganlain'), array('class'=>'form-control col-sm-8', 'style'=>'height: 100px;')) }}

        <button type="button" class="btn btn-primary " style="margin-left: 10px; width: 100px;">Kirim</button>
        <input type="file" class="btn btn-primary " style="float: right;width: 100px;margin-right: 34px;margin-top: 10px;"/>
      </div>

      <div class="modal-body">
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
      </div>
    </div>
  </div>
</div>
<script>
  $('body').on('click','.tog',function(){
       
        $('.poi').animate({
          height: '170'
        },500, 'easeInOutExpo');

    });
</script>