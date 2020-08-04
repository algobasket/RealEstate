<?php namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Auth extends BaseController
{   
	
	function __construct()
	{
        $this->AuthModel = model('AuthModel');
        $this->MessageModel = model('MessageModel');
        helper('cookie');     
	} 




	public function index()
	{
		$data['title'] = "Welcome to PropertyRaja";
		return view('landing',$data);        
	} 
    



	public function login()  
	{ 
		$data['title'] = "Login to PropertyRaja";
		$data['role']  = "customer";        
		
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
                  $user = [ 
                           'userId'  => $status['id'],
                           'display' => $status['display_name'],
                           'role'    => $status['role'],
                           'email'   => $status['email']   
                        ];
                        
                $remember = $this->request->getPost('remember_me'); 
                
                if($status)
                {
                    $this->session->set($user);

                    if($remember == 1)  
                    { 
                       return redirect()->to('/Auth/saveUserCookie');           
                    }  
                    return redirect()->to('/browse'); 
                }else{
                 $this->session->setFlashdata('alert','<div class="alert alert-danger">User Not Found</div>');
                 return redirect()->back()->withInput();
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
                 return redirect()->back()->withInput(); 
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
                 return redirect()->back()->withInput();
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
              'username'    => 'required|min_length[5]|max_length[15]',  
              'password'    => 'required|min_length[6]|max_length[20]',
              'access_code' => 'required|min_length[5]|max_length[20]|alpha_numeric',
           ])){
               
           }else{
                $status = $this->AuthModel->backendLogin(
                	$this->request->getPost('username'),  
                	$this->request->getPost('password'), 
                	$this->request->getPost('access_code'),     
                	$this->request->getPost('role'));  

                if($status){
                   $this->session->set([
                     'userId'  => $status['id'],   
                     'display' => $status['display_name'],  
                     'role'    => $status['role'],
                     'email'   => $status['email']
                   ]);
                   return redirect()->to('/backend/dashboard/index');  
                }else{
                 $this->session->setFlashdata('alert','<div class="alert alert-danger">Staff Not Found</div>');
                 //return redirect()->to('/login-staff');
                  return redirect()->back()->withInput(); 
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
              'email'         => 'required|min_length[10]|max_length[30]|valid_email',        
              'mobile-number' => 'required|min_length[10]|max_length[12]|numeric',    
              'password'      => 'required|min_length[6]|max_length[20]'     
           ])){ 
               $this->session->setFlashdata('alert','<div class="alert alert-danger">'.\Config\Services::validation()->listErrors().'</div>');
                return redirect()->back()->withInput(); 
           }else{
           	       $rolename = $this->request->getPost('rolename');
	              if($rolename == "developer" || $rolename == "agent"){
	                 $access_code = strtoupper(uniqid());
	                }else{
	              	 $access_code = 0;    
	                }   
               $uid = $this->AuthModel->register([
			      'display_name' => $this->request->getPost('display-name'),
            'username'     => $this->request->getPost('display-name').'.'.time(), 
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
      
        delete_cookie('userCookie');   

    	  $array_items = ['userId', 'email','display','role'];
        $this->session->remove($array_items);
        $this->session->setFlashdata('alert','<div class="alert alert-success">Logged out from all devices</div>'); 
        echo "<script>window.location.href='".base_url()."/login'</script>";   
    }


    public function saveUserCookie() 
    { 
        $userCookie = json_encode(array( 
           'userId'  => $this->session->get('userId'),
           'display' => $this->session->get('display'),
           'role'    => $this->session->get('role'),
           'email'   => $this->session->get('email')
         ),true);
        $userCookie = (string)$userCookie;     
        set_cookie('userCookie',$userCookie,'3600');
        echo "<script>window.location.href='".base_url()."/browse'</script>";  
    }


    public function sendMessage() 
    {  
       $to  = '8800580884';    
       $msg = 'hello test'; 
       $sendMessage = $this->MessageModel->sendMessage($to,$msg);
       print_r($sendMessage); 
    }   



}	