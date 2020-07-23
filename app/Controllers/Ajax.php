<?php namespace App\Controllers;

class Ajax extends BaseController
{   
	
	function __construct()
	{
        $this->AccountModel   = model('AccountModel');   
        $this->GeographyModel = model('GeographyModel');   
        $this->PropertyModel  = model('PropertyModel');      
	} 

   function addPropertyPageLoad()
   {
   	    $data['property_type'] = $this->PropertyModel->getPropertyType();
		$data['profile']   = $this->AccountModel->getProfileDetail(24);
        $data['cities']    = $this->GeographyModel->cities(); 

         $data['property_type_id']     = $this->request->getPost('property_type');  
         $data['listing_type']         = $this->request->getPost('listing_type'); 
         echo view('frontend/ajax/add-property',$data,['saveData' => true]);  
   } 

}	