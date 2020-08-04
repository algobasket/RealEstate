<?php namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Auth extends BaseController
{   
	
	function __construct()
	{
        $this->AuthModel    = model('AuthModel');   
        $this->MessageModel = model('MessageModel'); 
        $this->CrudModel    = model('CrudModel');  
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

		   if($this->request->getPost('sign-in'))
       {
           if(! $this->validate([
              'mobile-number' => 'required|min_length[10]|max_length[12]|numeric',  
              'password'      => 'required|min_length[6]|max_length[20]',
           ])){
               
           }else{
                  $isLoggedIn = $this->AuthModel->login(
                	    $this->request->getPost('mobile-number'),
                	    $this->request->getPost('password'),$data['role']);   
                  $user = [  
                           'userId'  => $isLoggedIn['id'],
                           'display' => $isLoggedIn['display_name'],
                           'role'    => $isLoggedIn['role'],
                           'email'   => $isLoggedIn['email'] 
                          ];       
                       
                $remember = $this->request->getPost('remember_me'); 
                
                if($isLoggedIn)
                {      
                      if($this->sendMessage($isLoggedIn['mobile']) == TRUE)
                      {
                         $this->session->setFlashdata('alert','<div class="alert alert-success">OTP sent to your number '.$isLoggedIn['mobile'].'</div>');
                      }
                      if($remember == 1)
                      {
                         $user['remember'] = 1; 
                      }
                      if($this->request->getGet('redirect'))
                      {
                         $user['redirect'] = $this->request->getGet('redirect'); 
                      }
                      $this->session->set('sessTemp',$user);   
                      return redirect()->to('/Auth/verify');            
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
			           'updated_at'    => date_format(date_create('2020-01-01'), 'Y-m-d h:i:s')
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


    public function verify() 
    {   
        $data['title'] = "Enter OTP | PropertyRaja";
        $sessTemp = $this->session->get('sessTemp');
        if(session('userId'))
        {
           throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(); 
        } 
        if($this->request->getPost('submitOtp'))
        {   
            $inputOtp = trim($this->request->getPost('inputOtp'));  
            if($this->MessageModel->isOtpValid($sessTemp['userId'],$inputOtp) ==TRUE)
            {     
                   $array = array( 
                           'userId'  => $sessTemp['userId'],
                           'display' => $sessTemp['display'],
                           'role'    => $sessTemp['role'],
                           'email'   => $sessTemp['email']
                        );
                    $this->session->set($array);
                    
                   if($sessTemp['remember'] == 1)
                    {   
                        $userCookie = json_encode($array,true);   
                        $userCookie = (string)$userCookie;        
                        set_cookie('userCookie',$userCookie,'3600');
                        unset($sessTemp);
                        $redirect = $sessTemp['redirect'] ? $sessTemp['redirect'] : "";
                        if($sessTemp['role'] == "customer")       
                        { 
                           $link =  $redirect ? $redirect : base_url().'/browse';
                        }elseif($sessTemp['role'] == "agent"){ 
                           $link =  $redirect ? $redirect : base_url().'/dashboard';
                        }elseif($sessTemp['role'] == "developer"){
                           $link =  $redirect ? $redirect : base_url().'/dashboard';
                        }      
                        echo '<script>window.location.href="'.$link.'"</script>';     
                    }else{ 
                        unset($sessTemp);  
                        return redirect()->to('/browse');
                    }    
            }else{
                $this->session->setFlashdata('alert','<div class="alert alert-danger">Invalid OTP pin!</div>');
                return redirect()->back()->withInput();
            } 
        } 
      return view('frontend/otp-verify',$data); 
    } 


    public function sendMessage($to)    
    {    
       $to  = trim($to);   
       $otpNumber = time();    
       $msg    = 'Welcome to PropertyRaja your otp is '.$otpNumber;    
       $status = $this->MessageModel->localTextApi($to,$msg);
       if($status == "success")
       {
          $this->CrudModel->U('_users',['mobile' => $to],['otp' => $otpNumber]);
          return true;  
       }    
    }  





}	