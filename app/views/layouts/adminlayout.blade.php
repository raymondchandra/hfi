<!doctype html>
<html>
<head>
	@include('includes.head')
</head>
<body>
<div class="container">

	@include('includes.header_admin')
	

	<section class="admin_content_container">
	
		@include('includes.sidebar_admin')
		
		<div class="admin_control_panel">
			<div class="container_12">
				@yield('content')
			</div>
		</div>
		
		
	</section>


</div>
<script src="assets/js/admin/admin.js"></script>
<script type="text/javascript">
		
		$('body').css('overflow','hidden');
		
		function updateSize(){
		
			var height = $(window).height() - $('.header_admin').height();
			var width = $(window).width() - $('.admin_logo').width();
			$('.admin_content_container, .sidebar_admin, .admin_control_panel').css('height',height);
			$('.admin_control_panel, .admin_id').css('width',width);
		
			
		};
		$(document).ready(updateSize);
		$(window).resize(updateSize);
		
		/*external container area exit trigger*/
		$('.exit').click(function() {$( ".pop_up_super_c" ).fadeOut( 200, function(){});});	
		
		$('.pop_up_super_c').click(function (e)
		{
			var container = $('.pop_up_cell');

			if (container.is(e.target) )// if the target of the click is the container...
			{
				$( ".pop_up_super_c" ).fadeOut( 200, function(){});
				$('html').css('overflow-y', 'auto');
			}
		});
		
		
		
		
		$('._home_tombol').click(function ()
		{
			if ($('._home_list').is(':visible')) {
				$( "._home_list" ).slideUp( 370, function(){
					$('._home_list').css('display', 'none');
				});
			} else {
				$( "._home_list" ).slideDown( 370, function(){
					$('._home_list').css('display', 'block');
				});
			}
		});
		
		$('._organisasi_tombol').click(function ()
		{
			if ($('._organisasi_list').is(':visible')) {
				$( "._organisasi_list" ).slideUp( 370, function(){
					$('._organisasi_list').css('display', 'none');
				});
			} else {
				$( "._organisasi_list" ).slideDown( 370, function(){
					$('._organisasi_list').css('display', 'block');
				});
			}
		});
		
		$('._publikasi_tombol').click(function ()
		{
			if ($('._publikasi_list').is(':visible')) {
				$( "._publikasi_list" ).slideUp( 370, function(){
					$('._publikasi_list').css('display', 'none');
				});
			} else {
				$( "._publikasi_list" ).slideDown( 370, function(){
					$('._publikasi_list').css('display', 'block');
				});
			}
		});
		
		$('._anggota_tombol').click(function ()
		{
			if ($('._anggota_list').is(':visible')) {
				$( "._anggota_list" ).slideUp( 370, function(){
					$('._anggota_list').css('display', 'none');
				});
			} else {
				$( "._anggota_list" ).slideDown( 370, function(){
					$('._anggota_list').css('display', 'block');
				});
			}
		});
		
		$('._kontak_tombol').click(function ()
		{
			if ($('._kontak_list').is(':visible')) {
				$( "._kontak_list" ).slideUp( 370, function(){
					$('._kontak_list').css('display', 'none');
				});
			} else {
				$( "._kontak_list" ).slideDown( 370, function(){
					$('._kontak_list').css('display', 'block');
				});
			}
		});
		
		
		
	</script>
</body>
</html>