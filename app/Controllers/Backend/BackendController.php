<?php 
namespace App\Controllers\Backend;

use CodeIgniter\Controller;  

class BackendController extends Controller   
{     

	protected $helpers = ['form','url','common','text'];   

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		$this->session    = \Config\Services::session(); 
		$this->validation = \Config\Services::validation();   
		  
	}


}   	