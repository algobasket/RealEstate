<?php 
namespace App\Controllers\Backend;

use CodeIgniter\Controller;  

class Analytics extends BackendController   
{   
	
    function __construct()
	{
      $this->AccountModel   = model('AccountModel');   
      $this->GeographyModel = model('GeographyModel');   
      $this->PropertyModel  = model('PropertyModel');  
      $this->CrudModel      = model('CrudModel');  
	}   

	function seo_analytics()
	{
		$data['title'] = "SEO Analytics";
		return view('backend/seo-analytics',$data);
	} 




	function country_city_state()  
	{
		$data['title'] = "Country State City";
		if($this->request->getPost('addCountry'))
		{
           $array = array(
             'country_name' => $this->request->getPost('country_name'),
             'symbol'     => $this->request->getPost('symbol'),
             'code'       => $this->request->getPost('code'),
             'created_at' => date('Y-m-d h:i:s'),
             'updated_at' => date('Y-m-d h:i:s')
           );
            $this->CrudModel->C('_countries',$array);
            $this->session->setFlashdata('alert','<div class="alert alert-success">New Country Added</div>');
            return redirect()->to('/backend/analytics/country_city_state'); 
		}
		if($this->request->getPost('addCity'))
		{
           $array = array(
             'city_name'  => $this->request->getPost('city_name'),
             'country_id' => $this->request->getPost('country_id'),
             'state_id'   => $this->request->getPost('state_id'),
             'created_at' => date('Y-m-d h:i:s'),
             'updated_at' => date('Y-m-d h:i:s'),
             'status' => 1 
           );
            $this->CrudModel->C('_cities',$array);
            $this->session->setFlashdata('alert','<div class="alert alert-success">New City Added</div>');
            return redirect()->to('/backend/analytics/country_city_state'); 
		}
		if($this->request->getPost('addState'))
		{
           $array = array(
             'state_name' => $this->request->getPost('state_name'),
             'country_id' => $this->request->getPost('country_id'),
             'created_at' => date('Y-m-d h:i:s'),
             'updated_at' => date('Y-m-d h:i:s'),
             'status' => 1
           );
            $this->CrudModel->C('_states',$array);
            $this->session->setFlashdata('alert','<div class="alert alert-success">New State Added</div>');
            return redirect()->to('/backend/analytics/country_city_state'); 
		}
		$data['section'] = segment(4);
		$data['countries'] = $this->GeographyModel->countries();
		$data['states'] = $this->GeographyModel->states();
		$data['cities'] = $this->GeographyModel->cities();
		return view('backend/country-city-states',$data);
	}




	function statistics() 
	{
		$data['title'] = "Statistics";
		return view('backend/statistics',$data); 
	}

}