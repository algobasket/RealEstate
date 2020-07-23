<?php namespace App\Controllers;

class Property extends BaseController
{
   
   function __construct()
	{
        $this->AccountModel   = model('AccountModel');   
        $this->GeographyModel = model('GeographyModel');   
        $this->PropertyModel  = model('PropertyModel');  
	}

    public function index()
	{
		$data['title'] = "List your property for sale";
	    return view('frontend/sell-property',$data);    
	}

	public function addProperty()
	{   
	    helper('property');
		$data['title'] = "Add Property | PropertyRaja.com";
		$data['property_type'] = $this->PropertyModel->getPropertyType();
		$data['profile']   = $this->AccountModel->getProfileDetail(24);
        $data['cities']    = $this->GeographyModel->cities(); 
        $data['amenities'] = $this->PropertyModel->getPropertyAmeneties(); 
        $data['pt'] = "";
       
        if($this->request->uri->getTotalSegments() >= 3)
        {
           $data['pt'] = segment(3);
        }  

		if($this->request->getPost('add_property'))
		{
            if($this->request->getPost('property_type') == 1)
            {
                 if($this->request->getPost('listing_type_hide') == "sell")
                 {
                       $array = [
                          'user_id'        => cUserId(), 
                          'listing_type'   => "sell",  
                          'property_type'  => $this->request->getPost('property_type'),  
                          'complex_type'   => $this->request->getPost('complex_type'),  
                          'title'          => $this->request->getPost('title'),  
                          'description'    => $this->request->getPost('description'),  
                          'specification'  => $this->request->getPost('specification'),
                          'facing'         => $this->request->getPost('facing'),
                          'amenities'      => json_encode($this->request->getPost('amenities'),true),      
                          'bhk_type'       => $this->request->getPost('bhk_type'),      
                          'status_type'    => $this->request->getPost('status_type'),      
                          'city'           => $this->request->getPost('city'),      
                          'locality'       => $this->request->getPost('locality'),      
                          'condition_type' => $this->request->getPost('condition_type'),      
                          'builtup_area'   => $this->request->getPost('builtup_area'),      
                          'project_name'   => $this->request->getPost('project_name'),      
                          'unit_price'     => $this->request->getPost('unit_price'),      
                          'total_price'    => $this->request->getPost('total_price'),      
                          'launch_date'    => $this->request->getPost('launch_date'),      
                          'posession_date' => $this->request->getPost('posession_date'),      
                          'rera_id'        => $this->request->getPost('rera_id'),      
                          'approving_authority' => $this->request->getPost('approving_authority'),       
                          'created_at'   => date_format(date_create('2020-01-01'), 'Y-m-d h:i:s'), 
			              'updated_at'   => date_format(date_create('2020-01-01'), 'Y-m-d h:i:s'),
			              'status'       => 1
                      ];
                      //print_r($array); 
                      $this->PropertyModel->addProperty($array); 
                 }
                 if($this->request->getPost('listing_type_hide') == "rent")
                 {
                       $array = [
                          'user_id'        => cUserId(), 
                          'listing_type'   => "rent", 
                          'city'           => $this->request->getPost('city'), 
                          'locality'       => $this->request->getPost('locality'), 
                          'property_type'  => $this->request->getPost('property_type'),
                          'bhk_type'       => $this->request->getPost('bhk_type'),  
                          'complex_type'   => $this->request->getPost('complex_type'), 
                          'status_type'    => $this->request->getPost('status_type'),
                          'builtup_area'   => $this->request->getPost('builtup_area'), 
                          'rent_per_mon'   => $this->request->getPost('rent_per_mon'),  
                          'title'          => $this->request->getPost('title'),  
                          'description'    => $this->request->getPost('description'),  
                          'specification'  => $this->request->getPost('specification'),
                          'facing'         => $this->request->getPost('facing'),
                          'amenities'      => json_encode($this->request->getPost('amenities'),true),           
                          'project_name'   => $this->request->getPost('project_name'),      
                          'created_at'     => date_format(date_create('2020-01-01'), 'Y-m-d h:i:s'), 
			              'updated_at'     => date_format(date_create('2020-01-01'), 'Y-m-d h:i:s'),
			              'status'         => 1 
                      ];  
                      //print_r($array); 
                      $this->PropertyModel->addProperty($array);
                 }
            }
            if($this->request->getPost('property_type') == 2)
            {
                 if($this->request->getPost('listing_type_hide') == "sell")
                 {
                       
                 }
                 if($this->request->getPost('listing_type_hide') == "rent")
                 {

                 }
            }
            if($this->request->getPost('property_type') == 3)
            {
                 if($this->request->getPost('listing_type_hide') == "sell")
                 {
                       
                 }
                 if($this->request->getPost('listing_type_hide') == "rent")
                 {

                 }
            }
            if($this->request->getPost('property_type') == 4)
            {
                 if($this->request->getPost('listing_type_hide') == "sell")
                 {
                       
                 }
                 if($this->request->getPost('listing_type_hide') == "rent")
                 {

                 }
            }
            if($this->request->getPost('property_type') == 5)
            {
                 if($this->request->getPost('listing_type_hide') == "sell")
                 {
                       
                 }
                 if($this->request->getPost('listing_type_hide') == "rent")
                 {

                 }
            }
            if($this->request->getPost('property_type') == 6)
            {
                 if($this->request->getPost('listing_type_hide') == "sell")
                 {
                       
                 }
                 if($this->request->getPost('listing_type_hide') == "rent")
                 {

                 }
            }
		}  
	    return view('frontend/add-property',$data);    
	}

	function test(){
		echo cUserId();
	}

}