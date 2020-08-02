<?php 
namespace App\Controllers\Backend;

use CodeIgniter\Controller;  

class Properties extends BackendController 
{
   
  function __construct()
	{
      $this->AccountModel   = model('AccountModel');   
      $this->GeographyModel = model('GeographyModel');   
      $this->PropertyModel  = model('PropertyModel');  
      $this->CrudModel      = model('CrudModel');  
	}   



  public function index()    
	{ 
       $data['title'] = "All Property | PropertyRaja.com";
       $data['properties'] = $this->PropertyModel->getProperties();
	     return view('backend/properties',$data);               
	}  

  public function view()  
  {
       $data['title'] = "View Property | PropertyRaja.com"; 
       $data['section'] = "viewProperty";
       $data['propertyDetail'] = $this->PropertyModel->getPropertyDetail(segment(4));
       return view('backend/properties',$data);     
  }


  public function propertyTypes()      
  {   
     $data['title'] = "Property Types | PropertyRaja.com";
     
     if($this->request->getPost('editPropertyType'))
     {  
        $data = [
          'type_name'  => $this->request->getPost('type_name'),
          'updated_at' => date('Y-m-d h:i:s'),
          'status' => $this->request->getPost('status')
        ];
          $result = $this->PropertyModel->updatePropertyType(Segment(5),$data);
          if($result == true)
          {  
             $this->session->setFlashdata('alert','<div class="alert alert-success">PropertyType Updated</div>');
             return redirect()->to('/backend/properties/propertyTypes');
          }
     }

     if($this->request->getPost('addPropertyType')) 
     {    
          $data = [ 
                'type_name'  => $this->request->getPost('type_name'),
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
                'status'     => $this->request->getPost('status')
              ];
          $result = $this->PropertyModel->addPropertyType($data); 
          if($result == true)
          {  
             $this->session->setFlashdata('alert','<div class="alert alert-success">PropertyType Added</div>');
             return redirect()->to('/backend/properties/propertyTypes');
          }
     } 

     $data['section'] = segment(4);
     if($data['section'] == "edit")
     {  
         $data['getPropertyTypeFromPropertyId'] = $this->PropertyModel->getPropertyTypeFromPropertyId(segment(5));
     }
     if($data['section'] == "delete")
     {  
         $this->PropertyModel->deletePropertyType(Segment(5));
         $this->session->setFlashdata('alert','<div class="alert alert-danger">PropertyType Deleted</div>');
         return redirect()->to('/backend/properties/propertyTypes');
     }
     
     $data['getPropertyType'] = $this->PropertyModel->getPropertyType();
     $data['allStatus'] = $this->AccountModel->allStatus();
     return view('backend/property-types',$data);    
  }  




