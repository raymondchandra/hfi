@extends('layouts.default')
@section('content')
<div class="grid_12">
	<div class="main_content">
		<div class="filter_kegiatan_container">
			<h4>Filter Kegiatan</h4>
			<form class="filter_kegiatan">
				<label>Nama Kegiatan</label><span class="clear"></span><input type="text" />
				<span class="clear"></span>
				<label>Tanggal Awal</label><span class="clear"></span><input type="text" />
				<span class="clear"></span>
				<label>Tanggal Akhir</label><span class="clear"></span><input type="text" />
				<span class="clear"></span>
				<input type="button" value="Filter" />
			</form>
		</div>
		<div class='list_kegiatan_container'>
			<h2>Kegiatan</h2>
			<!--<table>
				<tr>
					<td class="poster_kegiatan">Poster</td>
					<td class="nama_kegiatan">Nama</td>
					<td class="waktu_kegiatan">Waktu</td>
					<td class="detail_kegiatan">Detail</td>
				</tr>
			</table>-->
			
			<ul>
				<li>
					
				</li>
			</ul>
		</div>
	</div>
</div>

@stop