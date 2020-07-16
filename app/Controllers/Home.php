<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['title'] = "Welcome to PropertyRaja";
		return view('landing',$data);      
	}

	public function buy()  
	{
       $data['title'] = "Buy Properties";
	   return view('landing',$data); 
	}

	public function sell()
	{
		$data['title'] = "Sell Properties";
	    return view('frontend/sell',$data);
	}

	public function rent()
	{
		$data['title'] = "Rent Properties";
	    return view('frontend/rent',$data);
	}

	public function browse() 
	{
		$data['title'] = "Browse Properties";
	    return view('frontend/browse',$data); 
	}
    
    public function contact()
    {
       $data['title'] = "Contact Us";
	   return view('frontend/contact',$data);
    }

	public function about()
    {
       $data['title'] = "About Us";
	   return view('frontend/about',$data);
    } 
    
	public function policy()
    {
       $data['title'] = "Our Policy";
	   return view('frontend/policy',$data);
    }
    
	public function support()
    {
       $data['title'] = "Customer Support";
	   return view('frontend/support',$data);
    } 
    
}
