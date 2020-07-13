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