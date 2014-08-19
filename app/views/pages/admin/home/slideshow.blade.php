<div class='admin_title'>Slideshow</div>

<div class='slide_container'>
	<ul>
		<li>
			<div><img src="#" class='slide_image' /> <input type='button' value='Ganti Foto' class='change_photo'/></div><input type='text' placeholder='caption 1'> <input type='button' /><input type='button' />
		</li>
		<li>
			<div><img src="#" class='slide_image' /> <input type='button' value='Ganti Foto' class='change_photo'/> <input type='text' placeholder='caption 2'> <input type='button' /><input type='button' />
		</li>
		<li>
			<div><img src="#" class='slide_image' /> <input type='button' value='Ganti Foto' class='change_photo'/> <input type='text' placeholder='caption 3'> <input type='button' /><input type='button' />
		</li>
		<li>
			<div><img src="#" class='slide_image' /> <input type='button' value='Ganti Foto' class='change_photo'/> <input type='text' placeholder='caption 4'> <input type='button' /><input type='button' />
		</li>
		<li>
			<div><img src="#" class='slide_image' /> <input type='button' value='Ganti Foto' class='change_photo'/> <input type='text' placeholder='caption 5'> <input type='button' /><input type='button' />
		</li>
	</ul>
</div>



<script>
$('body').on('mouseenter','.slide_image',function(){
	$('.change_photo').fadeIn(10);
});

$('body').on('mouseleave','.slide_image',function(){
	$('.change_photo').fadeOut(100);
});
</script>