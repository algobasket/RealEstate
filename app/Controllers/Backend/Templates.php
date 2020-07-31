<?php 
namespace App\Controllers\Backend;

use CodeIgniter\Controller;  

class Templates extends BackendController   
{   
  
  function index() 
  {
    $data['title'] = "Templates";
    return view('backend/templates',$data);
  }

}