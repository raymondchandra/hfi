<div class="side_panel_hfi">
				<div class="side_panel_hfi_background">


				@if($simpIct == 3)
				
				
				<ul>
					<li>
						<a href="{{URL::route('simposium')}}">Pertemuan Lalu</a>
					</li>

					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('simposium.index',array($id))}}">Halaman Depan</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('simposium.konten',array('tanggal penting',$id))}}">Tanggal Penting</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('simposium.konten',array('lokasi',$id))}}">
							Lokasi
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('simposium.konten',array('akomodasi',$id))}}">
							Akomodasi
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('simposium.konten',array('program',$id))}}">
							Program
						</a>
					</li>
					
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('simposium.peserta',array($id))}}">
							Peserta
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('simposium.konten',array('prosiding',$id))}}">
							Prosiding
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('simposium.konten',array('panitia',$id))}}">
							Panitia
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('simposium.konten',array('kontak',$id))}}">
							Kontak
						</a>
					</li>
				
				</ul>
				@else 
				@if($simpIct == 4)
				<ul>
					<li>
						<a href="{{URL::route('ictap')}}">Previous Meeting</a>
					</li>

					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('simposium.index',array($id))}}">Front Page</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('simposium.konten',array('tanggal penting',$id))}}">Important Dates</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('simposium.konten',array('lokasi',$id))}}">
							Location
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('simposium.konten',array('akomodasi',$id))}}">
							Accomodation
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('simposium.konten',array('program',$id))}}">
							Program
						</a>
					</li>
					
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('simposium.peserta',array($id))}}">
							Participant
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('simposium.konten',array('prosiding',$id))}}">
							Prosiding
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('simposium.konten',array('panitia',$id))}}">
							Organizer
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{URL::route('simposium.konten',array('kontak',$id))}}">
							Contact
						</a>
					</li>
				
				</ul>	
				@endif
				@endif
				
				</div>
			</div>