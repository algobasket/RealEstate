<?php 
namespace App\Controllers\Backend;

use CodeIgniter\Controller;  

class Settings extends BackendController   
{   
  
  function index()
  {
    $data['title'] = "Settings";
    return view('backend/settings',$data);
  }

}