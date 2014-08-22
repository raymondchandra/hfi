<div class='admin_title'>Regulasi</div>
<div class='regulasi_container'>
</div>

	<div id='sidelist_regulasi'>
		<div id='list_regulasi'>
			<ul>
				<li><a href='javascript:void(0)'>List1</a>  <input type='button' id='delete_regulasi' value="X"></button></li>
				<li><a href='javascript:void(0)'>List2</a>  <input type='button' id='delete_regulasi' value="X"></button></li>
				<li><a href='javascript:void(0)'>List3</a>  <input type='button' id='delete_regulasi' value="X"></button></li>
				<li><a href='javascript:void(0)'>List4</a>  <input type='button' id='delete_regulasi' value="X"></button></li>
				<li><a href='javascript:void(0)'>List5</a>  <input type='button' id='delete_regulasi' value="X"></button></li>
				<li><a href='javascript:void(0)'>List6</a>  <input type='button' id='delete_regulasi' value="X"></button></li>
				<li><a href='javascript:void(0)'>List7</a>  <input type='button' id='delete_regulasi' value="X"></button></li>
				<li><a href='javascript:void(0)'>List8</a>  <input type='button' id='delete_regulasi' value="X"></button></li>
				<li><a href='javascript:void(0)'>List9</a>  <input type='button' id='delete_regulasi' value="X"></button></li>
				<li><a href='javascript:void(0)'>List10</a> <input type='button' id='delete_regulasi' value="X"></button></li>
			</ul>					
			
		</div>
		<div id='unggah_regulasi'>
			<input type='button' value='Unggah'></input>
			<input type='file' id='upload_file' style="display:none;"></input>
		</div>
	</div>
		
	<div id='preview_pdf_regulasi'>
		<object data="assets/img/Chapter_4.pdf" type="application/pdf" width="100%" id="pdf_viewer_regulasi"></object>
	</div>



<script>

$('#unggah').click(function(){
	$('#upload_file').click();
});
</script>