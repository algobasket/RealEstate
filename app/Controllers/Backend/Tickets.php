<?php 
namespace App\Controllers\Backend;

use CodeIgniter\Controller;  

class Tickets extends BackendController   
{   
  

  function __construct()
  {
      $this->AccountModel   = model('AccountModel');   
      $this->UserModel      = model('UserModel');   
      $this->CrudModel      = model('CrudModel');    
  }

  
  function index()
  {
    $data['title']   = "Tickets";
    $data['tickets'] = $this->CrudModel->R('_tickets',[
       'req_res' => 'req' 
    ]);
    $data['section'] = ""; 
    return view('backend/tickets',$data);  
  }

  function create()
  { 
  	$data['title'] = "Create Ticket";

  	if($this->request->getPost('create'))
  	{
       $this->CrudModel->C('_tickets',array(
         'req_res'     => 'req',
         'parent_ticket_id' => 0,
         'user_id'     => $this->request->getPost('searchedInputid'), 
         'title'       => $this->request->getPost('title'),
         'created_by'  => cUserId(),
         'subject'     => $this->request->getPost('subject'),
         'description' => $this->request->getPost('description'),
         'created_at'  => date('Y-m-d h:i:s'),
         'updated_at'  => date('Y-m-d h:i:s'), 
         'status'      => $this->request->getPost('status'),
       ));
       $this->session->setFlashdata('alert','<div class="alert alert-success">New Ticket Created</div>');
       return redirect()->to('/backend/tickets/index'); 
  	}
  	$data['section'] = 'create';
    return view('backend/tickets',$data);
  } 

  function read()
  {
        $cookie =  get_cookie('userCookie');
        print_r($cookie);
  }

  function update()
  {
      set_cookie('userId','asas','3600');
	  set_cookie('display','asas','3600');
	  set_cookie('role','asasas','3600');
	  set_cookie('email','dddd','3600');    
}

  function delete()
  {
      $this->CrudModel->D('_tickets',array(
         'id' => segment(4)
       ));
       $this->session->setFlashdata('alert','<div class="alert alert-danger">Ticket Deleted</div>');
       return redirect()->to('/backend/tickets/index'); 
  }

}  