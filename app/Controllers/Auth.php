<?php namespace App\Controllers;

class Auth extends BaseController
{
	public function index()
	{
		$data['title'] = "Welcome to PropertyRaja";
		return view('landing',$data);        
	} 
    
	public function login() 
	{ 
		$data['title'] = "Login to PropertyRaja";
		$data['role'] = "customer";
		
		$authModel = new AuthModel();  

		if($this->request->getPost('sign-in')){
           if(! $this->validate([
              'mobile-number' => 'required|min_length[10]|max_length[12]|numeric',  
              'password'      => 'required|min_length[6]|max_length[20]',
           ])){
               
           }else{
                
           }
		}     
		return view('frontend/login-auth',$data);      
	}   

	public function login_agent()  
	{
		$data['title'] = "Agent Login to PropertyRaja";
		$data['role']  = "agent";
		return view('frontend/login-auth',$data);      
	} 

	public function login_staff()
	{ 
		$data['title'] = "Staff Login to PropertyRaja";
		$data['role']  = "staff";
		return view('frontend/login-auth',$data);      
	} 

	public function register()
	{ 
		$data['title'] = "Register to PropertyRaja";    
		return view('frontend/register',$data);       
	}



}	