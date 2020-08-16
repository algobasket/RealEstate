<?php namespace App\Controllers;

class Dashboard extends BaseController
{   
	function __construct()
	{
        $this->AccountModel   = model('AccountModel');   
        $this->GeographyModel = model('GeographyModel');   
        $this->PropertyModel  = model('PropertyModel');
        $this->StatisticModel  = model('StatisticModel');
        helper('number');   
	}

	public function index()
	{
		$data['title']            = "Agent Dashboard | Welcome to PropertyRaja"; 
		$data['featured']         = $this->PropertyModel->getAllFeaturedProperties();
		$data['cities']           = $this->GeographyModel->cities();  
		$data['property_type']    = $this->PropertyModel->getPropertyType(); 
		$data['totalSalesAmount'] = $this->PropertyModel->totalSalesAmountByUser(cUserId());
		$data['totalActual']      = $this->StatisticModel->totalActualAmountByUser(cUserId()); 
		$data['totalTarget']      = $this->StatisticModel->totalTargetAmountByUser(cUserId()); 
	    return view('frontend/dashboard/dashboard',$data);        
	}


	public function listings()
	{
	   $data['title'] = "Agent Listings | Welcome to PropertyRaja";
	   $data['listings'] = $this->PropertyModel->getPropertiesByUserId(cUserId());
	   return view('frontend/dashboard/listings',$data);  
	}



	public function properties()
	{  
	   return view('frontend/dashboard/properties',$data);
	}



	public function appointments()
	{
		$data['title'] = "Agent Appointments | Welcome to PropertyRaja"; 
	   return view('frontend/dashboard/appointments',$data);
	}




	public function leads() 
	{
	   $data['title'] = "Agent Leads | Welcome to PropertyRaja";
	   $data['listings'] = $this->PropertyModel->getPropertiesByUserId(cUserId());
	   return view('frontend/dashboard/leads',$data);
	}




	public function sales()
	{
	   return view('frontend/dashboard/sales',$data);
	}




	public function profit_target()
	{
       return view('frontend/dashboard/profit_target',$data);
	}




	public function contacts()
	{
		return view('frontend/dashboard/contacts',$data);
	}




	public function messages()
	{
		return view('frontend/dashboard/messages',$data);
	}




	public function reviews()
	{
		return view('frontend/dashboard/reviews',$data);
	}




	public function credits() 
	{
		return view('frontend/dashboard/credits',$data); 
	}




	public function notifications()
	{
		return redirect()->to('/notifications');
	}  

}	