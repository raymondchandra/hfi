
	{{ HTML::script('assets/js/jquery-1.11.1.min.js') }}
	{{ HTML::script('assets/js/jquery-migrate-1.2.1.min.js') }}


{{ Form::file('photo',array('name'=>'photo','id'=>'photo','class'=>'upload_photo','style' => 'margin-top: 20px; display: block; margin-left: auto; margin-right: auto;')) }}
{{ Form::button('Upload', array('onClick' => 'upload()')) }}
<script>
	function upload(){
		var data, xhr;
	    data = new FormData();
	    data.append( 'file', $( '#photo' )[0].files[0] );
		data.append('id_photo',1);
		$.ajax({
	    	url: 'putSlideTest',
	        data: data,
	    	processData: false,
	  		contentType: false,
	  		type: 'POST',
	        success: function ( as ) {
	            alert( as );
	        }
	    });
	}
	
</script>

