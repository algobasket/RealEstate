<?php namespace App\Controllers;

class Dashboard extends BaseController
{   


	function __construct()
	{
        $this->AccountModel   = model('AccountModel');   
        $this->GeographyModel = model('GeographyModel');   
        $this->PropertyModel  = model('PropertyModel');
        $this->StatisticModel  = model('StatisticModel');
        $this->CrudModel       = model('CrudModel'); 
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
    


    public function projects()
	{
		   $data['title'] = "Developer Projects | Welcome to PropertyRaja";
		   $section = segment(3);
		   if($section == "add")
		   {   
		   	  $data['section'] = 'add';
		   	  if($this->request->getPost('addProject'))
		   	  {
	              $this->CrudModel->C('_project',[ 
	             'user_id' => cUserId(),
	             'project_name' => $this->request->getPost('project_name'), 
	             'created_at'  => date('Y-m-d h:i:s'),
	             'updated_at'  => date('Y-m-d h:i:s'),
	             'status' => $this->request->getPost('status') 
	          ]);
	             $this->session->setFlashdata('alert',successAlert('Project Created!')); 
	             return redirect()->to('/dashboard/projects/add');    
		   	  }      
		   }

		   if($section == "edit")
		   {  
		   	  $data['section'] = 'edit';
		   	  if($this->request->getPost('editProject'))
		   	  {
	              $this->CrudModel->U('_project',['id' => segment(4)],[ 
	             'user_id' => cUserId(),
	             'project_name' => $this->request->getPost('project_name'), 
	             'updated_at'  => date('Y-m-d h:i:s'), 
	             'status' => $this->request->getPost('status') 
	          ]);
	             $this->session->setFlashdata('alert',successAlert('Project Updated!')); 
	             return redirect()->to('/dashboard/projects/edit/'.segment(4));    
		   	  }     
	          $data['projects'] = $this->PropertyModel->getProjects(
	          	$projectId = segment(4),
	          	$userId = cUserId(), 
	          	$status = NULL);     
		   } 

		   if($section == "all" || $section == "" || $section == NULL) 
		   {  
		   	  $data['section'] = 'all';
	          $data['projects'] = $this->PropertyModel->getProjects(
	          	$projectId = NULL,
	          	$userId = cUserId(),
	          	$status = NULL);    
		   } 
	     return view('frontend/dashboard/projects',$data);    
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