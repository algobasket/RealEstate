<?php 
namespace App\Controllers\Backend;

use CodeIgniter\Controller;  

class Dashboard extends BackendController   
{   
	
	function index()
	{
		$data['title'] = "Dashboard";
		return view('backend/dashboard',$data);
	}

}	