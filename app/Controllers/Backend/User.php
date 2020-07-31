<?php 
namespace App\Controllers\Backend;

use CodeIgniter\Controller;  

class User extends BackendController   
{   
  
  function index() 
  {
    $data['title'] = "User";
    return view('backend/user',$data);
  }

  function leads() 
  {
    $data['title'] = "Leads";
    return view('backend/user',$data);
  }

  function agents()  
  {
    $data['title'] = "Agent";
    return view('backend/agents',$data);
  }

  function developers()   
  {
    $data['title'] = "Developer";
    return view('backend/developers',$data); 
  }

  function staff()   
  {
    $data['title'] = "Staff";
    return view('backend/staff-members',$data);  
  }

  function tickets()   
   {
    $data['title'] = "Tickets"; 
    return view('backend/tickets',$data);  
   }

   function reviews()   
   {
     $data['title'] = "Reviews";  
     return view('backend/reviews',$data);  
   }

}