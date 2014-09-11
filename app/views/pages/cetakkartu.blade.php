@extends('layouts.print')
@section('content')	

	<div class="kartu_size">
		<div class="left">
		
			<div class="word_member">
				Member
			</div>
			<p class="kantor_alamat_hfi">
				Alamat kantor HFI Pusat<br/>
				{{$alamatHFIPusat}}
			</p>
			<div class="word_tahun">
				{{$thisyear}}
			</div>
			
			<div class="nama_member">
				{{$profile->nama}}
			</div>
			<div>
				<img src="" alt=""/>
			</div>
			
			<div class="member_no">
				No. Member	: {{$profile->no_anggota}}
			</div>
			<div class="nama_section">
				Cabang	: {{$nama_cabang}}
			</div>
			<div class="nama_institusi">
				Institusi		: {{$profile->institusi}}
			</div>
			<div class="valid_for">
				Member HFI sampai
			</div>
			<div class="valid_since">
				{{$date}}
			</div>
			
			<img src='{{ asset("assets/img/foto_kartu.png") }}' width="85" alt="" class="kartu_hfi"/>
			

			<div class="hyperlink_hfi">
				Untuk informasi kunjung {{Request::root()}}
			</div>

			<img src='{{ asset("assets/img/tanda_tangan_ketua.png") }}' width="101" alt="" class="tanda_tangan_ketua"/>
		</div>
		
		<div class="right">
			
		<!-- 	<p class="keterangan_0">
				Keterangan terkait kartu HFI dapat ditempakan di kolom berikut, administrator bebas memasukan keterangan apapun asalakan relevan.
			</p>

			<p class="keterangan_1">
				Keterangan tambahan dapat ditambahkan disini:
				<br/>
				Nomer telpon
				<br/>
				Email
			</p>
			<div class="barcode">
				barcode?
			</div>0-->
		</div>
	</div>
	
@stop