<?php 
namespace App\Controllers\Backend;

use CodeIgniter\Controller;  

class Templates extends BackendController   
{   
 
  function __construct()
  { 
      $this->CrudModel = model('CrudModel');  
      $this->TemplatesModel = model('TemplatesModel');  
  }  	
  
  function index() 
  {
    $data['title'] = "Templates";
    $data['section'] = segment(3);
    if($this->request->getPost('create'))
    {
       $this->CrudModel->C('_templates',[
          'template_type' => 'frontend_content',
          'title'      => $this->request->getPost('title'),
          'html_txt'   => $this->request->getPost('html_txt'),
          'created_at' => date('Y-m-d h:i:s'),
          'updated_at' => date('Y-m-d h:i:s'),
          'status'     => 1
       ]);
       $this->session->setFlashdata('alert','<div class="alert alert-success">Page Content Added</div>');
       return redirect()->to('/backend/templates/frontend_content/'); 
    }
    if($this->request->getPost('update'))
    {
       $this->CrudModel->U('_templates',['id' => segment(5)],[
          'template_type' => segment(3),
          'title'      => $this->request->getPost('title'),
          'html_txt'   => $this->request->getPost('html_txt'),  
          'updated_at' => date('Y-m-d h:i:s'),  
          'status'     => 1 
       ]);
       
      

       $this->session->setFlashdata('alert','<div class="alert alert-success">Page Content Updated</div>');
       return redirect()->to('/backend/templates/frontend_content');
    }
    if($this->request->uri->getTotalSegments() >= 4 && segment(4) == "edit")
    {
    	 $data['content_u'] = $this->CrudModel->R(
       	'_templates',
       	['template_type' => segment(3),'id' => segment(5)]
       );  
    }
    if($this->request->uri->getTotalSegments() >= 4 && segment(4) == "delete")
    {
    	$this->CrudModel->D(
       	'_templates',
       	['template_type' => segment(3),'id' => segment(5)]
       ); 
       $this->session->setFlashdata('alert','<div class="alert alert-danger">Page Content Deleted</div>');
       return redirect()->to('/backend/templates/frontend_content');  
    }
    $data['content'] = $this->CrudModel->R('_templates',['template_type' => segment(3)]); 
    return view('backend/templates',$data);
  }

}