<?php namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Auth extends BaseController
{   
	
	function __construct()
	{
        $this->AuthModel = model('AuthModel');   
	}

	public function index()
	{
		$data['title'] = "Welcome to PropertyRaja";
		return view('landing',$data);        
	} 
    
	public function login() 
	{ 
		$data['title'] = "Login to PropertyRaja";
		$data['role'] = "customer";
		
		//$authModel = new AuthModel();  

		if($this->request->getPost('sign-in')){
           if(! $this->validate([
              'mobile-number' => 'required|min_length[10]|max_length[12]|numeric',  
              'password'      => 'required|min_length[6]|max_length[20]',
           ])){
               
           }else{
                $status = $this->AuthModel->login(
                	$this->request->getPost('mobile-number'),
                	$this->request->getPost('password'),$data['role']); 
                if($status){
                   $this->session->set([
                     'userId'  => $status['id'],
                     'display' => $status['display_name'],
                     'role'    => $status['role'],
                     'email'   => $status['email']
                   ]);
                   return redirect()->to('/browse');
                }else{
                 $this->session->setFlashdata('alert','<div class="alert alert-danger">User Not Found</div>');
                 return redirect()->to('/login');
               } 
           }
		}     
		return view('frontend/login-auth',$data);      
	}


	public function login_agent()  
	{
		$data['title'] = "Agent Login to PropertyRaja";
		$data['role']  = "agent";
		if($this->request->getPost('sign-in')){
           if(! $this->validate([
              'mobile-number' => 'required|min_length[10]|max_length[12]|numeric',  
              'password'      => 'required|min_length[6]|max_length[20]'
           ])){
               
           }else{
                $status = $this->AuthModel->login(
                	$this->request->getPost('mobile-number'),
                	$this->request->getPost('password'),
                	$data['role']); 

                if($status){
                   $this->session->set([  
                     'userId'  => $status['id'],   
                     'display' => $status['display_name'],
                     'role'    => $status['role'],
                     'email'   => $status['email']
                   ]);
                   return redirect()->to('/dashboard');  
                }else{
                 $this->session->setFlashdata('alert','<div class="alert alert-danger">Agent Not Found</div>');
                 return redirect()->to('/login-agent');
               } 
           }
		}     
		return view('frontend/login-auth',$data);      
	}

	public function login_developer()      
	{
		$data['title'] = "Developer Login to PropertyRaja";
		$data['role']  = "developer";
		if($this->request->getPost('sign-in')){
           if(! $this->validate([
              'mobile-number' => 'required|min_length[10]|max_length[12]|numeric',  
              'password'      => 'required|min_length[6]|max_length[20]'
           ])){
               
           }else{
                $status = $this->AuthModel->login(
                	$this->request->getPost('mobile-number'),
                	$this->request->getPost('password'),
                	$data['role']); 

                if($status){
                   $this->session->set([
                     'userId'  => $status['id'],   
                     'display' => $status['display_name'],
                     'role'    => $status['role'],
                     'email'   => $status['email']
                   ]);
                   return redirect()->to('/dashboard');  
                }else{
                 $this->session->setFlashdata('alert','<div class="alert alert-danger">Agent Not Found</div>');
                 return redirect()->to('/login-agent');
               } 
           }
		}    
		return view('frontend/login-auth',$data);       
	}  

	public function login_staff()
	{ 
		$data['title'] = "Staff Login to PropertyRaja";
		$data['role']  = "staff"; 
		if($this->request->getPost('sign-in')){
           if(! $this->validate([
              'mobile-number' => 'required|min_length[10]|max_length[12]|numeric',  
              'password'      => 'required|min_length[6]|max_length[20]'
           ])){
               
           }else{
                $status = $this->AuthModel->login(
                	$this->request->getPost('username'), 
                	$this->request->getPost('password'), 
                	$this->request->getPost('access_code'),     
                	$data['role']); 

                if($status){
                   $this->session->set([
                     'userId'  => $status['id'],   
                     'display' => $status['display_name'],
                     'role'    => $status['role'],
                     'email'   => $status['email']
                   ]);
                   return redirect()->to('/dashboard');  
                }else{
                 $this->session->setFlashdata('alert','<div class="alert alert-danger">Agent Not Found</div>');
                 return redirect()->to('/login-agent');
               } 
           }
		}    
		return view('frontend/login-auth',$data);      
	} 

	public function register()  
	{ 
		$data['title'] = "Register to PropertyRaja"; 

        if($this->request->getPost('sign-up')){  

           if( ! $this->validate([   
              'display-name'  => 'required|max_length[15]', 
              'email'         => 'required|min_length[10]|max_length[20]|valid_email',        
              'mobile-number' => 'required|min_length[10]|max_length[12]|numeric',   
              'password'      => 'required|min_length[6]|max_length[20]'    
           ])){ 
               $this->session->setFlashdata('alert','<div class="alert alert-danger">'.\Config\Services::validation()->listErrors().'</div>');
           }else{
           	       $rolename = $this->request->getPost('rolename');
	              if($rolename == "developer" || $rolename == "agent"){
	                 $access_code = strtoupper(uniqid());
	                }else{
	              	 $access_code = 0; 
	                }   
               $uid = $this->AuthModel->register([
			      'display_name' => $this->request->getPost('display-name'), 
			      'email'        => $this->request->getPost('email'),  
			      'mobile'       => $this->request->getPost('mobile-number'),  
			      'password'     => $this->request->getPost('password'),
			      'ip'           => $this->request->getIPAddress(),
			      'access_code'  => $access_code,
			      'role'         => $this->request->getPost('rolename'),
			      'created_at'   => date_format(date_create('2020-01-01'), 'Y-m-d h:i:s'), 
			      'updated_at'   => date_format(date_create('2020-01-01'), 'Y-m-d h:i:s')
		       ],[
                  'firstname' => "",
                  'lastname'  => "",
                  'email'     => $this->request->getPost('email'),
                  'activity'  => $this->request->getPost('purpose'),
                  'created_at'   => date_format(date_create('2020-01-01'), 'Y-m-d h:i:s'), 
			      'updated_at'   => date_format(date_create('2020-01-01'), 'Y-m-d h:i:s')
		       ]);
		       $agent = $this->request->getUserAgent(); 
		       $this->AuthModel->saveUserSessLog([
                  'user_id'    => $uid,
                  'ip'         => $this->request->getIPAddress(),
                  'user_agent' => $agent->getAgentString(), 
                  'operation'  =>   "register",
                  'created_at'   => date_format(date_create('2020-01-01'), 'Y-m-d h:i:s'), 
			      'updated_at'   => date_format(date_create('2020-01-01'), 'Y-m-d h:i:s')
		       ]); 
		       $this->session->setFlashdata('alert','<div class="alert alert-success">Signup Successful</div>');
		       return redirect()->to('/register');
           }
		}   
		return view('frontend/register',$data);         
	} 

    

    public function logout() 
    { 
    	$array_items = ['userId', 'email','display','role'];
        $this->session->remove($array_items);
        $this->session->setFlashdata('alert','<div class="alert alert-success">Logged out from all devices</div>');
        return redirect()->to('/login'); 
    } 


}	