<?php namespace App\Controllers;

class Account extends BaseController
{
    function __construct()
	{ 
        $this->AccountModel   = model('AccountModel');   
        $this->GeographyModel = model('GeographyModel');   
        $this->PropertyModel  = model('PropertyModel');     
        $this->MessageModel   = model('MessageModel');      
        $this->CrudModel      = model('CrudModel');       
	}

   public function index()
	{
		$data['title'] = "My Account | PropertyRaja.com";
	    return view('frontend/sell-property',$data);    
	}


	public function profile()
	{
		$data['title'] = "Profile | PropertyRaja.com"; 

        $data['profile']   = $this->AccountModel->getProfileDetail(cUserId('id'));
        $data['countries'] = $this->GeographyModel->countries();
        $data['states']    = $this->GeographyModel->states();
        $data['cities']    = $this->GeographyModel->cities(); 
        if($this->request->getPost('update_profile'))
        {
           if(! $this->validate([
              'firstname'    => 'required|min_length[1]|max_length[20]|alpha',  
              'lastname'     => 'required|min_length[1]|max_length[20]|alpha',
              'display_name' => 'required|min_length[2]|max_length[20]|alpha',
              'username'    => 'min_length[0]|max_length[15]|alpha_numeric',
              'mobile'      => 'min_length[10]|max_length[15]|numeric',
              'email'       => 'min_length[5]|max_length[40]|valid_email', 
              'address1'    => 'min_length[5]|max_length[100]',
              'address2'    => 'min_length[0]|max_length[100]'  
           ])){
                 $this->session->setFlashdata('alert','<div class="alert alert-danger">'.\Config\Services::validation()->listErrors().'</div>');
        
           }else{
             $toUpdate = [ 
	                'display_name' => $this->request->getPost('display_name'),
	                'username'     => $this->request->getPost('username'),
	                'mobile'       => $this->request->getPost('mobile'),
	                'email'        => $this->request->getPost('email') 
             ];
             $toUpdate2 = [
	               'firstname' => $this->request->getPost('firstname'),
	               'lastname'  => $this->request->getPost('lastname'),
	               'email'     => $this->request->getPost('email'),
	               'address1'  => $this->request->getPost('address1'),
	               'address2'  => $this->request->getPost('address2'),
	               'country'   => $this->request->getPost('country'),
	               'state'     => $this->request->getPost('state'), 
	               'city'      => $this->request->getPost('city'),   
	               'activity'  => $this->request->getPost('myActivity')   
             ];  
             $this->CrudModel->U('_users',['id' => cUserId()],$toUpdate); 
             $this->CrudModel->U('_user_details',['user_id' => cUserId()],$toUpdate2);
             $this->session->setFlashdata('alert',successAlert('Your profile updated!'));
		     return redirect()->to('/profile'); 
           }
        }
	    return view('frontend/profile',$data);    
	}
    

	public function listings() 
	{
		$data['title'] = "My Listings | PropertyRaja.com";
	    return view('frontend/listings',$data);    
	} 


	public function favourites()  
	{
		$data['title'] = "My Favourites | PropertyRaja.com";
		$propertyId = segment(2);
        $data['isInterested'] = $this->PropertyModel->isInterested(cUserId(),$propertyId);
        $data['isFavourited'] = $this->PropertyModel->isFavourited(cUserId(),$propertyId);
        
            if($this->request->uri->getTotalSegments() >= 3 && segment(3) == "interested")
		    {
		       $this->PropertyModel->interestedProperty([
		        'user_id'     => cUserId(),
		        'property_id' => $propertyId,
		        'created_at'  => date('Y-m-d h:i:s'),
		        'updated_at'  => date('Y-m-d h:i:s'),
		        'status'      => 1
		      ]); 
		       $this->session->setFlashdata('alert','<div class="alert alert-success">Your contact details forwarded!</div>');
		       return redirect()->to('/favourites/');

		    }elseif($this->request->uri->getTotalSegments() >= 3 && segment(3) == "favourite"){  

		       $this->PropertyModel->upsertFavouriteProperty([
		        'user_id'     => cUserId(), 
		        'property_id' => $propertyId,
		        'created_at'  => date('Y-m-d h:i:s'),
		        'updated_at'  => date('Y-m-d h:i:s'),
		        'status'      => 1
		      ]); 
		       if($data['isFavourited'] == true){
		           $this->session->setFlashdata('alert',warningAlert('Property removed from your favourites!'));
		       }else{
		           $this->session->setFlashdata('alert',successAlert('Property added to your favourites!'));
		       }
		       
		       return redirect()->to('/favourites/');
		    }


		     if($this->PropertyModel->getPropertiesByUserFavourite(cUserId())) 
		     { 
               $data['properties'] = $this->PropertyModel->getPropertiesByUserFavourite(cUserId());
		     }  
	    return view('frontend/favourites',$data);   
	}  


	public function messages()
	{ 
		$data['title'] = "Messages | PropertyRaja.com"; 
		$data['users'] = $this->MessageModel->getChatUsers(cUserId());
		//print_r($data['users']);exit; 
		$data['pid']   = $this->request->getGet('pid');
		$data['fk_user_id'] = $this->request->getGet('uid'); 

		if($data['pid'] && $data['fk_user_id'])   
		{  
            $data['getPropertyDetail'] = $this->PropertyModel->getPropertyDetail($data['pid']);
            $data['getMessages'] = $this->MessageModel->getMessages($data['pid'],$data['fk_user_id'],cUserId()); 
		} 

	    return view('frontend/messages',$data);    
	}


	public function notifications()
	{
		$data['title'] = "Notifications | PropertyRaja.com";
	    return view('frontend/notifications',$data);     
	}


}