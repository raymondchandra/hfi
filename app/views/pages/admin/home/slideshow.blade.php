<div class='admin_title'>Regulasi</div>
<div class='regulasi_container'>
</div>
	<div id='list_regulasi'>
		<ul>
			<li><a href='javascript:void(0)'>List1</a><div class='delete'><a href='javascript:void(0)'>x</a></div></li>
			<li><a href='javascript:void(0)'>List2</a><div class='delete'><a href='javascript:void(0)'>x</a></div></li>
			<li><a href='javascript:void(0)'>List3</a><div class='delete'><a href='javascript:void(0)'>x</a></div></li>
			<li><a href='javascript:void(0)'>List4</a><div class='delete'><a href='javascript:void(0)'>x</a></div></li>
		</ul>
		<input type='button' id='unggah' value='Unggah'></input>

		<input type='file' id='upload_file' style="display:none;"></input>
	</div>
	<div id='preview_pdf'>
		<object data="assets/img/Chapter_4.pdf" type="application/pdf" width="100%" class="pdf_viewer"></object>
	</div>



<script>

$('#unggah').click(function(){
	$('#upload_file').click();
});
</script>