<div class='admin_title'>Slideshow</div>

<div class='slide_container'>
	<ul>
		<li>
			<div><img src="#" class='slide_image' /> <input type='button' value='Ganti Foto' class='change_photo'/></div><input type='text' class='caption' placeholder='caption 1' /><input type='button' class='ok_change' value='Ok' style='display:none;' />
		</li>
		<li>
			<div><img src="#" class='slide_image' /> <input type='button' value='Ganti Foto' class='change_photo'/> <input type='text' class='caption' placeholder='caption 2' /><input type='button' class='ok_change' value='Ok' style='display:none;' />
		</li>
		<li>
			<div><img src="#" class='slide_image' /> <input type='button' value='Ganti Foto' class='change_photo'/> <input type='text' class='caption' placeholder='caption 3' /><input type='button' class='ok_change' value='Ok' style='display:none;' />
		</li>
		<li>
			<div><img src="#" class='slide_image' /> <input type='button' value='Ganti Foto' class='change_photo'/> <input type='text' class='caption' placeholder='caption 4' /><input type='button' class='ok_change' value='Ok' style='display:none;' />
		</li>
		<li>
			<div><img src="#" class='slide_image' /> <input type='button' value='Ganti Foto' class='change_photo'/> <input type='text' class='caption' placeholder='caption 5' /><input type='button' class='ok_change' value='Ok' style='display:none;' />
		</li>
	</ul>
</div>



<script>

$('.caption').keyup(function(){
	$(this).next().removeAttr('style');
});

$('.ok_change').click(function(){
	$(this).css('display','none');
	alert($(this).prev().val());
});

$('body').on('mouseenter','.slide_image',function(){
	$('.change_photo').fadeIn(10);
});

$('body').on('mouseleave','.slide_image',function(){
	$('.change_photo').fadeOut(100);
});
</script>