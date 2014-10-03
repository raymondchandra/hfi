@extends('layouts.simposium_admin')
@section('content')
<script>
	var id = '{{$id}}';
</script>

<div class="container_12">
	<div class="grid_12">
		<div class='admin_title'>{{$nama_kegiatan}}</div>
		<div>Sponsor</div>
		<a href='javascript:void(0)' onClick='history.back();' >Back</a>
		<div id="sponsorList">
			<img src="" alt="foto2">
			<img src="" alt="foto2">
			<img src="" alt="foto2">
			<img src="" alt="foto2">
		</div>

		<div class="form-group">
			<label class=" control-label col-sm-3">Pendidikan<span class="red">*</span></label>
			<script>
				var lastIdx = 2;
				function addPendidikan(){
					//if(lastIdx <=5)
					//{
						var newRow = "<div class='clearfix'></div>";
						newRow += "<div id='divPendidikan"+lastIdx+"' style='margin-top: 5px;' '>";
						newRow +="<input type='file' id='pendidikan"+lastIdx+"' name='pendidikan"+lastIdx+"' class='texPendidikan form-control col-sm-3 col-sm-push-3' />";
						newRow +="<span value='' id='editPendidikan"+lastIdx+"' onClick='' style='padding: 0px; width: 34px; line-height: 34px; margin-left:10px;' class='glyphicon glyphicon-edit form-control col-sm-push-3 btn btn-warning'></span>";
						newRow +="<span value='' id='editPendidikan"+lastIdx+"' onClick='' style='padding: 0px; width: 34px; line-height: 34px; margin-left:10px;' class='glyphicon glyphicon-remove form-control col-sm-push-3 btn btn-danger'></span>";
						newRow +="<span value='' id='delPendidikan"+lastIdx+"' onClick='delPendidikan()' style='padding: 0px; width: 34px; line-height: 34px; margin-left:10px;' class='glyphicon glyphicon-remove form-control col-sm-push-3 btn btn-danger'></span><br /></div>";
						$('#delPendidikan'+(lastIdx-1)).hide();
						$('#addPendidikan').append(newRow);
					//	if(lastIdx==5){
					//		$('#refPendidikan').hide();
					//	}
						lastIdx++;
						
				//	}
					
				}
				function delPendidikan()
				{
					$('#divPendidikan'+(lastIdx-1)).remove();
					lastIdx--;
					$('#delPendidikan'+(lastIdx-1)).show();
					//if(lastIdx==5){
				//		$('#refPendidikan').show();
				//	}
				}
			</script>
				<input type="file" id="pendidikan1" name="pendidikan1" class='texPendidikan form-control col-sm-3' style=""/>
				
				<a href="javascript:void(0)" onClick = "addPendidikan();" id="refPendidikan" class="glyphicon glyphicon-plus btn btn-primary" style="padding: 0px;width: 34px; line-height: 34px; margin-left:10px;"></a>
			
			<div id="addPendidikan"></div>
		</div>	

		<div id="uploadttg" style="margin-left: 20px !important;">
			<form id="form_edit_tanda_tangan">
				<img id="gambar_tanda_tangan" src="" alt="tandatangan" width="118" height="63"/>
				{{ Form::file('fileTandaTangan', array('name'=>'fileTandaTangan','id'=>'fileTandaTangan', 'accept' => "image/*")) }}
				{{ Form::submit('Unggah Tanda Tangan', array('id'=>'ok_edit_tanda_tangan_button', 'style' => 'display: block; margin-left: 100px; margin-top: 20px;')) }}
			</form>	
		</div>
	</div>
</div>

@stop
