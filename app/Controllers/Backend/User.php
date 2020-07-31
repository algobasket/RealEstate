<?php 
namespace App\Controllers\Backend;

use CodeIgniter\Controller;  

class User extends BackendController   
{   
  
  function __construct()
  {
      $this->AccountModel   = model('AccountModel');   
      $this->UserModel      = model('UserModel');   
      $this->CrudModel      = model('CrudModel');    
  }   


  function index() 
  {
    $data['title'] = "User";
    return view('backend/user',$data);
  }

  function leads() 
  {
    $data['title'] = "Leads";

    if($this->request->getPost('editLead')) 
        {  
            $data = [
              'name'       => $this->request->getPost('name'),
              'updated_at' => date('Y-m-d h:i:s'),
              'status'     => $this->request->getPost('status')
            ];
            $result = $this->CrudModel->U('_amenities',['id' => Segment(5)],$data);
            if($result == true)
            {  
               $this->session->setFlashdata('alert','<div class="alert alert-success">Amenities Updated</div>');
               return redirect()->to('/backend/properties/amenities');
            }
        } 
       if($this->request->getPost('addLead')) 
       {    
            $data = [ 
                  'name'       => $this->request->getPost('name'),
                  'created_at' => date('Y-m-d h:i:s'),
                  'updated_at' => date('Y-m-d h:i:s'),
                  'status'     => $this->request->getPost('status')
                ];
            $result = $this->CrudModel->C('_amenities',$data);   
            if($result == true)
            {  
               $this->session->setFlashdata('alert','<div class="alert alert-success">Amenities Added</div>');
               return redirect()->to('/backend/properties/amenities');
            } 
       } 
       $data['section']    = segment(4);
       if($data['section'] == "edit")
       {  
           $data['getAmenityFromAmenityId'] = $this->PropertyModel->getAmenityFromAmenityId(segment(5));
       }
       if($data['section'] == "delete")
       {  
           $this->CrudModel->D('_amenities',['id' => Segment(5)]);
           $this->session->setFlashdata('alert','<div class="alert alert-danger">Amenities Deleted</div>');
           return redirect()->to('/backend/properties/amenities');
       }  
       $data['getLeads'] = $this->PropertyModel->getLeads();
       $data['allStatus'] = $this->AccountModel->allStatus();

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
   
   function test()
   {
     print_r($this->UserModel->getLeads(1));
   }

}