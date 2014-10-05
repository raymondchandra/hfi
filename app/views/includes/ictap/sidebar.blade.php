<div class="side_panel_hfi">
				<div class="side_panel_hfi_background">


				
				<ul>
					<li>
						<a href="{{URL::route('ictap')}}">Previous Meeting</a>
					</li>

					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('ictap.index',array($id))}}">Front Page</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('ictap.konten',array('tanggal penting',$id))}}">Important Dates</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('ictap.konten',array('lokasi',$id))}}">
							Location
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('ictap.konten',array('akomodasi',$id))}}">
							Accomodation
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('ictap.konten',array('program',$id))}}">
							Program
						</a>
					</li>
					
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('ictap.peserta',array($id))}}">
							Participant
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('ictap.konten',array('prosiding',$id))}}">
							Proceeding
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('ictap.konten',array('panitia',$id))}}">
							Organizer
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('ictap.konten',array('konten',$id))}}">
							Contact
						</a>
					</li>
				
				</ul>
				</div>
			</div>