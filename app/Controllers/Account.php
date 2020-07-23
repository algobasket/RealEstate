<?php namespace App\Controllers;

class Account extends BaseController
{
   function __construct()
	{
        $this->AccountModel = model('AccountModel');   
        $this->GeographyModel = model('GeographyModel');   
	}

   public function index()
	{
		$data['title'] = "My Account | PropertyRaja.com";
	    return view('frontend/sell-property',$data);    
	}


	public function profile()
	{
		$data['title'] = "Profile | PropertyRaja.com"; 

        $data['profile']   = $this->AccountModel->getProfileDetail(24);
        $data['countries'] = $this->GeographyModel->countries();
        $data['states']    = $this->GeographyModel->states();
        $data['cities']    = $this->GeographyModel->cities(); 
        if($this->request->getPost('update_profile'))
        {
           if(! $this->validate([
              'firstname'   => 'required|min_length[1]|max_length[20]|alpha',  
              'lastname'    => 'required|min_length[1]|max_length[20]|alpha',
              'display_name' => 'required|min_length[2]|max_length[20]|alpha',
              'username'    => 'min_length[0]|max_length[15]|alpha_numeric',
              'mobile'      => 'min_length[10]|max_length[15]|numeric',
              'email'       => 'min_length[5]|max_length[20]|is_email',
              'address1'    => 'min_length[10]|max_length[30]',
              'address2'    => 'min_length[10]|max_length[30]'
           ])){
                 $this->session->setFlashdata('alert','<div class="alert alert-danger">'.\Config\Services::validation()->listErrors().'</div>');
        
           }else{  
            echo "ok";
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
	    return view('frontend/favourites',$data);    
	}


	public function messages()
	{
		$data['title'] = "Messages | PropertyRaja.com";
	    return view('frontend/favourites',$data);    
	}


	public function notifications()
	{
		$data['title'] = "Notifications | PropertyRaja.com";
	    return view('frontend/favourites',$data);    
	}


}