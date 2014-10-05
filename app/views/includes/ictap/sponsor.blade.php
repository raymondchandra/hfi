<div class="container_12">
	<div class="grid_12 s_sponsor_area">
		<?php
			$files = SimposiumController::getSponsor($id);
		?>
		@if(count($files)!=0)
			@foreach($files as $file)
				<img class="sponsor_img" src="{{ asset($file->file_path) }}" width="64" alt="simpsium hfi"/>
			@endforeach
		@endif

	</div>
</div>