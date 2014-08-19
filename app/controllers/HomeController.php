<?php

class HomeController extends BaseController {

	public function view_index()
	{
		//bikin variable
		$deskripsi_selamat_datang = '<p>Dramatically visualize customer directed convergence without revolutionary ROI. Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>';
		
		$tentang_hfi = '<p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>';
		
		$visi_hfi = '<ul>
						<li>
							satu 
						</li>
						<li>
							dua 
						</li>
						<li>
							tiga 
						</li>
						<li>
							empat
						</li>
						<li>
							lima 
						</li>
						<li>
							enam 
						</li>
						<li>
							tujuh
						</li>
					</ul>';
		
		$misi_hfi = '<ul>
						<li>
							satu 
						</li>
						<li>
							dua 
						</li>
						<li>
							tiga 
						</li>
						<li>
							empat
						</li>
						<li>
							lima 
						</li>
						<li>
							enam 
						</li>
						<li>
							tujuh
						</li>
					</ul>';
		
		return View::make('pages.home', compact('deskripsi_selamat_datang', 'tentang_hfi', 'visi_hfi', 'misi_hfi'));
		
		//return View::make('pages.home', 
		//	array(
		//	'deskripsi_selamat_datang' => $getfromdbdesc
		//	) 
		//);
	}
	
	
	
	
}