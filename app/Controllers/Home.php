<?php namespace App\Controllers;

class Home extends BaseController
{   
	function __construct()
	{
        $this->AccountModel   = model('AccountModel');   
        $this->GeographyModel = model('GeographyModel');   
        $this->PropertyModel  = model('PropertyModel');  
	}

	public function index()
	{
		$data['title']         = "Welcome to PropertyRaja"; 
		$data['featured']      = $this->PropertyModel->getAllFeaturedProperties();
		$data['cities']        = $this->GeographyModel->cities();
		$data['property_type'] = $this->PropertyModel->getPropertyType();
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

    public function terms()
    {
       $data['title'] = "Terms And Conditions";
	   return view('frontend/terms',$data);
    } 

     public function testimonials()
    {
       $data['title'] = "Testimonials";
	   return view('frontend/testimonials',$data);
    }

    public function report()
    {
       $data['title'] = "Report a problem";
	   return view('frontend/report',$data);
    }

    public function safety()
    {
       $data['title'] = "Safety Guide"; 
	   return view('frontend/safety',$data);
    }

    public function careers()
    {
       $data['title'] = "Careers";
	   return view('frontend/careers',$data);
    }

    public function findAgent()
    {
       $data['title'] = "Find Agent";
	   return view('frontend/find-agent',$data);
    }                  
    
}
