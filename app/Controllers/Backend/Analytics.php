<?php 
namespace App\Controllers\Backend;

use CodeIgniter\Controller;  

class Analytics extends BackendController   
{   
	
	function seo_analytics()
	{
		$data['title'] = "SEO Analytics";
		return view('backend/seo-analytics',$data);
	}

	function country_city_state()
	{
		$data['title'] = "Country State City";
		return view('backend/country-city-states',$data);
	}

	function statistics()
	{
		$data['title'] = "Statistics";
		return view('backend/statistics',$data); 
	}

}