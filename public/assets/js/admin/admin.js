//sidebar home
$('body').on('click','#home_slideshow',function(){
	 $('.admin_control_panel').load('admin/home/slide');
});

$('body').on('click','#home_welcome',function(){
	 $('.admin_control_panel').load('admin/home/welcome');
});

$('body').on('click','#home_about',function(){
	 $('.admin_control_panel').load('admin/home/about');
});

$('body').on('click','#home_visi',function(){
	 $('.admin_control_panel').load('admin/home/visi');
});

$('body').on('click','#home_misi',function(){
	 $('.admin_control_panel').load('admin/home/misi');
});

$('body').on('click','#home_regulasi',function(){
	 $('.admin_control_panel').load('admin/home/regulasi'); 
});


//sidebar organisasi
$('body').on('click','#organisasi_pengurus',function(){
	 $('.admin_control_panel').load('admin/organisasi/pengurus'); 
});

$('body').on('click','#organisasi_cabang',function(){
	 $('.admin_control_panel').load('admin/organisasi/cabang');	 
});


//sidebar anggota
$('body').on('click','#anggota_aturan',function(){
	 $('.admin_control_panel').load('admin/anggota/aturan');
});

$('body').on('click','#anggota_akun',function(){
	 $('.admin_control_panel').load('admin/anggota/akun');
});

$('body').on('click','#anggota_daftar',function(){
	 $('.admin_control_panel').load('admin/anggota/daftar');
});