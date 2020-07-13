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
		$data['sell'] = "Sell Properties";
	    return view('frontend/sell',$data);
	}

	public function rent()
	{
		$data['rent'] = "Rent Properties";
	    return view('frontend/rent',$data);
	}

	public function browse() 
	{
		$data['browse'] = "Browse Properties";
	    return view('frontend/browse',$data);
	}
    
    public function contact()
    {
       $data['contact'] = "Contact Us";
	   return view('frontend/contact',$data);
    }

	public function about()
    {
       $data['rent'] = "About Us";
	   return view('frontend/about',$data);
    } 
    
	public function policy()
    {
       $data['policy'] = "Our Policy";
	   return view('frontend/policy',$data);
    }
    
	public function support()
    {
       $data['support'] = "Customer Support";
	   return view('frontend/support',$data);
    } 
    
}
