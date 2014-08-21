<div class="admin_title">Pengurus</div>

<!-- cuma div kosong buat kasih space antara title sama isi content -->
<div class="pengurus_container">
</div>

<div id="list_pengurus">
	<!-- nantinya getNamePDF dari database trus di list-->
	<ul>	
		<li><a href="javascript:void(0)">pengurus periode 2014-2017</a> <!--ambil nama file dari database-->
			<div class="delete"><a href="javascript:void(0)">x</a></div>
		</li>		
		<li><a href="javascript:void(0)">pengurus periode 2011-2014</a>
			<div class="delete"><a href="javascript:void(0)">x</a></div>
		</li>
	</ul>
	
	<input type="button" id="unggah" value="Unggah"></input>
	
	<input type="file" id="upload_file" style="display:none;"></input>
</div>

<div id="preview_pdf">
	<!-- nantinya getData sesuai list yg di klik --> 
	<object data="assets/img/contohpengurus.pdf" type="application/pdf" width="100%" class="pdf_viewer"></object>
</div>

<script>
$('#unggah').click(function(){
	$('#upload_file').click();
});
</script>