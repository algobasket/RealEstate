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
		    $data['profile']       = $this->AccountModel->getProfileDetail(24);
        $data['cities']        = $this->GeographyModel->cities(); 

         $data['property_type_id']     = $this->request->getPost('property_type');  
         $data['listing_type']         = $this->request->getPost('listing_type'); 
         echo view('frontend/ajax/add-property',$data,['saveData' => true]);  
   }

   function searchPropertyCount_Ajax()  
   {    
        
        if($this->request->getPost('listingType') != "any")
        {
           $array['listing_type'] = $this->request->getPost('listingType');
        }
        if($this->request->getPost('propertyType') != "any")
        {
           $array['property_type'] = $this->request->getPost('propertyType');
        }
        if($this->request->getPost('priceType') != "any")
        {
           $array['total_price <='] = $this->request->getPost('priceType');
        }
        if($this->request->getPost('cityType') != "any")
        {
           $array['city'] = $this->request->getPost('cityType');
        }
        $result = $this->PropertyModel->searchProperty($array);
        $queryString = http_build_query($array);
        if(count($result) > 0 )
        {
           echo '<a href="'.base_url().'/browse/?'.$queryString.'" class="btn btn-success btn-block" style="margin-top:10px">'.count($result).' matching properties <img src="'.base_url().'/images/smiley.png" /></a>'; 
        }else{
           echo '<a href="#" class="btn btn-success btn-block disabled" style="margin-top:10px">No matching properties found <img src="'.base_url().'/images/smiley-1.png" /></a>'; 
        }   
   } 





}	