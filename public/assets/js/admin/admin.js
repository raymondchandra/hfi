//sidebar home
$('body').on('click','#home_slideshow',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/home/slide');
});

$('body').on('click','#home_welcome',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/home/welcome');
});

$('body').on('click','#home_about',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/home/about');
});

$('body').on('click','#home_visi',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/home/visi');
});

$('body').on('click','#home_misi',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/home/misi');
});

$('body').on('click','#home_regulasi',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/home/regulasi'); 
});



//sidebar organisasi
$('body').on('click','#organisasi_pusat',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/organisasi/pusat'); 
});

$('body').on('click','#organisasi_cabang',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/organisasi/cabang');	 
});


//sidebar anggota
$('body').on('click','#anggota_aturan',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/anggota/aturan');
});

// $('body').on('click','#anggota_akun',function(){
	// $( ".loader" ).fadeIn( 200, function(){});
	 // $('.admin_control_panel').load('admin/anggota/akun');
// });

$('body').on('click','#anggota_daftar',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/anggota/daftar');
});

//sidebar akun
$('body').on('click','#akun_baru',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/akun/baru');
});

$('body').on('click','#akun_aktif',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/akun/aktif');
});

$('body').on('click','#akun_non_aktif',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/akun/nonaktif');
});

$('body').on('click','#akun_admin',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/akun/adminList');
});

//sidebar kegiatan

$('body').on('click','#admin_kegiatan_nasional',function(){
	$('.admin_control_panel').html("");
	$( ".loader" ).fadeIn( 200, function(){});
	$('.admin_control_panel').load('admin/kegiatan/1');
});

$('body').on('click','#admin_kegiatan_internasional',function(){
	$('.admin_control_panel').html("");
	$( ".loader" ).fadeIn( 200, function(){});
	$('.admin_control_panel').load('admin/kegiatan/2');
});

$('body').on('click','#admin_kegiatan_simposium',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/kegiatan2/3');
});

$('body').on('click','#admin_kegiatan_ictap',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/kegiatan2/4');
});

//sidebar publikasi
$('body').on('click','#admin_jenis_publikasi',function(){
$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/publikasi/jenis');
});

$('body').on('click','#admin_ketentuan_publikasi',function(){
$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/publikasi/ketentuan');
});

$('body').on('click','#admin_karya_tulis',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/publikasi/karyalain');
});

$('body').on('click','#admin_ilmiah',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/publikasi/ilmiahpopuler');
});

//sidebar berkas
$('body').on('click','#admin_berkas',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/berkas');
});

//sidebar lain-lain
$('body').on('click','#admin_lain',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/lain');
});

//sidebar ubah password
$('body').on('click','#ubah_password',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admin/ubahpassword');
});

