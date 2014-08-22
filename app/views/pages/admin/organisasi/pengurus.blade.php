<div class='admin_title'>Pengurus</div>
<div class='pengurus_container'>
</div>

	<div id='sidelist_pengurus'>
		<div id='list_pengurus'>
			<ul>
				<li><a href='javascript:void(0)'>List1</a>  <input type='button' id='delete_pengurus' value="X"></button></li>
				<li><a href='javascript:void(0)'>List2</a>  <input type='button' id='delete_pengurus' value="X"></button></li>
				<li><a href='javascript:void(0)'>List3</a>  <input type='button' id='delete_pengurus' value="X"></button></li>
				<li><a href='javascript:void(0)'>List4</a>  <input type='button' id='delete_pengurus' value="X"></button></li>
				<li><a href='javascript:void(0)'>List5</a>  <input type='button' id='delete_pengurus' value="X"></button></li>
				<li><a href='javascript:void(0)'>List6</a>  <input type='button' id='delete_pengurus' value="X"></button></li>
				<li><a href='javascript:void(0)'>List7</a>  <input type='button' id='delete_pengurus' value="X"></button></li>
				<li><a href='javascript:void(0)'>List8</a>  <input type='button' id='delete_pengurus' value="X"></button></li>
				<li><a href='javascript:void(0)'>List9</a>  <input type='button' id='delete_pengurus' value="X"></button></li>
				<li><a href='javascript:void(0)'>List10</a> <input type='button' id='delete_pengurus' value="X"></button></li>
			</ul>					
			
		</div>
		<div id='unggah_pengurus'>
			<input type='button' value='Unggah'></input>
			<input type='file' id='upload_file' style="display:none;"></input>
		</div>
	</div>
		
	<div id='preview_pdf_pengurus'>
		<object data="assets/img/Chapter_4.pdf" type="application/pdf" width="100%" id="pdf_viewer_pengurus"></object>
	</div>



<script>

$('#unggah').click(function(){
	$('#upload_file').click();
});
</script>