	public function addProperty()
	{   
	      helper('property');
    		$data['title']     = "Add Property | PropertyRaja.com";  
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
                              'bhk_type'       => $this->request->getPost('bhk_type'),      
                              'status_type'    => $this->request->getPost('status_type'), 
                              'condition_type' => $this->request->getPost('condition_type'),     
                              'title'          => $this->request->getPost('title'),  
                              'description'    => $this->request->getPost('description'),  
                              'specification'  => $this->request->getPost('specification'), 
                              'facing'         => $this->request->getPost('facing'),
                              'amenities'      => json_encode($this->request->getPost('amenities'),true),         
                              'city'           => $this->request->getPost('city'),      
                              'locality'       => $this->request->getPost('locality'),           
                              'builtup_area'   => $this->request->getPost('builtup_area'),      
                              'project_name'   => $this->request->getPost('project_name'),      
                              'floor'          => $this->request->getPost('floor'),        
                              'unit_price'     => $this->request->getPost('unit_price'),      
                              'total_price'    => $this->request->getPost('total_price'),      
                              'project_total_area'    => $this->request->getPost('project_total_area'),       
                              'launch_date'    => $this->request->getPost('launch_date'),      
                              'posession_date' => $this->request->getPost('posession_date'),      
                              'rera_id'        => $this->request->getPost('rera_id'),      
                              'approving_authority' => $this->request->getPost('approving_authority'),       
                              'has_ads'        => $this->request->getPost('ads'),           
                              'created_at'   => date('Y-m-d h:i:s'), 
    			              'updated_at'   => date('Y-m-d h:i:s'), 
    			              'status'       => $this->request->getPost('pub_pri')
                          ];

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
                              'floor'          => $this->request->getPost('floor'),
                              'has_ads'        => $this->request->getPost('ads'),      
                              'created_at'   => date('Y-m-d h:i:s'), 
    			              'updated_at'   => date('Y-m-d h:i:s'),
    			              'status'         => $this->request->getPost('pub_pri') 
                          ];       
                     }
                          $propertyId = $this->PropertyModel->addProperty($array);
                          $this->session->setFlashdata('alert','<div class="alert alert-success">Property Uploaded</div>');
                          return redirect()->to('/add-property-images/'.$propertyId);
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

  


	public function addPropertyImages()
	{      
		     $data['title'] = "Add Photos | PropertyRaja.com"; 
         $exts = ['jpg','png','JPG','PNG','JPEG'];    

         if($this->request->getPost('add-images'))
          {        
	           if($imagefile = $this->request->getFiles())
						{  $i = 0;
						   foreach($imagefile['images'] as $img)
						   {
						      if ($img->isValid() && ! $img->hasMoved())
						      {      
						      	     if(in_array($img->getClientExtension(),$exts))
						      	     {         
						      	     	       if($img->getSizeByUnit('mb') > 10)
						      	     	       {
                                      $invalid_size =  "Please upload image less than 10MB";
						      	     	       }else{
                                                       $newName = $img->getRandomName();
											           if($img->move(WRITEPATH.'../public/property-images', $newName)){ 
											           	      $insert = [
							                                      'image_name'  => $newName,
							                                      'property_id' => $this->request->uri->getSegment(2),
							                                      'user_id'     => cUserId(),
							                                      'mime_type'   => $img->getClientMimeType(),
							                                      'created_at'  => date('Y-m-d h:i:s'), 
									                                  'updated_at'  => date('Y-m-d h:i:s'),
									                                  'status'      => 1
											           	      ];  
											           	   $this->PropertyModel->addPropertyImages($insert);
											           	   //$this->watermarkPropertyImages($newName);
											           	   $i++;  
											             }
						      	     	      }
                                               
						      	     }else{
                                       $invalid_ext = $img->getClientExtension() . " - Invalid image extension";
						      	     }
						           
						      }
						   }
						}

				   if($i > 0)
				   {
                      $this->session->setFlashdata('alert','<div class="alert alert-success">Your property image uploaded!</div>');
				   }   
	          	   if(@$invalid_ext)
	          	   {
	          	   	  $this->session->setFlashdata('alert','<div class="alert alert-danger">'.$invalid_ext.'</div>');
	          	   }
	          	   if(@$invalid_size)
	          	   {
	          	   	  $this->session->setFlashdata('alert','<div class="alert alert-danger">'.$invalid_size.'</div>');
	          	   }

          	       return redirect()->to('/add-property-images/'.segment(2));  
         }
         $data['propertyImages'] = $this->getPropertyImages(segment(2));   
		 return view('frontend/add-property-images',$data); 
	}

	public function getPropertyImages($id)
	{   
		if(is_array($array = $this->PropertyModel->getPropertyImages($id))){
           return $array;
		} 
	} 




  public function amenities()
   {    
        $data['title'] = "Amenities | PropertyRaja.com";
        if($this->request->getPost('editAmenities')) 
        {  
            $data = [
              'name'       => $this->request->getPost('name'),
              'updated_at' => date('Y-m-d h:i:s'),
              'status'     => $this->request->getPost('status')
            ];
            $result = $this->CrudModel->U('_amenities',['id' => Segment(5)],$data);
            if($result == true)
            {  
               $this->session->setFlashdata('alert','<div class="alert alert-success">Amenities Updated</div>');
               return redirect()->to('/backend/properties/amenities');
            }
        } 
       if($this->request->getPost('addAmenities')) 
       {    
            $data = [ 
                  'name'       => $this->request->getPost('name'),
                  'created_at' => date('Y-m-d h:i:s'),
                  'updated_at' => date('Y-m-d h:i:s'),
                  'status'     => $this->request->getPost('status')
                ];
            $result = $this->CrudModel->C('_amenities',$data);   
            if($result == true)
            {  
               $this->session->setFlashdata('alert','<div class="alert alert-success">Amenities Added</div>');
               return redirect()->to('/backend/properties/amenities');
            } 
       } 
       $data['section']    = segment(4);
       if($data['section'] == "edit")
       {  
           $data['getAmenityFromAmenityId'] = $this->PropertyModel->getAmenityFromAmenityId(segment(5));
       }
       if($data['section'] == "delete")
       {  
           $this->CrudModel->D('_amenities',['id' => Segment(5)]);
           $this->session->setFlashdata('alert','<div class="alert alert-danger">Amenities Deleted</div>');
           return redirect()->to('/backend/properties/amenities');
       }  
       $data['getAmenities'] = $this->PropertyModel->getPropertyAmeneties();
       $data['allStatus'] = $this->AccountModel->allStatus();
       return view('backend/amenities',$data);   
   }

   
  

  public function edit()
  { 
       $data['title'] = "Edit Property | PropertyRaja.com";
       $data['property-detail'] = $this->PropertyModel->getPropertyDetail(segment(4));
       $data['property_type'] = $this->PropertyModel->getPropertyType();
       $data['cities']    = $this->GeographyModel->cities(); 
       $data['amenities'] = $this->PropertyModel->getPropertyAmeneties();
       $data['profile']   = $this->AccountModel->getProfileDetail(cUserId());

       $data['section']="editProperty"; 
       return view('backend/properties',$data);  
  } 



  public function delete()
  {
     $pid = segment(4);   
     $this->PropertyModel->deleteProperty($pid); 
     return redirect()->to('/backend/properties/index'); 
  }    


	 public function watermarkPropertyImages($filename)
	  {
       \Config\Services::image('imagick')
        ->withFile(WRITEPATH.'uploads/'.$filename)
        ->text('Copyright 2020 - PropertyRaja.com', [
            'color'      => '#fff',
            'opacity'    => 0.5,
            'withShadow' => true,
            'hAlign'     => 'center',
            'vAlign'     => 'bottom',
            'fontSize'   => 20
        ]) 
        ->save(WRITEPATH.'uploads/watermarked/'.$filename);
        return true;
	   }




	   function test()  
     {  
     
		   print_r($this->PropertyModel->getAmenetiesByPropertyId(20));  
	   }

 

} 